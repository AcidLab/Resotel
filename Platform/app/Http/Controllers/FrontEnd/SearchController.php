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
<<<<<<< HEAD
use App\Models\Pricing;
use App\Models\Hotelservice;
use App\Models\Hotelequipement;
=======
>>>>>>> origin/master


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

<<<<<<< HEAD
    public function filterByTypes($types){
        $hotels = array();
        foreach(Room::orderBy('hotel_id','asc')->get() as $room){
            if(is_array($types) && in_array($room->type_id,$types)){
                $hotels[]=Hotel::find($room->hotel_id);
            }
        }
        return $hotels ; 
    }
    public function filterBySupplements($supplements){
        $hotels = array();
        foreach(Pricing::where([['arrangement_id','<>',0],['room_type_id','=',0]])->orderBy('hotel_id','asc')->get() as $pricing){
            if(is_array($supplements) && in_array($pricing->arrangement_id, $supplements)){
                $hotels[] = Hotel::find($pricing->hotel_id);
            }

        }
        return $hotels ; 
    }
    public function filterByStars($stars){
        $hotels = array();
        foreach(Hotel::orderBy('id','asc')->get() as $hotel){
            if(is_array($stars) && in_array($hotel->local_stars_number, $stars)){
                $hotels[] = $hotel;
            }
        }
        return $hotels;
    }

    public function filterByServices($services){
        $hotels = array();
        foreach(Hotelservice::orderBy('hotel_id','asc')->get() as $hotelservice){
            if(is_array($services) && in_array($hotelservice->id, $services)){
                $hotels[] = Hotel::find($hotelservice->hotel_id);
            }
        }
        return $hotels;

    }

    public function filterByEquipements($equipements){
        $hotels = array();
        foreach(Hotelequipement::orderBy('hotel_id','asc')->get() as $hotelequipement){
            if(is_array($equipements) && in_array($hotelequipement->id, $equipements)){
                $hotels[] = Hotel::find($hotelequipement->hotel_id);
            }
        }
        return $hotels;

    }

    public function makeAllInOne($types_results,$supplements_results,$stars_results,$services_results,$equipements_results) {
        $all_in_one = array();
        foreach($types_results as $tr){
            $all_in_one[] = $tr;
        }
        foreach ($supplements_results as $sr) {
            $all_in_one[] = $sr; 
        }
        foreach($stars_results as $str){
            $all_in_one[] = $str ;
        }
        foreach ($services_results as $ser) {
            $all_in_one[] = $ser;
        }
        foreach($equipements_results as $er){
            $all_in_one[] = $er;
        }
        return $all_in_one;
    }

    public function orderAll($all_in_one){
        $temp = null;
        $test = true;
        while($test){
            $test = false ;
            for($i=0;$i<count($all_in_one)-1;$i++){
                if($all_in_one[$i]->id > $all_in_one[$i+1]->id){
                    $temp = $all_in_one[$i+1];
                    $all_in_one[$i+1] = $all_in_one[$i];
                    $all_in_one[$i] = $temp;
                    $test = true;
                }
            }
        }
        return $all_in_one;
    }

    public function eliminateRedundancy($orderedAll){
        $final_array = array();
        foreach($orderedAll as $key=>$row){
            if($key == 0){
                $final_array[] = $row;
            }
            else {
                if($row->id != $final_array[count($final_array)-1]->id){
                    $final_array[] = $row;
                }
            }
        }
        return $final_array;
    }

    public function filter(Request $request){

        $types = explode(';',$request->get('types'));
        $supplements = explode(';',$request->get('supplements'));
        $stars = explode(';',$request->get('stars'));
        $services = explode(';',$request->get('services'));
        $equipements = explode(';',$request->get('equipements'));
        $arrival_date = $request->get('arrival_date');
        $departure_date = $request->get('departure_date');
        $types_results = $this->filterByTypes($types);
        $supplements_results = $this->filterBySupplements($supplements);
        $stars_results = $this->filterByStars($stars);
        $services_results = $this->filterByServices($services);
        $equipements_results = $this->filterByEquipements($equipements);
        $all_in_one = $this->makeAllInOne($types_results,$supplements_results,$stars_results,$services_results,$equipements_results);
        $orderedAll = $this->orderAll($all_in_one);
        $all_without_redundancy = $this->eliminateRedundancy($orderedAll);
        $view = View::make('platform.filter_results');
        $view->all = $all_without_redundancy;
        $view->arrival_date = $arrival_date;
        $view->departure_date = $departure_date;
        return $view ; 
=======
    public function filter(Request $request){
        
>>>>>>> origin/master
    }
    
}
