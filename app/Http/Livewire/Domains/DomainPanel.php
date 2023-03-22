<?php

namespace App\Http\Livewire\Domains;
use App\Models\Domain;
use Livewire\Component;
use Filament\Notifications\Notification; 

class DomainPanel extends Component
{

    public $domain = null;


    protected $rules = [
        'domain.domain' => 'required'
    ];

    protected $listeners = ['viewDomain'];

    public function mount()
    {

    }

    public function deleteDomain()
    {

        $this->domain->delete();
        $this->emit('domainSaved');
        $this->dispatchBrowserEvent('close-domain-panel');
        Notification::make() 
            ->title('Domain removed.')
            ->danger()
            ->send(); 
    }

    public function updateDomain()
    {
        $this->validate();

        $this->domain->save();
        $this->emit('domainSaved');
        $this->dispatchBrowserEvent('close-domain-panel');
        Notification::make() 
            ->title('Domain saved successfully')
            ->success()
            ->send(); 
    }

    public function render()
    {
        return view('livewire.domains.domain-panel');
    }

    public function viewDomain($id)
    {
        $domain = Domain::where('id', $id)->first();
        $this->domain = $domain;
    }
}
