<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('general.user-home');
    }

    /*public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }


    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }*/
}