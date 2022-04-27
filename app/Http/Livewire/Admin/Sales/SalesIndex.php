<?php

namespace App\Http\Livewire\Admin\Sales;

use App\Models\LeadStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\ClientLead;

use Livewire\WithPagination;

class SalesIndex extends Component
{
    use WithPagination;


    public $byAdviserInSales = null;
    public $date_start_sales, $date_end_sales;
    public $byStatusInSales = null;

    public function updatingByAdviserInSales()
    {
        $this->resetPage();
    }

    public function render()
    {
/*        $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
            ->where('user_x_client_lead.user_id', '!=', 2)->orderBy('clients_leads.created_at', 'desc')->paginate(10);
        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
            $leads->leadStatus;
        });*/
        //dd($leads->toSql());
        $users = User::role('Vendedor')->get();
        $status = LeadStatus::all();

        //todos
        if ($this->date_start_sales && $this->date_end_sales && $this->byAdviserInSales > '0' && $this->byStatusInSales > '0') {
            $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', $this->byAdviserInSales)
                ->where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }
        //Asesor y fechas
        else if ($this->date_start_sales && $this->date_end_sales && $this->byAdviserInSales > '0' && $this->byStatusInSales == '0') {
            $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', $this->byAdviserInSales)
                ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }
        //estado y fechas
        else if ($this->date_start_sales && $this->date_end_sales && $this->byStatusInSales > '0') {
            $leads = ClientLead::where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }

        //Solo asesor
        else if ($this->byAdviserInSales >'0'){

            $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', $this->byAdviserInSales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }

        //Solo estado
        else if ($this->byStatusInSales > '0'){
            $leads = ClientLead::where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }

        //Solo fechas
        else if ($this->date_start_sales && $this->date_end_sales ) {
            $leads = ClientLead::whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }

        //Asesor y Estado
        else if (is_null($this->date_start_sales)  &&  is_null($this->date_end_sales) && $this->byAdviserInSales > '0' && $this->byStatusInSales > '0'){
            $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
                ->where('user_x_client_lead.user_id', '=', $this->byAdviserInSales)
                ->where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }
         else {
            $leads = ClientLead::orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }
        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
            $leads->leadStatus;
        });
        return view('livewire.admin.sales.sales-index', compact('leads'))->with('users', $users)->with('status', $status);
    }
}
