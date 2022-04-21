<?php

namespace App\Http\Livewire\General\Leads;

use Livewire\Component;
use App\Models\ClientLead;

class DetailsIndex extends Component
{
    public $open = false;
    public $title, $description;

    public function save()
    {
        ClientLead::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
    }

    public function render()
    {
        return view('livewire.general.leads.details-index');
    }
}
