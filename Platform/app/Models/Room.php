<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roomtype;
use App\Models\Arrangement;
use App\Models\Hotel;
use App\Models\Bookingtype;
use App\Models\Booking;


class Room extends Model
{
    use SoftDeletes;
    protected $table="rooms";
    protected $dates=['deleted_at'];
    public $timestamps = true;
    
    public function type (){
        return $this->belongsTo('App\Models\Roomtype','type_id');
    }

    public function arrangement (){
        return $this->belongsTo('App\Models\Arrangement','arrangement_id');
    }

    public function availableRooms ($hotel_id,$arrival_date,$departure_date){

        $hotel = Hotel::find($hotel_id);
        $type = $this->type;
        $total_number_rooms = 0;
        $total_booked_rooms = 0;
        foreach($hotel->roomTypes as $row){
            if($row->type_id == $type->id){
                $total_number_rooms = $row->allotement;
                //ma77a tip
                break;
            }
        }
        
        //$hotel_bookings = Bookingtype::where([['hotel_id','=',$hotel_id],['room_type','=',$type->id]])->get();
        $bookings = Booking::where([['hotel_id','=',$hotel_id],['status','=',1],['departure_date','>',$arrival_date],['arrival_date','<=',$departure_date]])->get();
        foreach($bookings as $row){
            foreach($row->bookingType as $hb){
                if($hb->room_type == $type->id){
                    $total_booked_rooms += 1;
                }
            }
        }


        return $total_number_rooms - $total_booked_rooms ;
        
    }
}
