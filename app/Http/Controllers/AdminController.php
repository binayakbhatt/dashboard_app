<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Set;

class AdminController extends Controller
{
    public function getUserList (){

        // get list of all user and view it in admin page

        $users = User::with('role')->get();

        return view('admin-dashboard',compact('users'));
    }

    public function activateUser(){

        //set is_active status to true


    }
    public function deactivateUser(){

        //set is_active status to false

    }
   
    public function assignUserRole(){

        //assign role to user

    }

    public function addRole(Request $request){
        //add Roles

        $role = Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin-dashboard')->with('success', 'role added sucessfully');

    }
     public function viewRole (){
        $roles = Role::all();
        return view('admin-dashboard',compact('roles'));
    }

    public function addOffice(Request $request){
          $office = Office::create([
            'name' => $request->name,
            'facility_id'=>$request->facility_id,
            'type'=>$request->type,
            ]);
        
        return redirect()->route('admin-dashboard')->with('success', 'office added sucessfully');

    }
    public function viewOffice (){
        $offices = Office::all();
        return view('admin-dashboard',compact('offices'));
    }
   
    public function addSet(Request $request){
        $set = Set::create([
            'name' => $request->name,
            ]);
        
        return redirect()->route('admin-dashboard')->with('success', 'set added sucessfully');
    }

    public function viewSet (){
        $sets= Set::all();
        return view('admin-dashboard',compact('sets'));
    }


}
