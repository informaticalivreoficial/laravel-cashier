<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
//use App\Models\Tenant;
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
        return view('auth.register');
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
            //'tenant' => ['required', 'string', 'min:3', 'max:100', 'unique:tenants,id' ],

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],            
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $tenant = new Tenant;
        // $tenant->name = $request->tenant;
        // $tenant->email = $request->email;
        // $tenant->status = 1;
        // $tenant->save();

        $user = User::create([
            'name' => $request->name,
            //'tenant' => $tenant->id,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'senha' => $request->password,
            'remember_token' => bcrypt($request->password),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
