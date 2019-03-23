<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    protected $table = "bookings";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function hotel(){
    	return $this->belongsTo('App\Models\Hotel','hotel_id');
    }
    public function agency(){
    	return $this->belongsTo('App\Models\Agency','agency_id');
    }
}
