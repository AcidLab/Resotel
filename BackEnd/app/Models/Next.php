<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Next extends Model
{
    use SoftDeletes;
    protected $table = "nexts";
    protected $dates=['deleted_at'];
    public $timestamps = true;
}
