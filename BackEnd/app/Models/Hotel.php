<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\City;
use App\Models\Room;
use App\Models\Contract;

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
    
}
