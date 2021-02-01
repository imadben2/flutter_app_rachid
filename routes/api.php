<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login1', 'PassportController@login');
Route::post('register1', 'PassportController@register');
 
Route::middleware('auth:api')->group(function () {






    Route::get('user', 'PassportController@details');
    Route::get('getallCliens', 'ProductController@getallClient');
   
     Route::get('cart1dollar', 'CartController@Cart1dollar');
     Route::get('cart2dollar', 'CartController@Cart2dollar');
     Route::get('cart5dollar', 'CartController@Cart5dollar');
     Route::get('cart10dollar', 'CartController@Cart10dollar');
    
    
    
    
    
 Route::post('store_cart_categoriea', 'CartController@store_cart_categorie');
    
     Route::get('Index_cart_categorie/{id}', 'CartController@Index_cart_categorie');
     
     
     Route::get('Index_client_cart/{id}', 'PassportController@index_client_cart');
     
     
  
     
    
    Route::delete('supprimer_user/{id}', 'PassportController@SupprimerUser');
 // Route::delete('deleteUser_card/{id}', 'CartController@deleteUser_card');
 

   
    Route::resource('categorie', 'CateogireController');
    Route::resource('products', 'ProductController');
    Route::get('users', 'PassportController@all_user');
   
    
    
});
 Route::put('Modifier_cart/{id}', 'CartController@modifier_cart');
  Route::get('client_alls', 'PassportController@client_all');
    // Route::get('index11aa', 'CateogireController@index_client');  
     Route::get('index11aa', 'CateogireController@index11aa');
     Route::put('Modifier_cart_client','CartController@modifier_cart_client'); 
   