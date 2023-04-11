<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Rtn;
use Illuminate\Http\Request;

class RtnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rtns.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices  = Office::all();

        return view('admin.rtns.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:rtns,name',
            'office_ids' => 'required|exists:offices,id'
        ]);

        $rtn = Rtn::create([
            'name' => $validated['name']
        ]);

        $rtn->offices()->attach($validated['office_ids']);

        return redirect()->route('admin.rtns.index')->with('success', 'Rtn created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rtn  $rtn
     * @return \Illuminate\Http\Response
     */
    public function show(Rtn $rtn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rtn  $rtn
     * @return \Illuminate\Http\Response
     */
    public function edit(Rtn $rtn)
    {
        $offices  = Office::all();

        return view('admin.rtns.edit', compact('rtn', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rtn  $rtn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rtn $rtn)
    {
        $validated = $request->validate([
            'name' => 'required|unique:rtns,name,' . $rtn->id,
            'office_ids' => 'required|exists:offices,id'
        ]);

        $rtn->update([
            'name' => $validated['name']
        ]);

        $rtn->offices()->sync($validated['office_ids']);

        return redirect()->route('admin.rtns.index')->with('success', 'Rtn updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rtn  $rtn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rtn $rtn)
    {
        //
    }
}
