<?php

namespace App\Http\Livewire\Admin\Sales;

use App\Models\LeadStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\ClientLead;

use Livewire\WithPagination;
use function PHPUnit\Framework\isEmpty;

class SalesIndex extends Component
{
    use WithPagination;


    public $byAdviserInSales = null;
    public $date_start_sales, $date_end_sales = null;
    public $byStatusInSales = null;

    public function updatingByAdviserInSales()
    {
        $this->resetPage();
    }

    public function render()
    {
        //dd($leads->toSql());
        $users = User::role('Vendedor')->get();
        $status = LeadStatus::all();

        //todos
        if ($this->date_start_sales && $this->date_end_sales) {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
            if ($this->byAdviserInSales > '0') {
                $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                    ->leftJoin('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                    ->where('uxc.user_id', '=', $this->byAdviserInSales)
                    ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                    ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                    ->orderBy('clients_leads.created_at', 'desc')
                    ->paginate(20);
            }
            if ($this->byStatusInSales > '0') {
                $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                    ->leftJoin('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                    ->where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                    ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                    ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                    ->orderBy('clients_leads.created_at', 'desc')
                    ->paginate(20);
            }
            if ($this->byAdviserInSales > '0' && $this->byStatusInSales > '0') {
                $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                    ->leftJoin('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                    ->where('uxc.user_id', '=', $this->byAdviserInSales)
                    ->where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                    ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                    ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                    ->orderBy('clients_leads.created_at', 'desc')
                    ->paginate(20);
            }
        }

        elseif ($this->byAdviserInSales > '0') {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                ->where('uxc.user_id', '=', $this->byAdviserInSales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
            if ($this->byStatusInSales > '0') {
                $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                    ->leftJoin('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                    ->where('uxc.user_id', '=', $this->byAdviserInSales)
                    ->where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                    ->orderBy('clients_leads.created_at', 'desc')
                    ->paginate(20);
            }
            /*if (!is_null($this->date_start_sales) && !is_null($this->date_end_sales)) {
                $leads = ClientLead::join('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                    ->where('uxc.user_id', '=', $this->byAdviserInSales)
                    ->whereDate('clients_leads.created_at', '>=', $this->date_start_sales)
                    ->whereDate('clients_leads.created_at', '<=', $this->date_end_sales)
                    ->orderBy('clients_leads.created_at', 'desc')
                    ->paginate(20);
            }*/
        }
        elseif ($this->byStatusInSales > '0') {
            $leads = ClientLead::select('clients_leads.created_at', 'clients_leads.*')
                ->leftJoin('user_x_client_lead as uxc', 'clients_leads.id_client_lead', '=', 'uxc.fk_client_lead')
                ->where('clients_leads.fk_lead_status', '=', $this->byStatusInSales)
                ->orderBy('clients_leads.created_at', 'desc')
                ->paginate(20);
        }
        elseif ((isEmpty($this->date_start_sales) && isEmpty($this->date_end_sales)) || (is_null($this->date_start_sales) && is_null($this->date_end_sales))) {
            $leads = ClientLead::orderBy('clients_leads.created_at', 'desc')
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
        return view('livewire.admin.sales.sales-index', compact('leads'))->with('leads', $leads)->with('users', $users)->with('status', $status);
    }
}
