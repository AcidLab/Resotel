<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Season;


class Contract extends Model
{
    use SoftDeletes;
    protected $table = "contracts";
    protected $dates=['deleted_at'];
    public $timestamps = true;

    public function seasons(){
        return $this->hasMany('App\Models\Season');
    }
}
