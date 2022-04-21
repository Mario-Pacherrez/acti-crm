<?php

namespace App\Http\Livewire\General\MyLeads;

use Livewire\Component;
use App\Models\ClientLead;
use App\Models\LeadDetail;

class DetailsCreate extends Component
{
    public $open = false;
    public $title, $description;
    // $details->fk_client_lead
    public $id_client_lead;

    public function save($fk_client_lead)
    {
        $this->id_client_lead =$fk_client_lead;
        //dd($fk_client_lead);
        LeadDetail::create([
            'fk_client_lead' => $this->title,
            'title' => $this->title,
            'description' => $this->description
        ]);
    }

    /*public function mount($details)
    {
        $this->details = $details;
    }*/

    public function render()
    {
        return view('livewire.general.my-leads.details-create');
    }
}
