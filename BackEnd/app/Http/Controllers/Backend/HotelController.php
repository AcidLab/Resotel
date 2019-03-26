<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\City;
use App\Models\Contract;
use App\Models\Season;
use App\Models\Roomtype;
use App\Models\Arrangement;
use App\Models\Room;
use App\Models\Pricing;
use App\Models\Personsupp;
use App\Models\Hotelservice;
use App\Models\Service;
use App\Models\Picture;
use App\Http\Controllers\Controller;
use View;
use Session;
use Redirect;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
       
        $view = View::make('hotels.index');
        $view->hotels = $hotels;
        
        return $view;
        
    }
    public function hotelFirstCreatePage(){
        return $this->hotelReturnCreatePage(0,null);
    }
    public function hotelReturnCreatePage($status,$object){

        switch($status) { 
            case '0': {

                $view = View::make('hotels.create.hotel');
                $cities = City::all();
                $view->cities = $cities;
                return $view;
                break;

            }

            case '1' : {
               
                    if ($object) {
                        $hotel = Hotel::find($object->id);
                        if ($hotel) {
                            
                            $view=View::make('hotels.create.contract');
                            $view->hotel = $hotel;
                            return $view;
                        }
    
                        else {
                            $view=View::make('hotels.create.hotel');
                            $cities = City::all();
                            $view->cities = $cities;
                            return $view;
                        }
                    }
                
               

                else {
                    $view=View::make('hotels.create.hotel');
                    $cities = City::all();
                    $view->cities = $cities;
                    return $view;
                }
                break;
            }

            case '2' : {
                if($object){
                    $contract= Contract::find($object->id);
                    $types = Roomtype::all();
                    if($contract){
                        $view = View::make('hotels.create.season');
                        $view->contract = $contract;
                        $view->seasons_number = $contract->seasons_number;
                        $view->types = $types;
                        return $view;
                    }
                    else {
                            $view=View::make('hotels.create.hotel');
                            $cities = City::all();
                            $view->cities = $cities;
                            return $view;
                    }
                    
                }
                else {
                    $view=View::make('hotels.create.hotel');
                            $cities = City::all();
                            $view->cities = $cities;
                            return $view;  
                }
                break;
            }

            case '3' :{
                if($object){
                    $season = Season::find($object->id);
                    $types = Roomtype::all();
                    $final_types = array();
                    $arrangements = Arrangement::where('type','=','1')->get();
                    if($season){
                        $view = View::make('hotels.create.room');
                        /*$contract = Contract::find($season->contract_id);
                        $seasons = $contract->seasons;*/
                        $view->season = $season;
                        //$view->types = $types;
                        $view->arrangements = $arrangements;
                        //$view->seasons = $seasons;
                        if(Session::get('room_types')){
                            $room_types = Session::get('room_types');
                            Session::forget('room_types');
                            foreach($types as $row){
                                if(is_array($room_types) && in_array($row->id,$room_types)){
                                    $final_types[]=$row;
                                }
                            }
                            $view->types = $final_types;
                        }
                        else{
                            $view->types = $types;
                        }
                        return $view;
                    }
                    else{
                            $view=View::make('hotels.create.hotel');
                            $cities = City::all();
                            $view->cities = $cities;
                            return $view;
                    }
                }
                else{
                            $view=View::make('hotels.create.hotel');
                            $cities = City::all();
                            $view->cities = $cities;
                            return $view;
                }
                break;
                
            }

            case '4':{
                if($object){
                    $hotel = Hotel::find($object->id);
                    if($hotel){
                        
                        $contract = Contract::where('hotel_id','=',$hotel->id)->get()[0];
                        $seasons = $contract->seasons;
                        $rooms = $hotel->rooms;
                        $room = $rooms[count($rooms)-1];
                        $arrangement = Arrangement::find($room->arrangement_id);
                        $arrangements = Arrangement::where('type','=',0)->get();
                        $view = View::make('hotels.create.pricing');
                        $view->seasons = $seasons;
                        $view->arrangement = $arrangement;
                        $view->rooms = $rooms;
                        $view->arrangements = $arrangements;
                        return $view;
                    }
                    else{
                            $view=View::make('hotels.create.hotel');
                            $cities = City::all();
                            $view->cities = $cities;
                            return $view;
                    }

                }
                else{
                    $view=View::make('hotels.create.hotel');
                    $cities = City::all();
                    $view->cities = $cities;
                    return $view;
                }
                break;
                
            }

            case '5': {
                if($object){
                    $hotel = Hotel::find($object->id);
                    $final_supps = array();
                    if($hotel){
                        $view = View::make('hotels.create.extra_charges');
                        $view->hotel = $hotel;
                        
                        if(Session::get('extra_charges')){
                            $extra_charges = Session::get('extra_charges');
                            Session::forget('extra_charges');
                            $supps = Arrangement::where('type','=',0)->get();
                            foreach($supps as $row){
                                if(is_array($extra_charges) && in_array($row->id,$extra_charges)){
                                    $final_supps[]=$row;
                                }
                            }
                            $view->final_supps = $final_supps;
                        }
                        else {
                            $view->final_supps = $supps;
                        }
                        
                        return $view;
                    }
                    else {
                        $view=View::make('hotels.create.hotel');
                        $cities = City::all();
                        $view->cities = $cities;
                        return $view;
                    }

                }
                else{
                    $view=View::make('hotels.create.hotel');
                    $cities = City::all();
                    $view->cities = $cities;
                    return $view;
                }
                break;

            }

            case  '6' :  {
                if($object){
                    $hotel = Hotel::find($object->id);
                    if($hotel){
                        $view = View::make('hotels.create.retrocession_time');
                        $view->hotel = $hotel;
                        return $view ;
                    }
                    else {
                        $view=View::make('hotels.create.hotel');
                        $cities = City::all();
                        $view->cities = $cities;
                        return $view;
                    }
                }
                else {
                    $view=View::make('hotels.create.hotel');
                    $cities = City::all();
                    $view->cities = $cities;
                    return $view; 
                }
                break;
                
            }

            case '7' : {
                if($object){
                    $hotel = Hotel::find($object->id);
                    $room_types_id = array();
                    $final_room_types = array();
                    $room_types = Roomtype::all() ;
                    
                    if($hotel){
                        $rooms = $hotel->rooms;
                         foreach($rooms as $row){
                             $room_types_id[]=$row->type_id;
                         }
                         foreach($room_types as $all){
                             if(is_array($room_types_id) && in_array($all->id,$room_types_id)){
                                 $final_room_types[]=$all;
                             }
                         }
                        $view = View::make('hotels.create.charges_by_ages');
                        $view->hotel = $hotel;
                        $view->final_room_types = $final_room_types;
                        return $view;                        
                    }
                    else {
                        $view=View::make('hotels.create.hotel');
                        $cities = City::all();
                        $view->cities = $cities;
                        return $view; 
                    }

                }
                else {
                        $view=View::make('hotels.create.hotel');
                        $cities = City::all();
                        $view->cities = $cities;
                        return $view; 
                }
                break;
            }

            

            default: {
                $view=View::make('hotels.create.hotel');
                $cities = City::all();
                $view->cities = $cities;
                return $view;
                break;
            }
        }
        
        
    }


    public function store(Request $request){
        $hotel = new Hotel;
        $hotel->name=$request->input('name');
        $hotel->postal_code = $request->input('postal_code');
        $hotel->city_id = $request->input('city_id');
        $hotel->address = $request->input('address');
        $hotel->local_stars_number = $request->input('local_stars_number');
        $hotel->to_stars_number = $request->input('to_stars_number');
        $hotel->beds_number = $request->input('beds_number');
        $hotel->save();
        while(!$hotel){}
        $hotel->keywords = $hotel->name.' '.$hotel->postal_code.' '.$hotel->city->label.' '.$hotel->address.' '.$hotel->local_stars_number.' '.$hotel->to_stars_number.' '.$hotel->beds_number ;
        $hotel->save();
        while(!$hotel){}
        //return $hotel;
            if($request->file('pictures')){
                for($i=0;$i<count($request->file('pictures'));$i++){
                    $picture = new Picture;
                    $file = $request->file('pictures')[$i];
                    $filename = $file->store(config('hotels_pictures_path'),'public');
                    $picture->path = asset($filename);
                    $picture->hotel_id = $hotel->id;
                    $picture->save();  
                }
            }
        $object=array('hotel'=>$hotel);
        $test = json_encode($object);
        //return json_encode($object);
        return $this->hotelReturnCreatePage(1,$hotel);
        //return view('hotels.create.contract');

    }

    public function storeContract (Request $request){
        $contract = new Contract;
        /*$contract->date_from = $request->input('date_from');
        $contract->date_to = $request->input('date_to');*/
        $contract->devise = $request->input('devise');
        //$contract->destination = $request->input('destination');         
        $contract->seasons_number = $request->input('seasons_number');
        $contract->hotel_id = $request->input('hotel_id');
        $contract->save();
        while(!$contract){}
        return $this->hotelReturnCreatePage(2,$contract);
    }

    public function storeSeason(Request $request){
        
        $number_of_seasons = count($request->except(['contract_id','_token','room_types']))  / 2 ;
        $last_season = null;
        $types = array();
        for($j=0;$j<$number_of_seasons;$j++){
            
            $season = new Season;
            $season->contract_id = $request->input('contract_id');
            $season->start_date = $request->input('start_date_'.$j);
            $season->end_date = $request->input('end_date_'.$j);
            $season->save();
            $last_season = $season;
        }
        if($request->input('room_types')){
            for($i=0;$i<count($request->input('room_types'));$i++){
                $types[]=$request->input('room_types')[$i];
            }
        }
        Session::put('room_types',$types);


        return $this->hotelReturnCreatePage(3,$last_season);

    }

    public function storeRoom(Request $request){
        $number_of_room_types = count($request->except(['contract_id','arrangement_id','_token'])) / 12;
        $contract = Contract::find($request->input('contract_id'));
        $hotel = Hotel::find($contract->hotel_id);
        //$hotel_rooms_number = 0;
        for($i=0;$i<$number_of_room_types;$i++){
            $room = new Room;
            $room->type_id = $request->input('type_id_'.$i);
            $room->hotel_id = $hotel->id;
            $room->allotement = $request->input('allotement_'.$i);
            $room->room_code = $request->input('room_code_'.$i);
            $room->full_price = $request->input('full_price_'.$i);
            $room->min_persons = $request->input('min_person_'.$i);
            $room->max_persons = $request->input('max_person_'.$i);
            $room->min_major = $request->input('min_major_'.$i) ;
            $room->max_major = $request->input('max_major_'.$i);
            $room->min_children = $request->input('min_children_'.$i);
            $room->max_children = $request->input('max_children_'.$i);
            $room->max_babies = $request->input('max_baby_'.$i);
            $room->arrangement_id = $request->input('arrangement_id');
            $room->save();
            //$hotel_rooms_number+= $request->input('allotement_'.$i);
        }
        
        return $this->hotelReturnCreatePage(4,$hotel);
    }

    public function storePricing(Request $request){
        $number_of_types = $request->input('room_types_number');
        $number_of_seasons = $request->input('seasons_number');
        $a_season = $request->input('sason_id_0_0');
        
        $season = Season::find($a_season);
        $contract = Contract::find($season->contract_id);
        $hotel = Hotel::find($contract->hotel_id);
        $extra_charges = array();
        for($i=0;$i<$number_of_types;$i++){
            for($j=0;$j<$number_of_seasons;$j++){
                $pricing = new Pricing;
                $pricing->arrangement_id = $request->input('arrangement_id');
                $pricing->room_type_id = $request->input('room_type_'.$i);
                $pricing->season_id = $request->input('sason_id_'.$i.'_'.$j);
                $pricing->price = $request->input('arrangement_price_'.$i.'_'.$j);
                $pricing->hotel_id = $hotel->id;
                $pricing->save();
            }
        }
        if($request->input('extra_charges')){
            for($i=0;$i<count($request->input('extra_charges'));$i++){
                $extra_charges[]=$request->input('extra_charges')[$i];
            }
        }
        Session::put('extra_charges',$extra_charges);
        return $this->hotelReturnCreatePage(5,$hotel);

    }

    public function storeExtraCharges(Request $request){
        $number_of_supps = $request->input('number_of_supps');
        $number_of_seasons = $request->input('seasons_number');
        $hotel_id = $request->input('hotel_id');
        for($i=0;$i<$number_of_supps;$i++){
            for($j=0;$j<$number_of_seasons;$j++){
                $pricing = new Pricing;
                $pricing->hotel_id = $hotel_id;
                $pricing->arrangement_id = $request->input('arrangement_id_'.$i) ;
                $pricing->room_type_id = 0;
                $pricing->season_id = $request->input('season_id_'.$i.'_'.$j) ; 
                $pricing->price = $request->input('price_'.$i.'_'.$j) ;
                $pricing->save();
                   
            }
        }

        //return Redirect::to(route('hotels.index'));
        return $this->hotelReturnCreatePage(6,Hotel::find($hotel_id));
    }

    public function storeRetrocessionTimes(Request $request){
        $hotel_id = $request->input('hotel_id');
        $number_of_seasons = $request->input('number_of_seasons');
        for($i=0;$i<$number_of_seasons;$i++){
            $pricing = new Pricing;
            $pricing->arrangement_id = 0 ;
            $pricing->room_type_id = 0 ;
            $pricing->hotel_id = $hotel_id ;
            $pricing->season_id = $request->input('season_id_'.$i);
            $pricing->price = $request->input('retrocession_time_'.$i);
            $pricing->save();

        }
        //return Redirect::to(route('hotels.index'));
        return $this->hotelReturnCreatePage(7,Hotel::find($hotel_id));

    }

    public function storeExtraChargesByAges (Request $request){
            $hotel_id = $request->input('hotel_id');
            $number_of_seasons = $request->input('number_of_seasons');
            $room_types = '';
            for($i=0;$i<5;$i++){
                for($j=0;$j<$number_of_seasons;$j++){
                    $personsupp = new Personsupp ;
                    $personsupp->type = $request->input('type_'.$i);
                    $personsupp->hotel_id = $hotel_id;
                    $personsupp->season_id = $request->input('season_id_'.$i.'_'.$j);
                    $personsupp->age_from = $request->input('from_'.$i);
                    $personsupp->age_to = $request->input('to_'.$i);
                    
                        for($k=0;$k<count($request->input('room_types_'.$i));$k++){
                            $room_types = $room_types.''.$request->input('room_types_'.$i)[$k].';';
                        }
                    
                    $personsupp->rooms_types = $room_types;
                    $room_types = '';
                    $personsupp->percentage = $request->input('percentage_'.$i.'_'.$j).'%';
                    $personsupp->save();
                }
                
                
            }
            $request->session()->flash('success','Hotel ajouté avec succés ! ');
            return Redirect::to(route('hotels.index'));
    }

    public function affectServicesPage($id){
        $hotel = Hotel::find($id);
        $view = View::make('hotels.edit.affect_services');
        $services = Service::all();
        $view->services = $services ;
        $view->hotel = $hotel;
        return $view;
    }

    public function affectServicesStore(Request $request){
        for($i=0;$i<count($request->input('services'));$i++){
            $hotelservice = new Hotelservice;
            $hotelservice->hotel_id = $request->input('hotel_id');
            $hotelservice->service_id = $request->input('services')[$i];
            $hotelservice->save();
        }
        $request->session()->flash('success','Les services ont été affectés avec succés !');
        return Redirect::to(route('hotels.index'));
    }
    
    



    public function rechercheHotel (Request $request)
    {
        $ser = $request->input('chercher');
        $splitted = explode(' ',$ser);
        $res = array();
        foreach ($splitted as $key) {

            $query = Hotel::where('key_word','LIKE','%'.$key.'%')->get();

            foreach ($query as $q) {
                $res[] = $q;
            }
            
        }




        if(count($res) == 0)
        {
            return 'no result';
        }
         else 
        {
            $finalRes = array();

            

            for ($i=0; $i <count($res) ; $i++) { 
                
                if ($i == 0) {
                    $finalRes[] = $res[$i];
                }

                else {

                    if ( ($finalRes[count($finalRes)-1])->id != $res[$i]->id ) {

                        $finalRes[] = $res[$i];
                    }
                }
            }

            return $finalRes;

        }
    }
}
