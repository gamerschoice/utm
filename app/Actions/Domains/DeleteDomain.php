<?php

namespace App\Actions\Domains;

use App\Models\Domain;
use App\Actions\Domains\DeleteShortDomain;


class DeleteDomain
{

    protected DeleteShortDomain $shortDomainDeleter;

    public function __construct(DeleteShortDomain $shortDomainDeleter)
    {
        $this->shortDomainDeleter = $shortDomainDeleter;
    }


    /**
     * @todo make shortdomain delete action into a queuable job
     */
    public function delete(Domain $domain)
    {

        if($domain->shortdomain) {
            $this->shortDomainDeleter->delete($domain);
        }
        
        $domain->links()->delete();
        
        return $domain->delete();

    }
}