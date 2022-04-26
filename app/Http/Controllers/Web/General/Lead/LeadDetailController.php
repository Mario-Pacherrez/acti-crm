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
use App\Models\LeadDetail;
use App\Models\UserClientLeadPivot;
use Spatie\Permission\Models\Role;

use Carbon\Carbon;

class LeadDetailController extends Controller
{

    public function index()
    {
        return view('general.myleads.details.index');
    }

    public function create($id_client_lead)
    {
        return view('general.myleads.details.create')->with('id_client_lead', $id_client_lead);
    }

    public function store(Request $request, $id_client_lead)
    {
        $details = new LeadDetail($request->all());
        $details->fk_client_lead = $id_client_lead;
        $details->title = $request->title;
        $details->description = $request->description;
        $details->created_by = Auth::id();
        $details->save();

        return redirect()->route('myleads.details.show', $id_client_lead);
    }

    public function show($id_client_lead)
    {
        $details = LeadDetail::orderBy('created_at', 'desc')->where('leads_details.fk_client_lead', '=', $id_client_lead)->paginate(10);
        /*$details->each(function ($details) {
            $details->leadsDetails;
        });*/
        return view('general.myleads.details.index', compact('id_client_lead'))->with('details', $details);
    }

    public function edit($id_lead_detail)
    {
        return view('general.myleads.details.edit')->with('id_client_lead', $id_lead_detail);
    }

    public function update(Request $request, LeadDetail $id_lead_detail)
    {
        $id_lead_detail->update($request->all());
        return redirect()->route('myleads.index')->with('id_client_lead', $id_lead_detail->id_lead_detail);
    }

    /*public function destroy($id)
    {
    }*/
}