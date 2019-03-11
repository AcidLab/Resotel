<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Agencie;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BackEnd\HotelController;
use App\Models\Roomtype;

class SearchController extends Controller
{

    public function search(Request $request){

        $word = $request->input('word');
        $city = $request->input('city');
        $arrival_date=$request->input('arrival_date');
        $check_out_date = $request->input('check_out_date');
        $controller = new HotelController;
        return  $controller->preSearch($word,$city,$arrival_date,$check_out_date);
        


        

    }
    
}
