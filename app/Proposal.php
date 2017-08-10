<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
     * Get the jobs for the proposal.
     */
    public function job()
    {
        return $this->hasOne('App\Job', 'id', 'job_id');
    }

    /**
     * Get the provider for the job proposal.
     */
    public function provider()
    {
        return $this->hasOne('App\Provider', 'id', 'pro_id');
    }

    /**
     * Get the clients for the job proposal.
     */
    public function client()
    {
        return $this->hasOne('App\Client', 'id', 'client_id');
    }

    /**
     * Get the contract for the job proposal.
     */
    public function contract() {
        return $this->hasOne('App\Contract', 'proposal_id', 'id');
    }
}
