<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialityRequest;
use App\Http\Requests\UpdateSpecialityRequest;
use App\Models\Speciality;

class SpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = trim(request('search'));
        if(request()->has('search')){
            request()->validate([
                'search' => [new AlphaSpaces()],
            ]);
            $specialities= Speciality::where('name','like',"%$search%")->sortable;
        return view('specialities.index', compact('specialities'));
        }
        else{
            $specialities= Speciality::query()->sortable()->paginate(env('PAGINATION_COUNT',10));
            return view('specialities.index', compact('specialities'));}
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecialityRequest $request)
    {
        $Speciality=new Speciality();
        $Speciality->name = $request->name;
        $Speciality->save();
        return redirect()->route('specialities.index')->with('success','Speciality created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speciality $Speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speciality $speciality)
    {
        return view('specialities.edit',compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecialityRequest $request, Speciality $Speciality)
    {
        $Speciality=new Speciality();
        $Speciality->name = $request->name;
        $Speciality->save();
        return redirect()->route('specialities.index')->with('success','Speciality updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speciality $Speciality)
    {
        try{
            return redirect()->route('specialities.index')->with('success','Speciality deleted successfully');
        }catch(QueryException $e){
            Log::error('Error deleting speciality: '.e->getmessage());
            return reirect()->route('specialities.index') ->with('error','Cannot delete speciality because it has one or more subspecialities');
        }
        
    }
}
