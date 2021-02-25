<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth:web', 'isAdmin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('change-password', 'DashboardController@changePasswordIndex')->name('password.change');
    Route::post('change-password', 'DashboardController@changePassword')->name('password.change.update');
    Route::resource('categories', 'CategoryController');
    Route::resource('subcategories', 'SubcategoryController');
    Route::resource('brands', 'BrandController');
    Route::resource('blog', 'BlogController');
    Route::resource('products', 'ProductController');
    Route::get('users', 'UserController@index')->name('users.index');
    Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');
    Route::resource('coupons', 'CouponController');
    Route::resource('sitesetting', 'SitesettingController');
    Route::get('files', 'DashboardController@main')->name('file.index');
    Route::get('file/create', 'DashboardController@create')->name('file.create');
    Route::post('file/store', 'DashboardController@store')->name('file.store');
    Route::delete('file/destroy/{id}', 'DashboardController@destroy')->name('file.destroy');
});




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
