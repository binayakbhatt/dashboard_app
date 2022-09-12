<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get all offices
        $offices = \App\Models\Office::all();

        return view('auth.register', compact('offices'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()->mixedCase()->symbols()],
            'employee_id' => ['required', 'integer', 'unique:users'],
            'designation' => ['required', 'string', 'max:255'],
            'office_ids' => ['required', 'exists:offices,id'],
        ]);

        // Get role id for Guest
       $role = \App\Models\Role::where('name', 'Guest')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'employee_id' => $request->employee_id,
            'designation' => $request->designation,
            // 'office_id' => $request->office_id,
            'is_active'=>false,
            'role_id' => $role->id,
        ]);

        // Attach offices to user
        $user->offices()->attach($request->office_ids);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
