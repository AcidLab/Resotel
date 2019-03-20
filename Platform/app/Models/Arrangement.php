<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arrangement extends Model
{
    use SoftDeletes;
    protected $table="arrangements";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
