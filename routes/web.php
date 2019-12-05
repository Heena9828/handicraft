<?php

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

    Route::get('/', function ()
    {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    //Logout
    Route::get('logout', 'Auth\LoginController@logout');
    ///home page
    Route::get('index', 'HomeController@index');

    ///Category
    Route::resource('categories', 'CategoryController');

    ///Subcategories
    Route::resource('subcategories', 'SubCategoryController');
    
    
    /////Products
    Route::resource('products', 'ProductController');
    
