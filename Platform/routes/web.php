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
    return view('showcase.home');
}));
Route::get('partners',array('as'=>'partners','uses'=>function(){
    return view('showcase.partners');
}));
Route::get('contact',array('as'=>'contact','uses'=>function(){
    return view('showcase.contact');
}));

Route::post('send_message',array('as'=>'message.send','uses'=>'HomeController@sendMessage'));


Route::get('/pricing', function () {
    return view('showcase.pricing');
});


Auth::routes();


