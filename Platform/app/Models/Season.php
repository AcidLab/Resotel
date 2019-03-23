<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SoftDeletes;
    protected $table="seasons";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function contract(){
        return $this->belongsTo('App\Models\Contract','contract_id');
    }
}
