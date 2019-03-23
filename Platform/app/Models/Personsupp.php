<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personsupp extends Model
{
    use SoftDeletes;
    protected $table="personsupps";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
