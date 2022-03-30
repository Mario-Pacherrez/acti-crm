<?php

namespace App\Http\Controllers\Web\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientLeadRequest;
use App\Http\Requests\UpdateClientLeadRequest;

use App\Models\ClientLead;

class ClientLeadController extends Controller
{
    public function index()
    {
        $leads = ClientLead::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(StoreClientLeadRequest $request)
    {
        ClientLead::create($request->validated());
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

    public function destroy(ClientLead $clientLead)
    {
        $clientLead->delete();
        return redirect()->route('leads.index');
    }
}