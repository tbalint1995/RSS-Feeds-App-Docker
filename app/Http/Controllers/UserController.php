<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordForgottenRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{

    /*
    * @param \App\Http\Requests\LoginRequest $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function login(LoginRequest $request) : RedirectResponse {

        $validated = $request->validated();

        if(!Auth::attempt($validated, $request->remember))
            return redirect()   ->back()
                                ->withInput()
                                ->withErrors(['loginError'=>__('Hibás belépési adatok!')]);
                                
        return redirect()->route('user.profile');
    }


    /*
     *   @param \App\Http\Requests\RegisterRequest $request 
     *   @return \Illuminate\Http\RedirectResponse 
     */
    public function register(RegisterRequest $request) : RedirectResponse {

        $validated = $request->validated();

        Auth::login( User::create($validated) );

        return redirect()->route('user.profile');
    }

 
 
}
