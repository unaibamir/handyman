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

    /**
     * Get the category associated with the provider.
     */
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    /**
     * Get the proposal associated with the provider.
     */
    public function proposals()
    {
        return $this->hasMany('App\Proposal', 'pro_id', 'id');
    }

    public function contract() {
        return $this->hasMany('App\Contract', 'provider_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->fname . " " . $this->lname;
    }

    public function getUserImageAttribute() {
        return ( !empty($this->user_image) ? $this->user_image : 'profiles/clients/default.png' );
    }
}
