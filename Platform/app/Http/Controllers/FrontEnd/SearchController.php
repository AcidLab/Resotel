<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Agencie;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BackEnd\HotelController;
use App\Models\Roomtype;
use View;
use App\Models\Hotel;
use App\Models\Arrangement;


class SearchController extends Controller
{

    public function search(Request $request){

       /* $word = $request->input('word');
        $city = $request->input('city');
        $arrival_date=$request->input('arrival_date');
        $check_out_date = $request->input('check_out_date');
        $controller = new HotelController;
        return  $controller->preSearch($word,$city,$arrival_date,$check_out_date);*/
        $view = View::make('platform.search');
        $all = Hotel::all();
        $roomtypes = Roomtype::all();
        $supplements = Arrangement::where('type','=',0)->get();
        $arrival_date=$request->input('arrival_date');
        $departure_date = date('Y-m-d',strtotime($request->input('arrival_date').' + '.$request->input('check_out_date').' days'));
        //return date('Y-m-d',strtotime($request->input('arrival_date').' + '.$request->input('check_out_date').' days'));

        $view->all = $all;
        $view->roomtypes = $roomtypes;
        $view->supplements = $supplements;
        $view->arrival_date = $arrival_date;
        $view->departure_date = $departure_date;
        return $view ; 
        
        
        

        

    }
    
}
