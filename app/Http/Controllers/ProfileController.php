<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/profile');
    }

    public function password(Request $request)
    {
        if (!Hash::check($request::get('current-password'), Auth::user()->password)) {
            return redirect()->back()->withErrors(['current-password' => 'Current password does not match our records.']);
        }

        $request::validate([
            'current-password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request::get('password'));
        $user->save();
        return redirect('profile');
    }

    public function email(Request $request)
    {
        $request::validate([
            'email' => 'required|string|email|unique:users',
        ]);

        $user = Auth::user();
        $user->email = $request::get('email');
        $user->save();
        return redirect('profile');
    }

    public function edit(Request $request)
    {
        $request::validate([
            'forename' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'birthdate' => ['required', 'date'],
            'city' => ['required', 'string', 'max:100'],
            'street' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:16'],
        ]);

        $user = Auth::user();
        $user->removeRole(Auth::user()->rank);
        $user->assignRole($request::get('rank'));
        $user->forename = $request::get('forename');
        $user->surname = $request::get('surname');
        $user->birthdate = $request::get('birthdate');
        $user->city = $request::get('city');
        $user->street = $request::get('street');
        $user->phone_number = $request::get('phone_number');
        $user->rank = $request::get('rank');
        $user->save();
        return redirect('profile');
    }
}