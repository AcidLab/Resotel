<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotelequipement extends Model
{
    use SoftDeletes;
    protected $table="hotels_equipements";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
