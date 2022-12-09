<?php

use App\Models\Setting;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\WEB\Admin\LandingPageController;
use App\Models\Cart;
use Illuminate\Support\Carbon;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {

    Route::get('forgot/password', 'Auth\ForgotPasswordController@forgotPasswordForm')->name('forgotPasswordForm');
    Route::post('sendResetLinkEmail', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('sendResetLinkEmail');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.new');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


    Route::group(['middleware' => ['auth']], function () {

    });


    //ADMIN AUTH ///
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return route('/login');
        });
        Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.form');
        Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
        Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    });

    Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.',], function () {
        Route::get('home', 'WEB\Admin\HomeController@index')->name('home');

        Route::get('/comments/{id}/product', 'WEB\Admin\ProductController@comments')->name('comments');
        Route::get('/reports/{id}/product', 'WEB\Admin\ProductController@reports')->name('reports');

        Route::get('getItems/{req}/{product_id}', 'WEB\Admin\ProductController@getItems');

        Route::get('/users', 'WEB\Admin\UsersController@index')->name('users.all');
        Route::post('/users', 'WEB\Admin\UsersController@store')->name('users.store');
        Route::get('/users/create', 'WEB\Admin\UsersController@create')->name('users.create');
        Route::delete('users/{id}', 'WEB\Admin\UsersController@destroy')->name('users.destroy');
        Route::get('/users/{id}/edit', 'WEB\Admin\UsersController@edit')->name('users.edit');
        Route::get('/users/{id}/bills', 'WEB\Admin\UsersController@bills')->name('users.bills');
        Route::get('/users/{id}/subscriptions', 'WEB\Admin\UsersController@subscriptions')->name('users.subscriptions');
        Route::get('/users/{id}/show', 'WEB\Admin\UsersController@show')->name('users.show');
        Route::patch('/users/{id}', 'WEB\Admin\UsersController@update')->name('users.update');
        Route::get('/users/{id}/edit_password', 'WEB\Admin\UsersController@edit_password')->name('users.edit_password');
        Route::post('/users/{id}/edit_password', 'WEB\Admin\UsersController@update_password')->name('users.edit_password');
        Route::get('/exportUsers', 'WEB\Admin\UsersController@exportUsers');

        Route::post('/changeStatus/{model}', 'WEB\Admin\HomeController@changeStatus');
        Route::resource('permission', \App\Http\Controllers\WEB\Admin\PermissionsController::class);

        Route::get('/product-image/{product_image_id}/delete', [\App\Http\Controllers\WEB\Admin\ProductController::class, 'deleteProductImage']);

        Route::get('/admins/{id}/edit', 'WEB\Admin\AdminController@edit')->name('admins.edit');
        Route::patch('/admins/{id}', 'WEB\Admin\AdminController@update')->name('users.update');
        Route::get('/admins/{id}/edit_password', 'WEB\Admin\AdminController@edit_password')->name('admins.edit_password');
        Route::post('/admins/{id}/edit_password', 'WEB\Admin\AdminController@update_password')->name('admins.edit_password');


        Route::get('/admins', 'WEB\Admin\AdminController@index')->name('admins.all');
        Route::post('/admins/changeStatus', 'WEB\Admin\AdminController@changeStatus')->name('admin_changeStatus');
        Route::delete('admins/{id}', 'WEB\Admin\AdminController@destroy')->name('admins.destroy');
        Route::post('/admins', 'WEB\Admin\AdminController@store')->name('admins.store');
        Route::get('/admins/create', 'WEB\Admin\AdminController@create')->name('admins.create');
        Route::get('/editMyProfile', 'WEB\Admin\AdminController@editMyProfile')->name('admins.editMyProfile');
        Route::post('/updateProfile', 'WEB\Admin\AdminController@updateProfile')->name('admins.updateProfile');
        Route::get('/changeMyPassword', 'WEB\Admin\AdminController@changeMyPassword')->name('admins.changeMyPassword');
        Route::post('/updateMyPassword', 'WEB\Admin\AdminController@updateMyPassword')->name('admins.updateMyPassword');

        Route::resource('/product', 'WEB\Admin\ProductController');
        Route::resource('/category', 'WEB\Admin\CategoryController');
        Route::resource('/fqa', 'WEB\Admin\FqaController');
        Route::resource('permissions', 'WEB\Admin\PermissionsController');


        Route::get('/contacts', 'WEB\Admin\ContactController@index');
        Route::get('/contacts/{id}/show', 'WEB\Admin\ContactController@show');
        Route::patch('/contacts/{id}', 'WEB\Admin\ContactController@update');
        Route::get('/export/excel/contacts', 'WEB\Admin\ContactController@exportExcel');
        Route::get('/pdfContacts', 'WEB\Admin\ContactController@pdfContacts');


        Route::get('settings', 'WEB\Admin\SettingController@index')->name('settings.all');
        Route::post('settings', 'WEB\Admin\SettingController@update')->name('settings.update');

        Route::get('system_maintenance', 'WEB\Admin\SettingController@system_maintenance')->name('system.maintenance');
        Route::post('system_maintenance', 'WEB\Admin\SettingController@update_system_maintenance')->name('update.system.maintenance');


        Route::resource('/pages', 'WEB\Admin\PagesController');
        Route::resource('/roles', 'WEB\Admin\RolesController');
        Route::resource('/notifications', 'WEB\Admin\NotificationsController');
        Route::get('logs', 'WEB\Admin\LogController@index');


    });

});
