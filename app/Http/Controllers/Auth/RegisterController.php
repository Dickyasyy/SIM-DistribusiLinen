<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UnitLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_petugas' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5',],
            'unit' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],    
        ]);
    }

    public function showRegistrationForm()
    {
        $units = UnitLayanan::all('nama_unit');
        return view('auth.register', compact('units'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama_petugas' => $data['nama_petugas'],
            'password' => Hash::make($data['password']),
            'unit' => $data['unit'],
            'jabatan' => $data['jabatan'],
        ]);
    }
}