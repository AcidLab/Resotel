<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Room;
use App\Models\Picture; 
class Hotel extends Model
{
    use SoftDeletes;
    protected $table="hotels";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }

    public function pictures (){
        return $this->hasMany('App\Models\Picture');
    }
}
