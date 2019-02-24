<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Place extends Model
{
    use SoftDeletes;
    protected $table = "places";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
