<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Channel;
use App\Models\LeadStatus;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'nickname'   => 'required|string|max:150|unique:users,nickname',
            'name'       => 'required|string|max:50',
            'lastname'   => 'required|string|max:50',
            'email'      => 'required|email|unique:users,email|max:150',
            'password'   => 'required|min:3|max:20',
        ]);

        $user = new User();
        //$user->user_type = "business_user";
        $user->nickname = $request->nickname;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        /*
         * $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
         */
        //$users = User::with('roles')->get();
        $roles = $user->getRoleNames();
        return view('admin.users.show', compact('user'))->with('roles', $roles);
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        //$user->update($request->all());
        $user->update($request->validated());
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index');
        //return redirect()->route('admin.users.index', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}