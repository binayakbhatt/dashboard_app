<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\OfficeType;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return admin offices view
        return view('admin.offices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officeTypes = OfficeType::all();

        return view('admin.offices.create', compact('officeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Office $office)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'facility_id' => 'required|string|max:255',
            'office_type_id' => 'required|exists:office_types,id',
        ]);
        
        $office->create($validated);

        return redirect()->route('admin.offices.index')->with('success', 'Office added successfully');

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {   
        // Get OfficeTypes
        $officeTypes = OfficeType::all();
        // Return admin offices edit view
        return view('admin.offices.edit', compact('office', 'officeTypes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'facility_id' => 'required|string|max:255',
            'office_type_id' => 'required|exists:office_types,id',
        ]);

        $office->update($validated);

        return redirect()->route('admin.offices.index')->with('success', 'Office updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //this gives refrential intregrity error 
         $office = Office::findOrFail($id);
         $office->delete();
        return redirect()->route('admin.offices.index')->with('success', 'Office deleted successfully');
    }
}
