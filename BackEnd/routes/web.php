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

//Carousels routes
Route::resource('sliders','SlidersController');
Route::post('update_slider/{id}',array('as'=>'slider.set','uses'=>'SlidersController@updateSlider'));
Route::get('delete_slider/{id}',array('as'=>'slider.remove','uses'=>'SlidersController@deleteSlider'));
//---------------
//About routes
Route::resource('abouts','AboutsController');
Route::post('update_about/{id}',array('as'=>'about.set','uses'=>'AboutsController@updateAbout'));
//---------------
//Partners routes
Route::resource('partners','PartnersController');
Route::post('update_partner/{id}',array('as'=>'partner.set','uses'=>'PartnersController@updatePartner'));
Route::get('delete_partner/{id}',array('as'=>'partner.remove','uses'=>'PartnersController@deletePartner'));
//---------------
//Nexts routes
Route::resource('nexts','NextsController');
Route::post('update_next/{id}',array('as'=>'next.set','uses'=>'NextsController@updateNext'));
//---------------
//Places routes
Route::resource('places','PlacesController');
Route::post('update_place/{id}',array('as'=>'place.set','uses'=>'PlacesController@updatePlace'));
//---------------

Route::get('/', function () {
    return Redirect::to(route('home'));
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
