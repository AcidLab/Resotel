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
Route::get('create_hotel',array('as'=>'hotel.createPage','uses'=>'Backend\HotelController@hotelFirstCreatePage'));
Route::post('create_contract',array('as'=>'hotel.createHotel','uses'=>'Backend\HotelController@store'));

//---------------
//Contracts routes
Route::resource('Hotels','Backend\ContractsController');
Route::post('create_season',array('as'=>'hotel.createContract','uses'=>'Backend\HotelController@storeContract'));
//---------------
//Seasons routes
Route::resource('seasons','Backend\SeasonsController');
Route::post('create_room',array('as'=>'hotel.createSeason','uses'=>'Backend\HotelController@storeSeason'));

//---------------
//Rooms routes
Route::resource('rooms','Backend\RoomsController');
Route::post('create_pricing',array('as'=>'hotel.createRoom','uses'=>'Backend\HotelController@storeRoom'));
//--------------------

//Pricings routes
Route::resource('pricings','Backend\PricingsController');
Route::post('create_extra_charges',array('as'=>'hotel.createPricing','uses'=>'Backend\HotelController@storePricing'));
Route::post('create_retrocession_time',array('as'=>'hotel.createExtraCharges','uses'=>'Backend\HotelController@storeExtraCharges'));
Route::post('create_extra_charges_by_ages',array('as'=>'hotel.createRetrocessionTimes','uses'=>'Backend\HotelController@storeRetrocessionTimes'));
Route::post('create_supps_for_persons',array('as'=>'hotel.createChargesByAges','uses'=>'Backend\HotelController@storeExtraChargesByAges'));
//----------------------



Route::get('/', function () {
    return Redirect::to(route('home'));
    
});

//Security routes
Route::get('create_contract',function(){
    return Redirect::to(route('hotel.createPage'));
});
Route::get('create_season',function(){
    return Redirect::to(route('hotel.createPage'));
});
Route::get('create_room',function(){
    return Redirect::to(route('hotel.createPage'));
    
});
Route::get('create_pricing',function(){
    return Redirect::to(route('hotel.createPage'));
    
});

Route::get('create_extra_charges',function(){
    return Redirect::to(route('hotel.createPage'));
    
});
Route::get('create_retrocession_time',function(){
    return Redirect::to(route('hotel.createPage'));
    
});
Route::get('create_extra_charges_by_ages',function(){
    return Redirect::to(route('hotel.createPage'));
    
});
Route::get('create_supps_for_persons',function(){
    return Redirect::to(route('hotel.createPage'));
    
});
//----------------


Auth::routes();

Route::get('/home', 'Frontend\HomeController@index')->name('home');
