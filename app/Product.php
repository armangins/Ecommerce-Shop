<?php
namespace App;

use Cart;
use DB;
use Illuminate\Database\Eloquent\Model;
use Image;
use Session;

class Product extends Model
{
    // function to get all products including sorting
    public static function getAll($request, &$data)
    {
        $total = DB::table('products')->count();
        if ($total) {
            $data['total'] = $total;
        } else {
            $data['total'] = '';
        }

        if ($request['order']) {
            $all = DB::table('products')
                ->join('categories AS c', 'c.id', '=', 'products.categorie_id')
                ->select('products.*', 'c.curl')->orderBy('price', $request['order'])->paginate(8);
            $data['products'] = $all;
        } else {
            $all = DB::table('products')
                ->join('categories AS c', 'c.id', '=', 'products.categorie_id')
                ->select('products.*', 'c.curl')->paginate(8);
            $data['products'] = $all;
        }
    }
    // function to get all products including sorting end

// gets all products the are new in stock
    public static function getNew(&$data)
    {
        $news = DB::table('products')
            ->join('categories AS c', 'c.id', '=', 'products.categorie_id')
            ->select('products.*', 'c.curl')
            ->take(7)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
        $data['new'] = $news;
    }
// gets all products the are new in stock

// function that gets all products that are onsale
    public static function getSales(&$data)
    {
        $data['onsale'] = DB::table('products')
            ->join('categories AS c', 'c.id', '=', 'products.categorie_id')
            ->select('products.*', 'c.curl')
            ->where('onsale', '=', 1)
            ->get()->take(8)->toArray();
    }
    // function that gets all products that are onsale end

    // function that gets all products by it categorie including sorting//
    public static function getProducts($request, $curl, &$data)
    {
        if ($request['order']) {
            $products = DB::table('products AS p')
                ->join('categories AS c', 'c.id', '=', 'p.categorie_id')
                ->select('c.ctitle', 'c.curl', 'p.*')
                ->where('c.curl', '=', $curl)->orderBy('price', $request['order'])
                ->paginate(12);
        } else {
            $products = DB::table('products AS p')
                ->join('categories AS c', 'c.id', '=', 'p.categorie_id')
                ->select('c.ctitle', 'c.curl', 'p.*')
                ->where('c.curl', '=', $curl)
                ->paginate(12);
        }
        $total = DB::table('products')->count();
        if ($total) {
            $data['total'] = $total;
        } else {
            $data['total'] = '';
        }
        if (!$products->count()) {
            abort(404);
        } else {
            $data['pageTitle'] .= $products[0]->ctitle;
            $data['products'] = $products;
        }
    }
    // function that gets all products by it categorie including sorting end//

// function that gets single product
    public static function item($purl, &$data)
    {
        if ($item = self::where('purl', '=', $purl)->first()) {
            $item->toArray();
            $data['categories'] = categorie::all()->toArray();
            $data['pageTitle'] .= $item['ptitle'];
            $data['item'] = $item;

        } else {
            abort(404);
        }
    }
// function that gets single product

// function to add item to cart
    public static function AddToCart($pid)
    {
        if ($product = self::find($pid)) {

            $product = $product->toArray();

            if (!Cart::get($pid)) {
                Cart::add($pid, $product['ptitle'], $product['price'], 1, ['image' => $product['pimage']]);
                Session::flash('message', $product['ptitle'] . ' is added into cart');
            }
        }
    }
// function to add item to cart

    // update the cart
    public static function updateCart($request)
    {
        if (!empty($request['pid']) && !empty($request['act'])) {

            if (is_numeric($request['pid'])) {

                if ($request['act'] == 'plus') {

                    Cart::update($request['pid'], ['quantity' => 1]);

                } elseif ($request['act'] == 'min') {

                    Cart::update($request['pid'], ['quantity' => -1]);

                }
            }
        }
    }
    // update the cart

    // save new product CMS
    public static function save_new($request)
    {
        $image_name = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file = $request->file('image');
            $image_name = date('d.m.y.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/Images/products/', $image_name);
            $img = Image::make(public_path() . '/Images/products/' . $image_name);
            $img->resize(3456, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $product = new self();
        $product->categorie_id = $request['categorie_id'];
        $product->ptitle = $request['title'];
        $product->particle = $request['article'];
        $product->price = $request['price'];
        $product->purl = $request['url'];
        $product->pimage = $image_name;
        $product->save();
        Session::flash('message', ' New product has been added');
    }

    public static function update_product($request, $id)
    {
        $image_name = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file = $request->file('image');
            $image_name = date('d.m.y.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/Images/products/', $image_name);
            $img = Image::make(public_path() . '/Images/products/' . $image_name);
            $img->resize(3456, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $product = self::find($id);
        $product->categorie_id = $request['categorie_id'];
        $product->ptitle = $request['title'];
        $product->particle = $request['article'];
        $product->price = $request['price'];
        $product->purl = $request['url'];
        if ($image_name) {
            $product->pimage = $image_name;
        }
        $product->save();
        Session::flash('message', ' Product has been updated');
    }
}
