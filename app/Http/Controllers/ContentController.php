<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\ContentRequest;
use Illuminate\Http\Request;
use Session;

class ContentController extends MainController
{

    public function index()
    {
        self::$data['content'] = Content::all()->toArray();
        return view('cms.content', self::$data);
    }

    public function create()
    {

        return view('cms.add_content', self::$data);

    }

    public function store(ContentRequest $request)
    {
        Content::save_content($request);
        return redirect('cms/content');
    }

    public function show($id)
    {
        self::$data['item_id'] = $id;
        return view('cms.delete_content', self::$data);
    }

    public function edit($id)
    {

        self::$data['item'] = Content::find($id)->toArray();
        return view('cms.edit_content', self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        Content::update_content($request, $id);
        return redirect('cms/content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::destroy($id);
        Session::flash('message', 'the  contant has been deleted');
        return redirect('cms/content');
    }
}
