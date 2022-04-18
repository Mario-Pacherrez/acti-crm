<?php

namespace App\Http\Controllers\Web\General\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreClientLeadRequest;
use App\Http\Requests\UpdateClientLeadRequest;

use App\Models\User;
use App\Models\Channel;
use App\Models\ClientLead;
use App\Models\LeadStatus;
use App\Models\UserClientLeadPivot;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function index()
    {
        /*$leads = ClientLead::all();*/
        $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
            ->where('user_x_client_lead.user_id', '!=', 2)->get();
        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
            $leads->leadStatus;
        });
        return view('general.sales.index', compact('leads'))->with('leads', $leads);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(ClientLead $sale)
    {
        $channels = Channel::all();
        $leadStatus = LeadStatus::all();
        $sale->users();
        $sale->leadStatus();
        $sale->channel();
        return view('general.sales.edit', compact('sale'))->with('sale', $sale)->with('leadStatus', $leadStatus);
    }

    public function update(UpdateClientLeadRequest $request, ClientLead $lead)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}