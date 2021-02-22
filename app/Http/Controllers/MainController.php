<?php

namespace App\Http\Controllers;

use App\Menu;

class MainController extends Controller

/**
 * inherits the $data to all controllers
 *
 */

{
    public static $data = ['pageTitle' => 'Oculus | '
        , 'toastr' => 'toast-bottom-center']; // prop to make generic titles

    public function __construct()
    {
        self::$data['menu'] = Menu::all()->toArray();

    }

}
