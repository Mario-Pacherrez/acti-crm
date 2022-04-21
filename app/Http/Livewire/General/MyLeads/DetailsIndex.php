<?php

namespace App\Http\Livewire\General\MyLeads;

use Livewire\Component;
use App\Models\ClientLead;
use App\Models\LeadDetail;

use Livewire\WithPagination;

class DetailsIndex extends Component
{
    use WithPagination;

    public $details;

    //public $open = false;
    //public $title, $description;

    /*public function save()
    {
        ClientLead::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
    }*/

    /*public function mount($details)
    {
        $this->details = $details;
    }*/

    public function render()
    {
        $details = LeadDetail::orderBy('created_at', 'desc')->where('leads_details.fk_client_lead', '=', 1)->paginate(10);
        $details->each(function ($details) {
            $details->leadsDetails;
        });

        return view('livewire.general.my-leads.details-index', compact('details'))->with('details', $details);
        //return view('livewire.general.my-leads.details-index');
    }
}