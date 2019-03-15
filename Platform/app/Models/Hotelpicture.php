<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Hotel;
use App\Models\Picture ;

class Hotelpicture extends Model
{
    use SoftDeletes;
    protected $table="hotels_pictures";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function hotel(){
        return $this->belongsTo('App\Models\Hotel','hotel_id');
    }

    public function picture(){
        return $this->belongsTo('App\Models\Picture','picture_id');
    }
}
