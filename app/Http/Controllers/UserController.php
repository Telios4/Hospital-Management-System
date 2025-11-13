<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(env('PAGINATION_COUNT', 10));
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //for the dropdown menu for selecting the role
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user =  new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role');
        $user->password = Hash::make(env('USER_DEFAULT_PASSWORD','th1bit1sha'));
        $user->save();

        return redirect()->route('users.index')->with('success', 'User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted');
    }

    /**
     * Reset a user's password.
     */
    public function resetPassword(User $user)
    {
        $user->password = Hash::make(env('USER_DEFAULT_PASSWORD','th1bit1sha'));
        $user->save();
//@TODO: Notifications (Emails)
        return redirect()->route('users.index')->with('success', 'User Password Reset Successfully');
    }
}