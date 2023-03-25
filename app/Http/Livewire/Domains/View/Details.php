<?php

namespace App\Http\Livewire\Domains\View;
use App\Models\Domain;
use Livewire\Component;
use Filament\Notifications\Notification; 
use Illuminate\Support\Facades\Validator;
use App\Jobs\RenameDomainLinks;

class Details extends Component
{

    public $domain;

    public $newDomainName;

    public bool $confirmingDomainDelete = false;
    public bool $renamingDomain = false;
    
    public $errorMessage;

    public function mount() : void
    {
        $this->domain = Domain::find( request()->domain );
    }

    public function deleteDomain()
    {
        $this->domain->delete();
        $this->emit('$refresh');
        Notification::make() 
            ->title('Domain removed.')
            ->danger()
            ->send(); 
    }

    /**
     * @todo validate domain is real
     */
    public function renameDomain() 
    {
        $validator = Validator::make([ 'domain' => $this->newDomainName ], [
            'domain' => [
                'required'
            ]
        ]);

        if ($validator->fails()) {
            $this->errorMessage = 'Invalid domain name.';
        }

        $newDomain = $validator->validated()['domain'];
        
        RenameDomainLinks::dispatch( $this->domain, $newDomain );
        
        $this->domain->domain = $newDomain;
        $this->domain->save();



        $this->emit('$refresh');
        Notification::make() 
            ->title('Domain renamed.')
            ->success()
            ->send(); 
        return redirect()->route('domain.view', $this->domain);
    }


    public function render()
    {
        return view('livewire.domains.view.details');
    }

}