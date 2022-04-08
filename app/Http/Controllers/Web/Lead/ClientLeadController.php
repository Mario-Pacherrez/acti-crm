<?php

namespace App\Http\Controllers\Web\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientLeadRequest;
use App\Http\Requests\UpdateClientLeadRequest;

use App\Models\User;
use App\Models\Channel;
use App\Models\ClientLead;
use App\Models\LeadStatus;
use Spatie\Permission\Models\Role;

class ClientLeadController extends Controller
{
    public function index()
    {
        $leads = ClientLead::all();
        $leads->each(function ($leads) {
            $leads->channels;
        });
        return view('leads.index', compact('leads'))->with('leads', $leads);
    }

    public function create()
    {
        $users = User::role('Vendedor')->get();
        $channels = Channel::orderBy('channel_name', 'ASC')->pluck('channel_name', 'id_channel');
        $leads_status = LeadStatus::orderBy('status_name', 'ASC')->pluck('status_name', 'id_lead_status');

        return view('leads.create')->with('users', $users)->with('channels', $channels)->with('leads_status', $leads_status);
    }

    //StoreClientLeadRequest
    public function store(Request $request)
    {
        //$user = User::create($request->validated());
        //$user->roles()->sync($request->input('channels'));

        //$lead = ClientLead::create($request->all());
        //$lead->channels()->sync($request->input('channels'));

        $lead = new ClientLead($request->all());
        //dd($request);
        $lead->fk_lead_status = 1;
        //$lead->users()->sync($request->user->id);
        $lead->names = $request->names;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->courses_name = $request->courses_name;

        $lead->save();

        $lead->channels()->sync($request->input('channels'));
        $lead->users()->sync($lead->id_client_lead);

        //fk_lead_status , names, email, phone , courses_name

        return redirect()->route('leads.index');
    }

    public function show(ClientLead $lead)
    {
        return view('leads.show', compact('lead'));
    }

    public function edit(ClientLead $lead)
    {
        return view('leads.edit', compact('lead'));
    }

    public function update(UpdateClientLeadRequest $request, ClientLead $lead)
    {
        $lead->update($request->validated());
        return redirect()->route('leads.index');
    }

    public function destroy(ClientLead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index');
    }
}