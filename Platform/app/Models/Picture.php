<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Hotel;

class Picture extends Model
{
    use SoftDeletes;
    protected $table="pictures";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function hotel (){
        return $this->belongsTo('App\Models\Hotel','hotel_id');
    }
}
