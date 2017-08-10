<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * Get the category associated with the job.
     */
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'cat_id');
    }

    /**
     * Get the client for the job.
     */
    public function client()
    {
        return $this->hasOne('App\Client', 'id', 'client_id');
    }


    /**
     * Get the proposal associated with the job.
     */
    public function proposals()
    {
        return $this->hasMany('App\Proposal', 'job_id', 'id');
    }

    /**
     * Get the provider for the job.
     */
    /*public function provider()
    {
        return $this->hasMany('App\Provider', 'id', 'provider_id');
    }*/
}
