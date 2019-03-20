<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipement extends Model
{
    use SoftDeletes;
    protected $table="equipements";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
