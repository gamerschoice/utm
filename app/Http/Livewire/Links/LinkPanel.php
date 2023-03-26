<?php

namespace App\Http\Livewire\Links;

use Livewire\Component;
use App\Models\Link;
use App\Models\Domain;
use Filament\Notifications\Notification; 
use App\Actions\Links\DeleteLink;
use App\Actions\Links\CreateLink;


class LinkPanel extends Component
{

    public $link = null;

    protected $rules = [
        'link.destination' => 'required|active_url',
        'link.utm_source' => 'nullable',
        'link.utm_medium' => 'nullable',
        'link.utm_campaign' => 'nullable',
        'link.utm_term' => 'nullable',
        'link.utm_content' => 'nullable',
        'link.utm_source_platform' => 'nullable',
        'link.utm_creative_format' => 'nullable',
        'link.utm_marketing_tactic' => 'nullable',
        'link.notes' => 'nullable'
    ];

    protected $listeners = ['viewLink'];

    public function mount()
    {

    }


    public function duplicateLink( CreateLink $creator )
    {
        $duplicate = $this->link->replicate()->toArray();
        $domain = Domain::find($duplicate['domain_id']);
        unset($duplicate['id']);
        unset($duplicate['created_at']);
        unset($duplicate['updated_at']);
        unset($duplicate['shortlink']);
        unset($duplicate['domain']);

        $link = $creator->create( $domain, $duplicate );

        if(!$link) {
            Notification::make() 
                ->title('Link duplication failed')
                ->body('The operation could not be completed, please try again later. If the problem persists, please contact support.')
                ->danger()
                ->send(); 
        } else {
            $this->emit('linkSaved');
            $this->dispatchBrowserEvent('close-link-panel');
            Notification::make() 
                ->title('Link duplicated')
                ->success()
                ->send(); 
        }

    }


    public function deleteLink( DeleteLink $deleter )
    {
        if( $deleter->delete( $this->link ) ) {
            $this->emit('linkSaved');
            $this->dispatchBrowserEvent('close-link-panel');
            Notification::make() 
                ->title('Link removed.')
                ->danger()
                ->send(); 
        }
    }

    public function updateLink()
    {
        $this->validate();

        $this->link->save();
        $this->emit('linkSaved');
        $this->dispatchBrowserEvent('close-link-panel');
        Notification::make() 
            ->title('Link saved successfully')
            ->success()
            ->send(); 
    }

    public function render()
    {
        return view('livewire.links.link-panel');
    }

    public function viewLink($id)
    {
        $link = Link::where('id', $id)->first();
        $this->link = $link;
    }
}
