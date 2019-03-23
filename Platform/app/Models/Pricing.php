<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pricing extends Model
{
    use SoftDeletes;
    protected $table="pricings";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
