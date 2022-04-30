<?php

namespace App\Http\Controllers\Web\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Channel;
use App\Models\ClientLead;
use App\Models\LeadStatus;

use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.reports.index');
    }

    public function index()
    {
        return view('admin.reports.index');
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