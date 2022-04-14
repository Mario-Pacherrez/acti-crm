<?php

namespace App\Http\Controllers\Web\General\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;

class SellerUserController extends Controller
{
    public function index()
    {
        //$users = User::role('Vendedor')->get();
        //return view('admin.users.index', compact('users'));
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