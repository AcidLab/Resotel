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
Route::resource('sliders','Frontend\SlidersController');
Route::post('update_slider/{id}',array('as'=>'slider.set','uses'=>'Frontend\SlidersController@updateSlider'));
Route::get('delete_slider/{id}',array('as'=>'slider.remove','uses'=>'Frontend\SlidersController@deleteSlider'));
//---------------
//About routes
Route::resource('abouts','Frontend\AboutsController');
Route::post('update_about/{id}',array('as'=>'about.set','uses'=>'Frontend\AboutsController@updateAbout'));
//---------------
//Partners routes
Route::resource('partners','Frontend\PartnersController');
Route::post('update_partner/{id}',array('as'=>'partner.set','uses'=>'Frontend\PartnersController@updatePartner'));
Route::get('delete_partner/{id}',array('as'=>'partner.remove','uses'=>'Frontend\PartnersController@deletePartner'));
//---------------
//Nexts routes
Route::resource('nexts','Frontend\NextsController');
Route::post('update_next/{id}',array('as'=>'next.set','uses'=>'Frontend\NextsController@updateNext'));
//---------------
//Places routes
Route::resource('places','Frontend\PlacesController');
Route::post('update_place/{id}',array('as'=>'place.set','uses'=>'Frontend\PlacesController@updatePlace'));
//---------------
//contacts routes
Route::resource('contacts','Frontend\ContactsController');

//---------------
//Hotels routes
Route::resource('hotels','Backend\HotelController');
Route::get('create_hotel/{status}',array('as'=>'hotel.createPage','uses'=>'Backend\HotelController@hotelCreatePage'));
//---------------

Route::get('/', function () {
    return Redirect::to(route('home'));
    
});


Auth::routes();

Route::get('/home', 'Frontend\HomeController@index')->name('home');
