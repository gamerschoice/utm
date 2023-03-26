<?php

namespace App\Http\Livewire\Links;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Link;
use Filament\Notifications\Notification; 
use Illuminate\Support\Str;
use App\Actions\Links\DeleteLink;

class LinkPanel extends Component
{

    public $link = null;

    /*
    public $destination;
    public $utm_source;
    public $utm_medium;
    public $utm_campaign;
    public $utm_term;
    public $utm_content;
    public $utm_source_platform;
    public $utm_creative_format;
    public $utm_marketing_tactic;
    public $notes;
    */

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

    /**
     * @todo use action
     */
    public function duplicateLink()
    {
        $duplicate = $this->link->replicate();
        $duplicate->created_at = Carbon::now();
        $duplicate->updated_at = Carbon::now();
        $duplicate->shortlink = Str::random(8);
        $duplicate->save();

        $this->emit('linkSaved');
        $this->dispatchBrowserEvent('close-link-panel');
        Notification::make() 
            ->title('Link duplicated')
            ->success()
            ->send(); 
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
