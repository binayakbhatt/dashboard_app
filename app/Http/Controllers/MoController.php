<?php

namespace App\Http\Controllers;

use App\Models\Mo;
use App\Models\Set;
use App\Models\Office;
use Illuminate\Http\Request;

class MoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sets = Set::all();
        $offices = Office::all();
        $int_fields = ['opening_balance', 'bags_received', 'bags_opened', 'bags_closed', 'bags_dispatched', 'bags_transferred', 'articles_received', 'articles_closed', 'articles_pending', 'customs_examination', 'customs_clearance', 'customs_pending', 'sa_WS', 'mts_WS', 'dwl_WS'];
        $boolean_fields = [
            'manpower' => 'Man Power as per Est norms achieved',
            'logbook' => 'RTN/MMS logbook properly maintained',
            'rtn' => 'RTN/MMS ontime arrival & departure',
        ];
        return view('mos.create', compact('sets', 'offices', 'int_fields', 'boolean_fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function show(Mo $mo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function edit(Mo $mo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mo $mo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mo  $mo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mo $mo)
    {
        //
    }
}
