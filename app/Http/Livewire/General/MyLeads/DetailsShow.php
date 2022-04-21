<?php

namespace App\Http\Livewire\General\MyLeads;

use Livewire\Component;
use App\Models\ClientLead;

class DetailsShow extends Component
{
    //public $lead;

    /*public function mount(ClientLead $lead)
    {
        $this->lead = $lead;
    }*/

    public function render()
    {
        return view('livewire.general.my-leads.details-show');
    }
}
