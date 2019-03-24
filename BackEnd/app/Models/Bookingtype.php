<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roomtype;
use App\Models\Hotel;
use App\Models\Pricing;
use App\Models\Room;
use App\Models\Personsupp;


class Bookingtype extends Model
{
    use SoftDeletes;
    protected $table = "bookings_types";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function roomType (){
        return $this->belongsTo('App\Models\Roomtype','room_type');
    }
    public function booking(){
    	return $this->belongsTo('App\Models\Booking','booking_id');
    }
    public function hotel(){
    	return $this->belongsTo('App\Models\Hotel','hotel_id');
    }
    public function roomPriceInSeason(){
        $arrival_date = $this->booking->arrival_date;
        $room_type = $this->room_type;
        $s = null;
        $supplementsPrice = 0;

            foreach($this->hotel->contracts[0]->seasons as $season){
                if($season->end_date >= $arrival_date && $season->start_date <= $arrival_date){
                    $s = $season;
                    break;
                }
            }
            $room_price_in_season = Pricing::where([['arrangement_id','<>',0],['hotel_id','=',$this->hotel->id],['season_id','=',$s->id],['room_type_id','=',$room_type]])->get()[0]->price; 
            if($this->supplements){
                for($i=0;$i<count(explode(';',$this->supplements));$i++){
                   if(explode(';',$this->supplements)[$i]){
                        $supplementsPrice += Pricing::where([['arrangement_id','=',explode(';',$this->supplements)[$i]],['room_type_id','=',0],['season_id','=',$s->id],['hotel_id','=',$this->hotel->id]])->get()[0]->price;
                            

                        
                   } 
                }
            }
            $room_min_persons = Room::where([['hotel_id','=',$this->hotel->id],
            ['type_id','=',$this->roomType->id]])->get()[0]->min_persons;
            $extra_majors_price = 0;
            $room_min_majors = Room::where([['hotel_id','=',$this->hotel->id],
            ['type_id','=',$this->roomType->id]])->get()[0]->min_major ;
            $room_min_childrens =  Room::where([['hotel_id','=',$this->hotel->id],
            ['type_id','=',$this->roomType->id]])->get()[0]->min_children ;
            $extra_childrens_price = 0;
            if(($this->majors_number + $this->childrens_number) > $room_min_persons){
                if($this->majors_number > $room_min_majors){

                    $extra_majors_price = $this->extraMajorsPrices($room_min_majors,$s,$room_price_in_season);

                }
                if($this->childrens_number>$room_min_childrens){
                    $extra_childrens_price = $this->extraChildrensPrices($room_min_childrens,$s,$room_price_in_season);
                }
            }
            else {
                
            }
            return $room_price_in_season + $supplementsPrice + $extra_majors_price + $extra_childrens_price ;
             
    }
    public function extraMajorsPrices ($room_min_majors,$season,$room_price_in_season){
            
            $number_of_extra_majors = 0;
            $extra_majors_price = 0 ;
            $percentage = 0;
            $number_of_extra_majors = $this->majors_number - $room_min_majors ;
            $personsupp = Personsupp::where([['type','=',4],['season_id','=',$season->id],['hotel_id','=',$this->hotel->id]])->get()[0];
            
                for($i=0;$i<count(explode(';',$personsupp->rooms_types));$i++){
                    if(explode(';',$personsupp->rooms_types)[$i] ){
                        if($this->roomType->id == explode(';',$personsupp->rooms_types)[$i]){
                            $percentage = explode('%',$personsupp->percentage)[0];
                            break;
                        }
                        
                    }
                    
                    
                    
                }
                $extra_majors_price = (($room_price_in_season * $percentage)/100) * $number_of_extra_majors;
                return $extra_majors_price;


            }

            public function extraChildrensPrices($room_min_childrens,$s,$room_price_in_season){
                $number_of_extra_childrens = 0;
                $extra_childrens_price = 0 ;
                $percentage = 0;
                $number_of_extra_childrens = $this->childrens_number - $room_min_childrens ;
                if($number_of_extra_childrens == 1 ){
                    $personsupp = Personsupp::where([['type','=',1],['season_id','=',$s->id],['hotel_id','=',$this->hotel->id]])->get()[0];
                }
                else if($number_of_extra_childrens == 2){
                    $personsupp = Personsupp::where([['type','=',2],['season_id','=',$s->id],['hotel_id','=',$this->hotel->id]])->get()[0];
                }
                for($i=0;$i<count(explode(';',$personsupp->rooms_types));$i++){
                    if(explode(';',$personsupp->rooms_types)[$i] ){
                        if($this->roomType->id == explode(';',$personsupp->rooms_types)[$i]){
                            $percentage = explode('%',$personsupp->percentage)[0];
                            break;
                        }
                        
                    }
            }
            $extra_childrens_price = (($room_price_in_season * $percentage)/100) * $number_of_extra_childrens;
                return $extra_childrens_price;
        }
}
