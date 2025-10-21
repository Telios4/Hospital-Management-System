<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusesRequest;
use App\Http\Requests\UpdateStatusesRequest;
use App\Models\Statuses;

class StatusesController extends Controller
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
    public function store(StoreStatusesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statuses $statuses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statuses $statuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusesRequest $request, Statuses $statuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statuses $statuses)
    {
        //
    }
}
