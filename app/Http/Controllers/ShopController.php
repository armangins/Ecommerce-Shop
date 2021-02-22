<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Order;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Session;

class ShopController extends MainController
{
// function for ajax request autocomplete not working well yet
    public function autocomplete(Request $request)
    {
        $res = Product::select('ptitle')->where('ptitle', 'like', '%' . $request['search'] . '%')->get()->toArray();
        if ($res) {
            return $res;
        } else {
            echo 'No data';
        }
    }
// gets all the products
    public function all(Request $request)
    {
        Product::getAll($request, self::$data);
        self::$data['categories'] = categorie::all()->toArray();
        return view('content.products', self::$data);
    }

    // Gets all products by its category
    public function products(Request $request, $curl)
    {

        $x = Product::getProducts($request, $curl, self::$data);
        self::$data['categories'] = categorie::all()->toArray();
        return view('content.products', self::$data);
    }

    // Gets a single item by its category and product id
    public function item($curl, $purl)
    {
        self::$data['categories'] = categorie::all()->toArray();
        Product::item($purl, self::$data);
        return view('content.item', self::$data);
    }

// Adds a product to the cart
    public function AddToCart(Request $request)
    {
        Product::AddToCart($request['pid']);
    }

// gets the shopping cart content
    public function cart()
    {
        self::$data['pageTitle'] .= 'Your shopping cart';
        $cart = Cart::getContent()->toArray();
        sort($cart);
        self::$data['cart'] = $cart;
        return view('content.cart', self::$data);
    }

    // clears the cart
    public function clearCart()
    {
        Cart::clear();
        return redirect('shop/cart');
    }

// updates the cart if we add products
    public function updateCart(Request $request)
    {
        Product::updateCart($request);
        return redirect('shop/cart');
    }

// removes product from  cart
    public function removeItem(Request $request)
    {
        Cart::remove($request['pid']);
        return redirect('shop/cart');
    }

// removes product from cart feature
    public function removeItemdropdown(Request $request)
    {
        Cart::remove($request['pid']);
        return redirect()->back();
    }

// gets the order details to database
    public function order()
    {

        if (Cart::isEmpty()) {
            return redirect('shop/statues');
        } else {
            if (!Session::has('id')) {
                return redirect('user/login?rn=shop/cart');
            } else {
                Order::save_new();
                return redirect('/home');
            }
        }
    }
}
