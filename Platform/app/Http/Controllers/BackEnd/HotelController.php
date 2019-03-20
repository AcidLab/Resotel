<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Models\Arrangement;
use View;

class HotelController extends Controller
{
    


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

    public function preSearch($w,$c,$arr_d,$c_o_d){
        $all = array();
        $temp_two = array();
        $temp = array();
        $todayDate = date('Y-m-d');
        $rooms_number = 0;
        if($w == '' && $c == '' && $arr_d == '' && $c_o_d == ''){
            $hotels = Hotel::all();
            foreach($hotels as $row){
                
                $bookings=Booking::where([['status','=',1],['hotel_id','=',$row->id],['departure_date','>',$todayDate]])->get();
                foreach($bookings as $key){
                    //$dateDiff = strtotime($todayDate) - strtotime($key->departure_date);
                        $rooms_number += $key->rooms_number;
                }
                if($rooms_number < count($row->rooms)){
                    $all[]=$row;
                }
            }
        }
        else{
           
            
            $keywords = explode(' ',$w);
            
            foreach($keywords as $row){
               $hotels = Hotel::where([['keywords','like','%'.$row.'%'],['city_id','=',$c]])->orderBy('id','asc')->get();
                foreach($hotels as $key=>$hotel){
                    if($key==0){
                        $temp_two[] = $hotel;
                    }
                    else{
                        if($hotel->id != $temp_two[count($temp_two) - 1]->id){
                            $temp_two[]=$hotel;
                        }
                    }
                }
               foreach($temp_two as $t){
                 if($arr_d != '' &&  $c_o_d != ''){
                    $bookings=Booking::where([['status','=',1],['hotel_id','=',$t->id],['departure_date','>=',$c_o_d],['arrival_date','<=',$arr_d]])->orderBy('id','asc')->get();

                 }
                 else if($arr_d == ''){
                    $bookings=Booking::where([['status','=',1],['hotel_id','=',$t->id],['departure_date','>=',$c_o_d],['arrival_date','<=',date('Y-m-d')->modify('+1 day')]])->orderBy('id','asc')->get();
                 }
                 else if($c_o_d == ''){
                    $bookings=Booking::where([['status','=',1],['hotel_id','=',$t->id],['departure_date','>=',$todayDate],['arrival_date','<=',$arr_d]])->orderBy('id','asc')->get();

                 }
                 foreach($bookings as $key){
                        $rooms_number += $key->rooms_number;
                }
                if($rooms_number < count($t->rooms)){
                    $temp[]=$t;
                }



               }

               
            }
            
            

        }
        foreach($temp as $key=>$row){
            if($key==0){
                $all[]=$row;
            }
            else{
                if($row->id != $all[count($all) - 1 ]->id){
                    $all[]=$row;
                }
            }
        }
        
        $view=View::make('platform.search');
        if(count(Booking::all())>0){
            $view->all = $all;  
        } 
        else {
            $view->all = Hotel::all();
        }
        
        return $view;
    }

    public function show($id){
        $hotel = Hotel::find($id);
        $supplements = Arrangement::where('type','=',0)->get();
        $view = View::make('hotels.show');
        $view->hotel = $hotel ;
        $view->supplements = $supplements;
        return $view; 
    }

    
}
