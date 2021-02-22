<?php

#shop
Route::prefix('shop')->group(function () {

    Route::get('/', 'ShopController@products');
    Route::get('all','ShopController@all');
    Route::get('autocomplete','ShopController@autocomplete');
    Route::get('update-cart', 'ShopController@updateCart');
    Route::get('remove-item', 'ShopController@removeItem');
    Route::get('remove-item-drop', 'ShopController@removeItemdropdown');
    Route::get('order', 'shopController@order');
    Route::get('cart', 'ShopController@cart');
    Route::get('clear-cart', 'ShopController@clearCart');
    Route::get('add-to-cart', 'ShopController@AddToCart');
    Route::get('{curl}', 'ShopController@products');
    Route::get('{curl}/{purl}', 'ShopController@item');
});
#shop

#users
Route::prefix('user')->group(function () {

    Route::get('login', 'userController@getLogin');
    Route::post('login', 'userController@postLogin');
    Route::get('logout', 'userController@logOut');
    Route::get('register', 'userController@getRegister');
    Route::post('register', 'userController@postRegister');
});


 #CMS
Route::middleware(['cmsguard'])->group(function () {
    Route::prefix('cms')->group(function () {
        Route::get('dashboard', 'CmsController@dashboard');
        Route::resource('menu', 'MenuController');
        Route::resource('content', 'ContentController');
        Route::resource('categories', 'CategorieController');
        Route::resource('products', 'ProductController');
        Route::get('orders', 'CmsController@orders');
    });
});


# Nav apges
Route::get('/', 'pageController@home');
Route::get('contact', 'PageController@contact');
Route::get('account', 'PageController@account');
Route::get('{url}', 'PageController@getContent');
# Nav apges
