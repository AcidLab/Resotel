<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use SoftDeletes;
    protected $table="seasons";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
