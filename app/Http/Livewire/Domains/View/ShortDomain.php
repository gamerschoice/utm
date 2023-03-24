<?php

namespace App\Http\Livewire\Domains\View;
use App\Models\Domain;
use Livewire\Component;
use Filament\Notifications\Notification; 
use Illuminate\Support\Facades\Validator;
use App\Actions\Domains\StartDnsVerification;

class ShortDomain extends Component
{

    public $domain;
    public $newShortlinkDomain;

    public $errorMessage;

    public function mount() : void
    {
        $this->domain = Domain::find( request()->domain );
        $this->newShortlinkDomain = $this->domain->shortlink_domain;
    }

    /**
     * @todo validate domain is real and resolves to UTM Wire CNAME
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
                ->title('Short domain saved.')
                ->body('Your shortlink has been saved, please wait a moment for DNS to verify.')
                ->success()
                ->send(); 
        }

    }

    public function removeShortDomain()
    {
        $this->domain->shortlink_domain = NULL;
        $this->domain->save();
        $this->emit('$refresh');
        Notification::make() 
            ->title('Short domain removed.')
            ->body('Your shortlink urls have been disabled. Please set up a new short domain to re-enable.')
            ->danger()
            ->send(); 
    }


    public function render()
    {
        return view('livewire.domains.view.shortdomain');
    }

}