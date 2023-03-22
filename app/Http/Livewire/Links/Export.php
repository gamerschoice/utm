<?php

namespace App\Http\Livewire\Links;

use Livewire\Component;
use App\Models\Link;

class Export extends Component
{

    public $domain = null;

    protected $http_headers = [ 'Content-Disposition' => 'attachment; filename=export.csv' ];
    protected $csv_header = ['destination','utm_source','utm_medium','utm_campaign','utm_term','utm_content','utm_source_platform','utm_creative_format','utm_marketing_tactic','notes','created_at','updated_at'];

    public function mount()
    {
        $this->domain = request()->domain;
    }

    public function download()
    {
        
        $links = Link::where('domain_id', $this->domain)->get()->all();
        
        return response()->stream(function () use ($links) {
            
            $out = fopen('php://output', 'w');
            fputcsv($out, $this->csv_header);
            foreach($links as $link)
            {
                fputcsv($out, [ $link->destination, $link->utm_source, $link->utm_medium, $link->utm_campaign, $link->utm_term, $link->utm_content, $link->utm_source_platform, $link->utm_creative_format, $link->utm_marketing_tactic, $link->notes, $link->created_at, $link->updated_at ]);
            }
            fclose($out);

        }, 200, $this->http_headers);  
    }

    public function render()
    {
        

        return view('livewire.links.export');
    }

}
