<?php

namespace App\Http\Controllers\Web\Admin\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreClientLeadRequest;
use App\Http\Requests\UpdateClientLeadRequest;

use App\Models\User;
use App\Models\Channel;
use App\Models\ClientLead;
use App\Models\LeadStatus;
use App\Models\LeadDetail;
use App\Models\UserClientLeadPivot;
use Spatie\Permission\Models\Role;

use Carbon\Carbon;

class ClientLeadController extends Controller
{
    public function index()
    {
        return view('admin.leads.index');
        /*$leads = ClientLead::orderBy('created_at', 'desc')->paginate(10);
        $leads->each(function ($leads) {
            $leads->channel;
            $leads->users;
        });*/
        //return view('admin.leads.index', compact('leads'))->with('leads', $leads);
    }

    public function create()
    {
        $users = User::role('Vendedor')->get();
        $channels = Channel::orderBy('channel_name', 'ASC')->pluck('channel_name', 'id_channel');
        $leads_status = LeadStatus::orderBy('status_name', 'ASC')->pluck('status_name', 'id_lead_status');

        return view('admin.leads.create')->with('users', $users)->with('channels', $channels)->with('leads_status', $leads_status);
    }

    public function store(Request $request)
    {
        $lead = new ClientLead($request->all());
        $lead->fk_lead_status = 1;
        $lead->fk_channel = $request->channels;
        $lead->names = $request->names;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->courses_name = $request->courses_name;
        $lead->created_by = Auth::id();
        $lead->save();

        $lead->users()->sync($request->input('users'));
        return redirect()->route('admin.leads.index');
    }

    public function show(ClientLead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    public function edit(ClientLead $lead)
    {
        $sellers = User::role('Vendedor')->get();
        $channels = Channel::all();
        $lead->users();
        $lead->channel();

        return view('admin.leads.edit', compact('lead'))->with('lead', $lead)->with('sellers', $sellers)->with('channels', $channels);
    }

    public function update(UpdateClientLeadRequest $request, ClientLead $lead)
    {
        $lead->fk_channel = $request->input('channels');
        $lead->updated_by = Auth::id();
        $lead->update($request->validated());
        $lead->users()->sync($request->input('sellers'));

        return redirect()->route('admin.leads.index');
    }

    public function destroy(ClientLead $lead)
    {
        $lead->delete();
        return redirect()->route('admin.leads.index');
    }
}