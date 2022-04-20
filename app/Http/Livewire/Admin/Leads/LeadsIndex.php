<?php

namespace App\Http\Livewire\Admin\Leads;

use Livewire\Component;
use App\Models\ClientLead;

use Livewire\WithPagination;

class LeadsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $leads = ClientLead::orderBy('created_at', 'desc')->paginate(4);
        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
        });
        return view('livewire.admin.leads.leads-index', compact('leads'))->with('leads', $leads);
        //return view('admin.leads.index', compact('leads'))->with('leads', $leads);
    }
}