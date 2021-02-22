<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\DB;

class CmsController extends MainController
{

    
    public function dashboard()
    {
        return view('cms.dashboard',self::$data);
    }

    public function orders()
    {
        self::$data['orders'] =Order::getAll();
 
        return view('cms.orders',self::$data);
    }
}
