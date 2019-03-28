<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $table = "comments";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function agency(){
    	return $this->belongsTo('App\Models\Agency','agency_id');
    }
}
