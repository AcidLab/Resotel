<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookingtype extends Model
{
    use SoftDeletes;
    protected $table="bookings_types";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}