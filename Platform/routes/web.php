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
Route::get('/',function(){
    return Redirect::to(route('home'));
});


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('home',array('as'=>'home','uses'=>function(){

    if (Auth::user()) {
        return view('platform.home');
    }

    else {
        return view('showcase.home');
    }
    
}));



Route::get('search_page',function(){
    return view('platform.search');
});


Route::get('/pricing', function () {
    return view('showcase.pricing');
});

Route::group(['middleware' => 'auth','middleware' => 'verified'], function(){

    Route::get('search',array('as'=>'search','uses'=>function(){
        return view('platform.search');
    }));
    
    Route::get('search_hotel',array('as'=>'hotel.search','uses'=>'SearchlController@search'));
    Route::get('hotel_details/{id}',array('as'=>'hotel.details','uses'=>'Backend\HotelController@returnHotelDetails'));
    Route::resource('hotels','Backend\HotelController');

});



Route::get('search_hotel',array('as'=>'hotel.search','uses'=>'SearchlController@search'));
Route::get('filter_search_results',array('as'=>'searchResults.filter','uses'=>'SearchlController@filter'));
Route::get('hotel_details/{id}',array('as'=>'hotel.details','uses'=>'Backend\HotelController@returnHotelDetails'));
Route::resource('hotels','Backend\HotelController');
Route::get('hotels/{id}/{arrival_date}/{departure_date}',array('as'=>'hotel.showDetails','uses'=>'Backend\HotelController@show'));



//Bookings routes 
Route::resource('bookings','Backend\BookingsController');
//Route::get('')
//----------------------
Route::get('filter_search_results',array('as'=>'searchResults.filter','uses'=>'SearchlController@filter'));
Route::get('profil',array('as'=>'profil','uses'=>'FrontEnd\ProfileController@index'));
Route::post('profil{id}',array('as'=>'profil.update','uses'=>'FrontEnd\ProfileController@update'));
Route::get('logout',array('as'=>'logout','uses'=>'Auth\LoginController@logout'));
//------- drafts
Route::get('drafts',array('as'=>'drafts','uses'=>'Backend\BookingsController@showAgencyDrafts'));
Route::post('pay_booking/{id}',array('as'=>'booking.pay','uses'=>'Backend\BookingsController@payBooking'));
Route::get('agencybookings',array('as'=>'agencybookings','uses'=>'Backend\BookingsController@showAgencyBookings'));
Route::get('bookinginvoice{id}',array('as'=>'booking.showInvoice','uses'=>'Backend\BookingsController@showInvoice'));
//--------------
//---comments 
Route::resource('comments','Backend\CommentsController');


Auth::routes();
Route::get('thankyou',array('as'=>'thankyou','uses'=> function () {
    return view('showcase.thankyou');
}));
Route::post('send_message',array('as'=>'message.send','uses'=>'HomeController@sendMessage'));
Route::get('partners',array('as'=>'partners','uses'=>function(){
    return view('showcase.partners');
}));
Route::get('contact',array('as'=>'contact','uses'=>function(){
    return view('showcase.contact');
}));
Route::post('testreg',array('as'=>'reg.test','uses'=>'Auth\RegisterController@test'));




