<?php

namespace App\Http\Livewire\Admin\Reports;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;
use App\Models\ClientLead;

class ReportsIndex extends Component
{
    use WithPagination;
    public $date_start_of_report_1, $date_end_of_report_1;

    public function render()
    {
        //$users = User::role('Vendedor')->get();

        if ($this->date_start_of_report_1 && $this->date_end_of_report_1) {
            $users = User::select('users.*')
                ->join('user_x_client_lead as uc', 'users.id', '=', 'uc.user_id')
                ->select(DB::raw('users.name, users.lastname, count(uc.id_user_x_client_lead) as user_count'))
                ->whereDate('uc.created_at', '>=', $this->date_start_of_report_1)
                ->whereDate('uc.created_at', '<=', $this->date_end_of_report_1)
                ->groupBy('uc.user_id')
                ->get()
            ;
            $r ="1";
        } else {
            $users = User::role('Vendedor')->get();
            $users->each(function ($users) {
                $users->clientsLeads;
            });
            $r ="2";
        }

        return view('livewire.admin.reports.reports-index', compact('users'))->with('users', $users)->with('r', $r);
    }
}