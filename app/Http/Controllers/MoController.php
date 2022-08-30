<?php

namespace App\Http\Controllers;

use App\Models\Mo;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
