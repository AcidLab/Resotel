<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\City;
use App\Models\Room;
use App\Models\Contract;
use App\Models\Pricing;
use App\Models\Arrangement;

class Hotel extends Model
{
    use SoftDeletes;
    protected $table = "hotels";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function city(){
        return $this->belongsTo('App\Models\City','city_id');
    }
    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }
    public function contracts (){
        return $this->hasMany('App\Models\Contract');
    }
    public function supplements (){
        $arrangements = array();
        $supplements = array();
        foreach(Pricing::where('hotel_id','=',$this->id)->get() as $pricing){
            $arrangements[] = $pricing->arrangement_id ;
        }
        foreach(Arrangement::where('type','=',0)->get() as $arr){
            if(is_array($arrangements) && in_array($arr->id,$arrangements)){
                $supplements[] = $arr;
            }
        }
        return $supplements;

    }
    
    
}
