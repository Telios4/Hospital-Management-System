<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredegreeRequest;
use App\Http\Requests\UpdatedegreeRequest;
use App\Models\degree;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoredegreeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(degree $degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(degree $degree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedegreeRequest $request, degree $degree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(degree $degree)
    {
        //
    }
}
