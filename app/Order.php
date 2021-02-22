<?php

namespace App;
use Cart;
use DB;
use Session;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{

    // this method is to save the order details to database
   public static function save_new()
   {
       $order = new self();
       $order->user_id = Session::get('id');
       $order->total= Cart::getTotal();
       $order->data=serialize(Cart::getContent()->toArray());
       $order->save();
       Session::flash('message','thank you for your purchase');
       Cart::clear();
   }
    // this method is to save the order details to database end
   

   static public function getAll()
   {
       return DB::table('orders AS o')
       ->join('users AS u','u.id','=','o.user_id')
       ->select('u.name','o.*')
       ->orderBy('o.created_at','desc')
       ->get()->toArray();
   }
}
    // gets all the orders for the database end