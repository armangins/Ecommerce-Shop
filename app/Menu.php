<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Menu extends Model
{
    // saves new menu
    public static function save_new_menu($request)
    {
        $menu = new self();
        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
        Session::flash('message', 'New menu has been saved');

    }
    // saves new menu end

    //updates  menu
    public static function update_menu($request, $id)
    {
        $menu = Menu::find($id);
        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
    }
}
//updates  menu
