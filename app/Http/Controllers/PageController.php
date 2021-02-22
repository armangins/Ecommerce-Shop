<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Content;
use App\Product;
use Cart;

class PageController extends MainController
{
    public function home()
    {
        self::$data['smallcart'] = Cart::getContent()->toArray();
        self::$data['pageTitle'] .= 'Home-Page';
        self::$data['categories'] = categorie::all()->toArray();
        Product::getSales(self::$data);
        Product::getNew(self::$data);
        return view('content.home', self::$data);
    }

    public function getContent($url)
    {
        Content::getAll($url, self::$data);
        $page = $url;
        return view('content.' . $page, self::$data);
    }

    public function cart()
    {
        self::$data['pageTitle'] .= 'Cart';
        return view('content.cart', self::$data);
    }

    public function checkout()
    {
        self::$data['pageTitle'] .= 'Checkout';
        return view('content.checkout', self::$data);
    }

    public function account()
    {
        self::$data['pageTitle'] .= 'Account';
        return view('content.form.account', self::$data);
    }

}
