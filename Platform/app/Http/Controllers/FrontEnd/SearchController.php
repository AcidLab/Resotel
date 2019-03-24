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
use App\Models\Service;
use App\Models\Equipement;


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
        $services = Service::all();
        $equipements = Equipement::all();
        if($request->arrival_date != null && $request->arrival_date != ""){
            $arrival_date=$request->input('arrival_date');
        }
        else {
            $arrival_date=date('Y-m-d');
        }
        if($request->departure_date != null && $request->departure_date != ""){
            $departure_date = date('Y-m-d',strtotime($arrival_date.' + '.$request->input('check_out_date').' days'));
        }
        else {
           $departure_date = date('Y-m-d',strtotime($arrival_date.' + '.'7 days')); 
        }
        
        //return date('Y-m-d',strtotime($request->input('arrival_date').' + '.$request->input('check_out_date').' days'));

        $view->all = $all;
        $view->roomtypes = $roomtypes;
        $view->supplements = $supplements;
        $view->services = $services ;
        $view->equipements = $equipements;
        $view->arrival_date = $arrival_date;
        $view->departure_date = $departure_date;
        return $view ; 
    }

    public function filter(Request $request){
        
    }
    
}
