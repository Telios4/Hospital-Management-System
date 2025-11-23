<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubSpecialityRequest;
use App\Http\Requests\UpdateSubSpecialityRequest;
use App\Models\SubSpeciality;

class SubSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subspecialities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubSpecialityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubSpeciality $SubSpecialit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubSpeciality $statuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubSpecialityRequest $request, Statuses $statuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubSpeciality $SubSpeciality)
    {
        //
    }
}
