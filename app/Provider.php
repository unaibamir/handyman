<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kodeine\Metable\Metable;

class Provider extends Authenticatable
{
    use Notifiable;
    use Metable;

    protected $guard = 'provider';

    protected $metaTable = 'providers_meta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function jobtype()
    {
        return $this->belongsTo('App\JobType','jobtype_id', 'id');
    }
}
