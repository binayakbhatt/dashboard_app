<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RtnLog;
use Illuminate\Http\Request;

class RtnLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', RtnLog::class);
        return view('admin.rtn-logs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', RtnLog::class);
        return view('admin.rtn-logs.create');
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
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Http\Response
     */
    public function show(RtnLog $rtnLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Http\Response
     */
    public function edit(RtnLog $rtnLog)
    {
        $this->authorize('update', $rtnLog);
        return view('admin.rtn-logs.edit', compact('rtnLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RtnLog $rtnLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RtnLog  $rtnLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(RtnLog $rtnLog)
    {
        //
    }
}
