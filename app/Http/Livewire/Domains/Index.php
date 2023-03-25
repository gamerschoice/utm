<?php

namespace App\Http\Livewire\Domains;

use Livewire\Component;
use App\Models\Domain;
use App\Models\Link;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification; 

class Index extends Component
{

    use WithPagination;

    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['sortField', 'sortDirection'];

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
        return view('livewire.domains.index', [
            'domains' => Domain::where('team_id', request()->user()->currentTeam->id)
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate(10)
        ]);
    }

}
