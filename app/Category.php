<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * Get the jobs associated with the provider.
     */
    public function jobs() {
        return $this->hasMany('App\Job', 'cat_id');
    }

    /**
     * Get the provider for the job proposal.
     */
    public function provider()
    {
        return $this->hasOne('App\Provider', 'id');
    }
}
