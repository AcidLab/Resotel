<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Room;
use App\Http\Controllers\Controller;
use Redirect;
use View;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        $view = View::make('hotels.index');
        $view->hotels = $hotels;
        return $view;
    }
    public function hotelCreatePage($status,$object){
        $status = $status;

        switch($status) { 
            case '0': {

                return view ('hotels.create.hotel');
                break;

            }

            case '1' : {
                if ($object->hotel) {
                    $hotel = Hotel::find($object->hotel->id);
                    if ($hotel) {
                        return view ('hotels.create.contract');
                    }

                    else {
                        return view ('hotels.create.hotel');
                    }
                }

                else {
                    return view ('hotels.create.hotel');
                }
                break;
            }

            default: {
                return view ('hotels.create.hotel');
                break;
            }
        }
        
        
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
