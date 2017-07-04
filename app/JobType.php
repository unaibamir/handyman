<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'jobtype';

    public function providers()
    {
        return $this->hasMany('App\Provider','jobtype_id','id');
    }
}
