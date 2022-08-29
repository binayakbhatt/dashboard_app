<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeType;
use Illuminate\Http\Request;

class OfficeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.office_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.office_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:office_types',
        ]);
        $officeType = OfficeType::create($request->all());
        return redirect()->route('admin.office_types.index')->with('success', 'Office Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeType  $officeType
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeType $officeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeType  $officeType
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeType $officeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeType  $officeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeType $officeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeType  $officeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeType $officeType)
    {
        //
    }
}
