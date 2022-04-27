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
use App\Models\LeadDetail;
use App\Models\UserClientLeadPivot;
use Spatie\Permission\Models\Role;

use Carbon\Carbon;

class LeadDetailController extends Controller
{
    public function index(ClientLead $details)
    {
        /*$details->each(function ($details) {
            $details->leadsDetails;
        });
        return view('admin.sales.details.index', compact('details'))->with('details', $details);*/
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id_client_lead)
    {
        $details = LeadDetail::orderBy('created_at', 'desc')->where('leads_details.fk_client_lead', '=', $id_client_lead)->paginate(10);

        return view('admin.sales.details.index', compact('id_client_lead'))->with('details', $details);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}