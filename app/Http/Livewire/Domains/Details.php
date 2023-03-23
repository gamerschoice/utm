<?php

namespace App\Http\Livewire\Domains;
use App\Models\Domain;
use Livewire\Component;
use Filament\Notifications\Notification; 
use Illuminate\Support\Facades\Validator;

class Details extends Component
{

    public $domain;

    public $newDomainName;

    public bool $confirmingDomainDelete = false;
    public bool $renamingDomain = false;
    
    public $errorMessage;

    public function mount()
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

        $this->domain->domain = $validator->validated()['domain'];
        $this->domain->save();
        return redirect()->route('domain.view', $this->domain);
    }


    public function render()
    {
        return view('livewire.domains.details');
    }

}