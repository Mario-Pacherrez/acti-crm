<?php

namespace App\Http\Controllers\Web\General\Sales;

use App\Http\Controllers\Controller;
use App\Models\ClientLead;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $leads = ClientLead::all();
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