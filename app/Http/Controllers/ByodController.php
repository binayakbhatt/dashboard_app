<?php

namespace App\Http\Controllers;

use App\Models\Byod;
use App\Models\Division;
use Illuminate\Http\Request;

class ByodController extends Controller
{
    // Register the policy
    public function __construct()
    {
        $this->authorizeResource(Byod::class, 'byod');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Byod.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $user_divisions = $user->divisions();
        $user_division_ids = [];
        foreach ($user_divisions as $user_division) {
            array_push($user_division_ids, $user_division['id']);
        }
        $divisions = Division::all();
        return view('Byod.create', compact('divisions', 'user_division_ids'));
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
            'name' => 'required|max:255',
            'employee_id' => 'required|max:255',
            'email' => 'required|max:255|email',
            'mobile' => 'required|max:255',
            'make_model' => 'required|max:255',
            'imei' => 'required|max:255|unique:byods',
            'post_office' => 'required|max:255',
            'date_of_purchase' => 'required|date',
            'date_of_acceptance' => 'required|date',
            'division_id' => 'required|exists:divisions,id',
        ]);

        $validated['created_by'] = auth()->id();

        Byod::create($validated);

        return redirect()->route('byods.index')->with('success', 'Data added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Http\Response
     */
    public function show(Byod $byod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Http\Response
     */
    public function edit(Byod $byod)
    {
        $user = auth()->user();
        $user_divisions = $user->divisions();
        $user_division_ids = [];
        foreach ($user_divisions as $user_division) {
            array_push($user_division_ids, $user_division['id']);
        }
        $divisions = Division::all();
        return view('Byod.edit', compact('byod', 'divisions', 'user_division_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Byod $byod)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'employee_id' => 'required|max:255',
            'email' => 'required|max:255|email',
            'mobile' => 'required|max:255',
            'make_model' => 'required|max:255',
            'imei' => 'required|max:255|unique:byods,imei,' . $byod->id,
            'post_office' => 'required|max:255',
            'date_of_purchase' => 'required|date',
            'date_of_acceptance' => 'required|date',
            'division_id' => 'required|exists:divisions,id',
        ]);

        $byod->update($validated);

        return redirect()->route('byods.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Byod  $byod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Byod $byod)
    {
        //
    }
}
