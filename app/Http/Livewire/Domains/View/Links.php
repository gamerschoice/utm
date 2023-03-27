<?php

namespace App\Http\Livewire\Domains\View;

use Livewire\Component;
use App\Models\Domain;
use App\Models\Link;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification; 
use App\Actions\Links\DeleteLink;
use Illuminate\Database\Eloquent\Builder;

class Links extends Component
{

    use WithPagination;

    public $domain = null;
    public $confirmingBulkDelete = false;
    public $deletions = [];

    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['sortField', 'sortDirection', 'activeUtmSourceFilter', 'activeUtmMediumFilter', 'activeUtmCampaignFilter'];

    public $activeUtmSourceFilter;
    public $activeUtmMediumFilter;
    public $activeUtmCampaignFilter;

    protected $listeners = [ 'linkSaved' => '$refresh' ];

    public function mount() : void
    {
        $this->domain = request()->domain;
    }

    /**
     * @todo guards
     */

    public function bulkDelete( DeleteLink $deleter )
    {
        $links = Link::whereIn('id', $this->deletions)->get();
        $linksToSend = [];
        
        foreach($links as $link) {
            $linksToSend[$link->id] = $link->auto_url;
        }

        if( $deleter->bulkDelete( $linksToSend ) ) {

            Notification::make() 
                ->title('Links deleted.')
                ->danger()
                ->send(); 

        } else {

            Notification::make() 
            ->title('Could not delete links')
            ->body('The operation could not be completed, please try again later. If the problem persists, please contact support.')
            ->danger()
            ->send(); 
            
        }

        $this->confirmingBulkDelete = false;
        $this->deletions = [];
        
    }

    public function showLink( int $id )
    {
        $this->dispatchBrowserEvent('open-link-panel');
        $this->emit('viewLink', $id);
    }

    public function closeLink()
    {
        $this->link = null;
    }

    public function setActiveUtmSourceFilter(string $value)
    {  
        $this->activeUtmSourceFilter = $value;
    }

    public function setActiveUtmMediumFilter(string $value)
    {  
        $this->activeUtmMediumFilter = $value;
    }

    public function setActiveUtmCampaignFilter(string $value)
    {  
        $this->activeUtmCampaignFilter = $value;
    }

    public function resetFilters() 
    {
        $this->activeUtmSourceFilter = '';
        $this->activeUtmMediumFilter = '';
        $this->activeUtmCampaignFilter = '';
    }

    public function sortBy(string $fieldName)
    {
        if($this->sortField === $fieldName) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $fieldName;
    }

    public function render()
    {

        $filterCount = 0;

        if($this->activeUtmSourceFilter)
            $filterCount++;

        if($this->activeUtmMediumFilter)
            $filterCount++;

        if($this->activeUtmCampaignFilter)
            $filterCount++;


        $links = Link::where('domain_id', $this->domain)
            ->orderBy($this->sortField, $this->sortDirection)
            ->when($this->activeUtmSourceFilter, function($query) {
                return $query->where('utm_source', $this->activeUtmSourceFilter);
            })
            ->when($this->activeUtmMediumFilter, function($query) {
                return $query->where('utm_medium', $this->activeUtmMediumFilter);
            })
            ->when($this->activeUtmCampaignFilter, function($query) {
                return $query->where('utm_campaign', $this->activeUtmCampaignFilter);
            })
            ->paginate(50);
        
        return view('livewire.domains.view.links', [
            'links' => $links,
            'filterCount' => $filterCount,
            'utmSourceFilters' => Link::select('utm_source')
                                    ->distinct()
                                    ->where('domain_id', $this->domain)
                                    ->whereNot( function (Builder $query) {
                                        $query->where('utm_source', '');
                                    })
                                    ->get(),
            'utmMediumFilters' => Link::select('utm_medium')
                                    ->distinct()
                                    ->where('domain_id', $this->domain)
                                    ->whereNot( function (Builder $query) {
                                        $query->where('utm_medium', '');
                                    })
                                    ->get(),
            'utmCampaignFilters' => Link::select('utm_campaign')
                                    ->distinct()
                                    ->where('domain_id', $this->domain)
                                    ->whereNot( function (Builder $query) {
                                        $query->where('utm_campaign', '');
                                    })
                                    ->get()

        ]);
    }

}
