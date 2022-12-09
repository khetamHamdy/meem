<?php

use Illuminate\Http\Request;


Route::group(['middleware' => 'auth:api'], function () {

////////////////////////////////  UserController   ///////////////////////////////////
    Route::post('/editUserProfile', 'API\v1\UserController@editUserProfile');
    Route::post('/changePassword', 'API\v1\UserController@changePassword');
    Route::get('/myProfile', 'API\v1\UserController@myProfile');
    Route::get('/logout', 'API\v1\UserController@logout');
    Route::post('/resetPassword', 'API\v1\UserController@resetPassword');
    Route::post('updateMyLanguage', 'API\v1\UserController@updateMyLanguage');
    Route::get('deleteMyAccount', 'API\v1\UserController@deleteMyAccount');
    Route::get('changeNotificationStatus', 'API\v1\UserController@changeNotificationStatus');


///////////////////////////////// Products Controller /////////////////////////////////////
    Route::get('myProducts', 'API\v1\ProductController@myProducts');
    Route::get('productDetails/{id}', 'API\v1\ProductController@product_details')->name('productDetails');
    Route::post('storeProduct', 'API\v1\ProductController@storeProduct');
    Route::get('Home', 'API\v1\ProductController@Home');
    Route::get('publicMarket/{category_id}', 'API\v1\ProductController@publicMarket');
    Route::get('advertiserAccount', 'API\v1\ProductController@advertiserAccount');
    Route::get('filter', 'API\v1\ProductController@filter');
    Route::get('dataFilter', 'API\v1\ProductController@filter_data');
    Route::get('SimilarProduct/{product_id}', 'API\v1\ProductController@SimilarProduct');
    Route::post('addComment/{product_id}', 'API\v1\ProductController@add_comment_product');
    Route::get('getComment/{product_id}', 'API\v1\ProductController@get_comment_product');

    Route::post('addReport/{product_id}', 'API\v1\ProductController@add_Report_product');
    Route::get('getReport/{product_id}', 'API\v1\ProductController@get_Report_product');

    Route::post('chat', 'API\v1\ChatController@sendMessage');
    Route::get('chatDetails/{chat_id}', 'API\v1\ChatController@chatDetails');
    Route::get('checkChat/{user_id}', 'API\v1\ChatController@checkChat');
    Route::get('chatsList', 'API\v1\ChatController@chatsList');
    Route::delete('deleteChat/{chat_id}', 'API\v1\ChatController@deleteChat');

    Route::post('block/{blockUser_id}', 'API\v1\ChatController@blcokUser');
    Route::post('unBlock/{blockUser_id}', 'API\v1\ChatController@unblcokUser');
    Route::get('getBlock', 'API\v1\ChatController@getBlcokUser');

    Route::post('changePrice/{product_id}', 'API\v1\ProductController@changePrice');
    Route::put('updateProduct/{product_id}', 'API\v1\ProductController@updateProduct');
    Route::get('editProduct/{product_id}', 'API\v1\ProductController@editProduct');

    Route::get('getNotifications', 'API\v1\ChatController@getNotifications');

////////////////////////////////  App Controller /////////////////////////////////////
    Route::get('deleteMySearches', 'API\v1\AppController@deleteMySearches');
    Route::get('getMyFavorite', 'API\v1\FavoriteController@getMyFavorite');
    Route::get('addAndRemoveFromFavorite/{product_id}', 'API\v1\FavoriteController@addAndRemoveFromFavorite');
});

////////////////////////////////  AppController   ///////////////////////////////////

//Route::post('home', 'API\v1\AppController@home');

Route::get('getSetting', 'API\v1\AppController@getSetting');
Route::get('getFqa', 'API\v1\AppController@getFqa');

Route::post('contactUs', 'API\v1\AppController@contactUs');
Route::post('JoinUs', 'API\v1\AppController@JoinUs');
Route::get('search', 'API\v1\AppController@search');
Route::get('getMySearches', 'API\v1\AppController@getMySearches');

//Route::get('testPay', 'API\AppController@testPay');

Route::post('phoneCode', [\App\Http\Controllers\API\v1\UserController::class, 'varificationCodes']);

////////////////////////////////  UserController   ///////////////////////////////////

Route::post('/login', 'API\v1\UserController@login');
Route::post('/signUp', 'API\v1\UserController@signUp');
Route::post('/forgotPassword', 'API\v1\UserController@forgotPassword');
Route::get('myNotifications', 'API\v1\UserController@myNotifications');


////////////////////////////////  CartController   ///////////////////////////////////
Route::post('/addToCart', 'API\v1\CartController@addToCart');
Route::get('/myCart', 'API\v1\CartController@myCart');
Route::get('/changeQuantity/{id}', 'API\v1\CartController@changeQuantity');
Route::get('/removeFromCart/{id}', 'API\v1\CartController@removeFromCart');
Route::get('/startNewOrder', 'API\v1\CartController@startNewOrder');
Route::post('checkPromoCode', 'API\v1\CartController@checkPromoCode');
Route::post('storeOrder', 'API\v1\CartController@storeOrder');
Route::get('orderDetails/{id}', 'API\v1\CartController@orderDetails');
Route::get('/reOrder', 'API\v1\CartController@reOrder')->name('reOrder');





