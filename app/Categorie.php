<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Session;

class Categorie extends Model
{

    public static function save_new($request)
    {
        $image_name = 'defualt.png';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = date('d.m.y.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/Images', $image_name);
            $img = Image::make(public_path() . '/Images/' . $image_name);
            $img->resize(3456, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $category = new self();
        $category->ctitle = $request['title'];
        $category->carticle = $request['article'];
        $category->cimage = $image_name;
        $category->curl = $request['url'];
        $category->save();
        Session::flash('message', ' category saved');
    }
    //saves new category into teh database end

// updates a category
    public static function update_categorie($request, $id)
    {
        $image_name = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file = $request->file('image');
            $image_name = date('d.m.y.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/Images', $image_name);
            $img = Image::make(public_path() . '/Images/' . $image_name);
            $img->resize(3456, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $category = self::find($id);
        $category->ctitle = $request['title'];
        $category->carticle = $request['article'];
        if ($image_name) {
            $category->cimage = $image_name;
        }
        $category->curl = $request['url'];
        $category->save();
        Session::flash('message', ' category updated');
    }
}
// updates a category end
