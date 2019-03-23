<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Bookingtype;


class Booking extends Model
{
    use SoftDeletes;
    protected $table="bookings";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function bookingType(){
        return $this->hasMany('App\Models\Bookingtype','booking_id');
    }
    public function hotel (){
        return $this->belongsTo('App\Models\Hotel','hotel_id');
    }
    
}
