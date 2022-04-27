<?php

namespace App\Http\Controllers\Web\General\Lead;

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
use Spatie\Permission\Models\Role;

use Carbon\Carbon;

class MyLeadsController extends Controller
{
    public function index()
    {
        return view('general.myleads.index');
        /*$leads = ClientLead::join('user_x_client_lead', 'clients_leads.id_client_lead', '=', 'user_x_client_lead.fk_client_lead')
            ->where('user_x_client_lead.user_id', '=', Auth::id())->orderBy('user_x_client_lead.updated_at', 'desc')->paginate(10);
        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
            $leads->leadStatus;
        });
        return view('general.myleads.index', compact('leads'))->with('leads', $leads);*/
    }

    public function create()
    {
        /*$users = User::role('Vendedor')->get();
        $channels = Channel::orderBy('channel_name', 'ASC')->pluck('channel_name', 'id_channel');
        $leads_status = LeadStatus::orderBy('status_name', 'ASC')->pluck('status_name', 'id_lead_status');
        return view('myleads.leads.create')->with('users', $users)->with('channels', $channels)->with('leads_status', $leads_status);*/
    }

    public function store(Request $request)
    {
        /*$lead = new ClientLead($request->all());
        $lead->fk_lead_status = 1;
        $lead->fk_channel = $request->channels;
        //$lead->users()->sync($request->user->id);
        $lead->names = $request->names;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->courses_name = $request->courses_name;

        $lead->save();

        $lead->users()->sync($request->input('users'));
        return redirect()->route('leads.index');*/
    }

    public function show(ClientLead $mylead)
    {
        return view('general.myleads.show', compact('mylead'));
    }

    public function edit(ClientLead $mylead)
    {
        $sellers = User::role('Vendedor')->get();
        $leadStatus = LeadStatus::all();
        $channels = Channel::all();
        $mylead->users();
        $mylead->leadStatus();
        $mylead->channel();
        return view('general.myleads.edit', compact('mylead'))->with('mylead', $mylead)->with('sellers', $sellers)->with('leadStatus', $leadStatus)->with('channels', $channels);
    }

    public function update(Request $request, ClientLead $mylead)
    {
        $mylead->fk_channel = $request->input('channels');
        $mylead->fk_lead_status = $request->input('status');
        $mylead->updated_by = Auth::id();
        $mylead->update($request->all());
        return redirect()->route('myleads.index');
    }

    public function destroy(ClientLead $lead)
    {
        /*$lead->delete();
        return redirect()->route('leads.index');*/
    }

    public function details()
    {

    }
}