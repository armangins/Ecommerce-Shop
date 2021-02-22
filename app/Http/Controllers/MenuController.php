<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Menu;
use Illuminate\Http\Request;
use Session;

class MenuController extends MainController
{

    public function index()
    {

        return view('cms.menu', self::$data);
    }

    public function create()
    {

        return view('cms.add_menu', self::$data);

    }

    public function store(MenuRequest $request)
    {
        Menu::save_new_menu($request);
        return redirect('cms/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        self::$data['item_id'] = $id;
        return view('cms.delete_menu', self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        self::$data['item'] = Menu::find($id)->toArray();
        return view('cms.edit_menu', self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        Menu::update_menu($request, $id);
        return redirect('cms/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        Session::flash('message', 'Link is removed');
        return redirect('cms/menu');
    }
}
