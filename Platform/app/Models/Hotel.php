<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Room;
use App\Models\Picture; 
use App\Models\Hotelservice;
use App\Models\Service;
use App\Models\Equipement;
use App\Models\Hotelequipement;
use App\Models\Roomtype;
class Hotel extends Model
{
    use SoftDeletes;
    protected $table="hotels";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }

    public function roomTypes(){
        return $this->hasMany('App\Models\Room');
        

    }

    

    public function pictures (){
        return $this->hasMany('App\Models\Picture');
    }

    public function services(){
        $hotel_services = Hotelservice::where('hotel_id','=',$this->id)->get();
        $services = array();
        $allservices = Service::all();
        foreach($allservices as $row){
            foreach($hotel_services as $key){
                if($row->id == $key->id){
                    $services[]=$row;
                }
            }
        }
        return $services ; 
    }

    public function equipements(){

        $hotel_equipements = Hotelequipement::where('hotel_id','=',$this->id)->get();
        $equipements = array();
        $allequipements = Equipement::all();
        foreach($allequipements as $row){
            foreach($hotel_equipements as $key){
                if($row->id == $key->equipement_id){
                    $equipements[]=$row;
                }
            }
        }
        return $equipements ;

    }




}
