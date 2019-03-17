<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotelservice extends Model
{
    use SoftDeletes;
    protected $table="hotels_services";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
