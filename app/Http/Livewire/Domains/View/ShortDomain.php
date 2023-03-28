<?php

namespace App\Http\Livewire\Domains\View;
use App\Models\Domain;
use Livewire\Component;
use Filament\Notifications\Notification; 
use Illuminate\Support\Facades\Validator;
use App\Actions\Domains\StartDnsVerification;
use App\Actions\Domains\DeleteShortDomain;

class ShortDomain extends Component
{

    public $domain;
    public $newShortlinkDomain;

    public $confirmingRemoveShortlinkDomain = false;

    public $errorMessage;

    public function mount() : void
    {
        $this->domain = Domain::find( request()->domain );
        $this->newShortlinkDomain = $this->domain->shortdomain ? $this->domain->shortdomain->host : '';
    }

    /**
     * @todo refactor with new shortdomain setup
     */
    public function saveShortlinkDomain(StartDnsVerification $process)
    {
        $validator = Validator::make([ 'domain' => $this->newShortlinkDomain ], [
            'domain' => [
                'required'
            ]
        ]);

        if ($validator->fails()) {

            $this->errorMessage = 'Invalid domain name.';

        } else {

            $this->domain->shortlink_domain = $validator->validated()['domain'];
            $this->domain->dns_configured = 0;
            $this->domain->save();
            $process->start($this->domain);

            $this->emit('$refresh');
            Notification::make() 
                ->title('Shortlink domain saved.')
                ->body('Your shortlink domain has been saved, please wait a moment for DNS to verify.')
                ->success()
                ->send(); 
        }

    }

    public function removeShortDomain(DeleteShortDomain $deleter)
    {

        $deleter->delete($this->domain);

        $this->emit('$refresh');
        Notification::make() 
            ->title('Shortlink domain removed.')
            ->body('Your shortlink URLs have been disabled. Please set up a new shortlink domain to re-enable.')
            ->danger()
            ->send(); 
    }


    public function render()
    {
        return view('livewire.domains.view.shortdomain');
    }

}