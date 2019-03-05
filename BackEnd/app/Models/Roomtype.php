<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roomtype extends Model
{
    use SoftDeletes;
    protected $table="roomtypes";
    public $timestamps = true;
    protected $dates=['deleted_at'];
}
