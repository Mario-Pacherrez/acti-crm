<?php

namespace App\Http\Livewire\Admin\Leads;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\ClientLead;

use Livewire\WithPagination;

class LeadsIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "tailwind";

    public $byAdviser = null;

    public $date_start, $date_end;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingByAdviser()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::role('Vendedor')->get();

        if ($this->date_start && $this->date_end && $this->byAdviser > '0') {
            $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', $this->byAdviser)
                ->whereDate('clients_leads.created_at', '>=', $this->date_start)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(10);
        } else if ($this->byAdviser > '0') {
            $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', $this->byAdviser)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(10);
        } else if ($this->date_start && $this->date_end && $this->byAdviser == '0') {
            $leads = ClientLead::orderBy('clients_leads.created_at', 'desc')
                ->whereDate('clients_leads.created_at', '>=', $this->date_start)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end)
                ->paginate(10);
        }
        else {
            $leads = ClientLead::orderBy('clients_leads.created_at', 'desc')
                ->paginate(10);
        }

        /*
          * ->where('names', 'LIKE', '%'.$this->search. '%')
            ->orWhere('courses_name', 'LIKE', '%'.$this->search. '%')
        */

        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
        });
        return view('livewire.admin.leads.leads-index', compact('leads'))->with('leads', $leads)->with('users', $users);
        //return view('admin.leads.index', compact('leads'))->with('leads', $leads);
    }
}