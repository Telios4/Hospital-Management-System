<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //echo "<h1>Hello</h1>";

        // Get all the roles from the DB
        $roles = Role::all();

        //pass the data to the view and return it
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->only('name', 'description'));
        return redirect()->route('roles.index')
            ->with('success', 'Role created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //route model binding
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->name = $request->get('name');
        $role->description = $request->get('description');
        $role->save();
        return redirect()->route('roles.index')->with('success','Role updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try{
            $role->delete();
            return redirect()->route('roles.index')->
                with('success','Role Deleted');
            }
        catch(QueryException $e){
            return redirect()->route('roles.index')
            ->with('error','Sorry,you cannot delete a user');
        }

    }
}
