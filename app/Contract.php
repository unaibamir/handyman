<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{


    public function job()
    {
        return $this->hasOne('App\Job', 'id', 'job_id');
    }

    public function client() {
        return $this->hasOne('App\Client', 'id', 'client_id');
    }

    public function provider() {
        return $this->hasOne('App\Provider', 'id', 'provider_id');
    }

    public function proposal() {
        return $this->hasOne('App\Proposal', 'id', 'proposal_id');
    }
}
