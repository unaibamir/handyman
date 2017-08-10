<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class Client extends Authenticatable
{
    use Notifiable;
    use Metable;


    protected $guard = 'client';

    protected $metaTable = 'clients_meta';

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

    /**
     * Get the jobs for the client.
     */
    public function jobs()
    {
        return $this->hasMany('App\Job', 'client_id');
    }

    /**
     * Get the proposal associated with the client.
     */
    public function proposals()
    {
        return $this->hasMany('App\Proposal', 'client_id', 'id');
    }

    public function contract() {
        return $this->hasMany('App\Contract', 'client_id', 'id');
    }


    public function getFullNameAttribute()
    {
        return $this->fname . " " . $this->lname;
    }

    public function getUserImageAttribute() {
        return ( !empty($this->user_image) ? $this->user_image : 'profiles/clients/default.png' );
    }


}
