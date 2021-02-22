<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\CategoriesRequest;
use Session;

class CategorieController extends MainController
{

    public function index()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.categories', self::$data);
    }

    public function create()
    {
        return view('cms.add_categories', self::$data);
    }

    public function store(CategoriesRequest $request)
    {
        Categorie::save_new($request);
        return redirect('cms/categories');
    }

    public function show($id)
    {
        self::$data['item_id'] = $id;
        return view('cms.delete_categories', self::$data);
    }

    public function edit($id)
    {
        self::$data['item'] = Categorie::find($id)->toArray();
        return view('cms.edit_categories', self::$data);
    }

    public function update(CategoriesRequest $request, $id)
    {
        Categorie::update_categorie($request, $id);
        return redirect('cms/categories');
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        Session::flash('message', 'category is removed');
        return redirect('cms/categories');
    }
}
