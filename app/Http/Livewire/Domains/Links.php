<?php

namespace App\Http\Livewire\Domains;

use Livewire\Component;
use App\Models\Domain;
use App\Models\Link;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification; 

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

    public function mount()
    {
        $this->domain = request()->domain;
    }

    /**
     * @todo guards
     */

    public function bulkDelete()
    {

        Link::whereIn('id', $this->deletions)->delete();
        $this->deletions = [];
        $this->confirmingBulkDelete = false;
        Notification::make() 
            ->title('Links deleted.')
            ->danger()
            ->send(); 
        
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
        
        return view('livewire.domains.links', [
            'links' => $links,
            'filterCount' => $filterCount,
            'utmSourceFilters' => Link::select('utm_source')
                                    ->distinct()
                                    ->where('domain_id', $this->domain)
                                    ->get(),
            'utmMediumFilters' => Link::select('utm_medium')
                                    ->distinct()
                                    ->where('domain_id', $this->domain)
                                    ->get(),
            'utmCampaignFilters' => Link::select('utm_campaign')
                                    ->distinct()
                                    ->where('domain_id', $this->domain)
                                    ->get()

        ]);
    }

}
