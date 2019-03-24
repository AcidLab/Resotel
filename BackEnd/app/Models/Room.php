<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roomtype;

class Room extends Model
{
    use SoftDeletes;
    protected $table = "rooms";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function type(){
        return $this->belongsTo('App\Models\Roomtype','type_id');
    }
     public function arrangement (){
        return $this->belongsTo('App\Models\Arrangement','arrangement_id');
    }
}
