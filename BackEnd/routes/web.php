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
Route::group(['middleware' => 'auth'], function(){
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
Route::get('affect_services/{id}',array('as'=>'hotel.affectServicesPage','uses'=>'Backend\HotelController@affectServicesPage'));
Route::post('affect_services_store',array('as'=>'hotel.storeAffectedServices','uses'=>'Backend\HotelController@affectServicesStore'));

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
//Services routes
Route::resource('services','Frontend\ServicesController');
Route::get('delete_service/{id}',array('as'=>'service.remove','uses'=>'Frontend\ServicesController@deleteService'));
Route::post('update_service/{id}',array('as'=>'service.set','uses'=>'Frontend\ServicesController@updateService'));
//----------------------
//Equipements routes
Route::resource('equipements','Frontend\EquipmentsController');
Route::get('delete_equipement/{id}',array('as'=>'equipement.remove','uses'=>'Frontend\EquipmentsController@deleteEquipement'));
Route::post('update_equipement/{id}',array('as'=>'equipement.set','uses'=>'Frontend\EquipmentsController@updateEquipement'));
//----------------------
//Roomtypes routes
Route::resource('roomtypes','Frontend\RoomtypesController');
Route::get('delete_roomtype/{id}',array('as'=>'roomtype.remove','uses'=>'Frontend\RoomtypesController@deleteRoomtype'));
Route::post('update_roomtype/{id}',array('as'=>'roomtype.set','uses'=>'Frontend\RoomtypesController@updateRoomtype'));
//----------------------
//Arrangements routes
Route::resource('arrangements','Frontend\ArrangementsController');
Route::post('update_arrangement/{id}',array('as'=>'arrangement.set','uses'=>'Frontend\ArrangementsController@updateArrangement'));
Route::get('delete_arrangement/{id}',array('as'=>'arrangement.remove','uses'=>'Frontend\ArrangementsController@deleteArrangement'));
//----------------------
//Bookings routes 
Route::resource('bookings','Frontend\BookingsController');
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
Route::get('/home', 'Frontend\HomeController@index')->name('home');
});



Auth::routes();
Route::get('logout',array('as'=>'logout','uses'=>'Auth\LoginController@logout'));


