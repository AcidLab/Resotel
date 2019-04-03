<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agencytoadd extends Model
{
    use SoftDeletes;
    protected $table = "agencies";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
