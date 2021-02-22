<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Session;

class Content extends Model
{
    //gets all the content if there is any
    public static function getAll($url, &$data)
    {
        $contents = DB::table('contents AS c')
            ->join('menus AS m', 'm.id', '=', 'c.menu_id')
            ->where('m.url', '=', $url)
            ->select('m.title AS mtitle', 'c.*')
            ->get()
            ->toArray();
        if (!$contents) {
            abort(404);
        } else {
            $data['pageTitle'] .= $contents[0]->mtitle;
            $data['contents'] = $contents;
        }
    }
    //gets all the content if there is any

    //saves new content
    public static function save_content($request)
    {

        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->image = $request['imagename'] ? $request['imagename'] : '';
        $content->save();
        Session::flash('message', 'you new content is submited ');
    }

    public static function update_content($request, $id)
    {
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->image = '';
        $content->save();
        Session::flash('message', 'content is updated');
    }
}
//saves new content end
