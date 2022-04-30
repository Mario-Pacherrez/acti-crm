<?php

namespace App\Http\Livewire\General\MyLeads;

use App\Models\Channel;
use App\Models\LeadStatus;
use Livewire\Component;
use App\Models\User;
use App\Models\ClientLead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Livewire\WithPagination;
use Carbon\Carbon;

class MyLeadsIndex extends Component
{
    use WithPagination;

    public $byStatusInMyLeads = null;
    public $byChannelInMyLeads = null;
    public $date_start_my_leads, $date_end_my_leads;
    /*public $date_start_my_leads = null;
    public $date_end_my_leads = null;*/

    public function updatingByStatusInMyLeads()
    {
        $this->resetPage();
    }

    public function render()
    {
        $status = LeadStatus::all();
        $channels = Channel::all();

        if ($this->date_start_my_leads && $this->date_end_my_leads && $this->byStatusInMyLeads > '0') {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', Auth::id())
                ->where('clients_leads.fk_lead_status', '=', $this->byStatusInMyLeads)
                ->whereDate('clients_leads.created_at', '>=', $this->date_start_my_leads)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_my_leads)
                ->orderBy('clients_leads.created_at', 'desc')->paginate(10);
        } else if ($this->byStatusInMyLeads > '0') {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', Auth::id())
                ->where('clients_leads.fk_lead_status', '=', $this->byStatusInMyLeads)
                ->orderBy('clients_leads.created_at', 'desc')->paginate(10);
        } else if ($this->date_start_my_leads && $this->date_end_my_leads && is_null($this->byStatusInMyLeads)) {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', Auth::id())
                ->whereDate('clients_leads.created_at', '>=', $this->date_start_my_leads)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_my_leads)
                ->orderBy('clients_leads.created_at', 'desc')->paginate(10);
        } else if ($this->date_start_my_leads && $this->date_end_my_leads && $this->byStatusInMyLeads == '0') {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', Auth::id())
                ->whereDate('clients_leads.created_at', '>=', $this->date_start_my_leads)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_my_leads)
                ->orderBy('clients_leads.created_at', 'desc')->paginate(10);
        } else {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', Auth::id())
                ->orderBy('clients_leads.created_at', 'desc')->paginate(10);
        }

        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
            $leads->leadStatus;
        });

        //->with('leads', $leads)->with('status', $status)->with('channels', $channels)
        return view('livewire.general.my-leads.my-leads-index')->with('leads', $leads)->with('status', $status)->with('channels', $channels);
    }
}