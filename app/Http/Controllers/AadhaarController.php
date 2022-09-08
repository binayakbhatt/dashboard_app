<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Aadhaar;
use Illuminate\Http\Request;
use App\Imports\AadhaarsImport;

class AadhaarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aadhaars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aadhaars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request
        $this->validate($request, [
            'file' => 'file|required|mimes:csv,xls,xlsx|max:2048',
        ]);

        // declare the file name as a variable with the current time
        $file_name = time() . '_' . $request->file->getClientOriginalName();
        // get the file
        $file = $request->file('file');
        // store the file to the imports folder
        $file->storeAs('imports', $file_name);

        // Record the file name and path in the database
        $import = Import::create([
            'file_name' => $file_name,
            'file_path' => 'imports/' . $file_name,
            'is_imported' => false,
        ]);

        // try catch block
        try {
            // import the file in AadhaarsImport class
            $aadhaar_import = new AadhaarsImport($import->id);
            $aadhaar_import->import($import->file_path);

            // update the import record to indicate that the file has been imported
            $import->update([
                'is_imported' => true,
            ]);

            // redirect to the list page
            return redirect()->route('aadhaars.index')->with('success', 'File imported successfully.');
        } catch (\Exception $e) {
            // delete the file from the imports folder
            \Storage::delete('imports/' . $file_name);
            // delete the import record from the database
            $import->delete();
            // return the error message
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Http\Response
     */
    public function show(Aadhaar $aadhaar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Http\Response
     */
    public function edit(Aadhaar $aadhaar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aadhaar $aadhaar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aadhaar  $aadhaar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aadhaar $aadhaar)
    {
        //
    }
}
