<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\City;
use App\Models\Contract;
use App\Models\Season;
use App\Models\Roomtype;
use App\Models\Arrangement;
use App\Http\Controllers\Controller;
use View;
use Session;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        $view = View::make('hotels.index');
        $view->hotels = $hotels;
        return $view;
        //return $this->hotelReturnCreatePage(0,null);
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
        $object=array('hotel'=>$hotel);
        $test = json_encode($object);
        //return json_encode($object);
        return $this->hotelReturnCreatePage(1,$hotel);
        //return view('hotels.create.contract');

    }

    public function storeContract (Request $request){
        $contract = new Contract;
        $contract->date_from = $request->input('date_from');
        $contract->date_to = $request->input('date_to');
        $contract->devise = $request->input('devise');
        $contract->destination = $request->input('destination');
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
        
    }
    
    public function addHotel (Request $request)
    {
    	$name = $request->input('name');
    	$social_reason = $request->input('social_reason');
    	$address = $request->input('address');
    	$email = $request->input('email');
    	$phone = $request->input('phone');
    	$stars_number = $request->input('stars_number');
    	$trade_register = $request->input('trade_register');
    	$license_number = $request->input('license_number');
        $key_word = $name.' '.$social_reason.' '.$address.' '.$email.' '.$phone.' '.$stars_number.' '.$trade_register.' '.$license_number;


    	$hotel = new Hotel;
    	$hotel->name=$name;
    	$hotel->social_reason=$social_reason;
    	$hotel->address=$address;
    	$hotel->email=$email;
    	$hotel->phone=$phone;
    	$hotel->stars_number=$stars_number;
    	$hotel->trade_register=$trade_register;
    	$hotel->license_number=$license_number;
        $hotel->key_word=$key_word;

    	
    	$hotel->save();



    	return $hotel;
 	}


 	public function deleteHotel(Request $request)
 	{
 		$id = $request->input('id');



 		$hotel = Hotel::find($id);

        $rooms = $hotel->rooms;
        foreach ($rooms as $row) {
            $row->delete();
        }
 		$hotel->delete();

 		return 'ok';
 	}

    public function showHotelDetails(Request $request)
    {
        $id = $request->input('id');
        $hotel = Hotel::find($id);

        return $hotel;
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
