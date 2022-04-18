<?php

namespace App\Http\Controllers\Web\Admin\Sales;

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
        $leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
            ->where('user_x_client_lead.user_id', '!=', 2)->get();
        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
            $leads->leadStatus;
        });
        return view('admin.sales.index', compact('leads'))->with('leads', $leads);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ClientLead $sale)
    {
        return view('admin.sales.show', compact('sale'));
    }

    public function edit(ClientLead $sale)
    {
        $sellers = User::role('Vendedor')->get();
        $leadStatus = LeadStatus::all();
        $channels = Channel::all();
        $sale->users();
        $sale->leadStatus();
        $sale->channel();
        return view('admin.sales.edit', compact('sale'))->with('sale', $sale)->with('sellers', $sellers)->with('leadStatus', $leadStatus)->with('channels', $channels);
    }

    public function update(Request $request, ClientLead $sale)
    {
        $sale->fk_channel = $request->input('channels');
        $sale->fk_lead_status = $request->input('status');
        $sale->updated_by = Auth::id();
        $sale->update($request->all());
        return redirect()->route('admin.sales.index');
    }

    public function destroy($id)
    {
        //
    }
}