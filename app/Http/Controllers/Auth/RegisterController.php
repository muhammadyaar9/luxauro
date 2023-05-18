<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        // return dd($data);

        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'zip_code' =>   ['required', 'numeric'],
            'conditions' => ['required'],
            'shop_name' => ['string', 'max:255'],
            'role' => ['required'],
            'status' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if (isset($data['conditions']) && $data['conditions'] == 1) {
            return User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'zip_code' => $data['zip_code'],
                'role' => $data['role'],
                'status' => $data['status'],
                isset($data['shop_name']) ? 'shop_name' : '' => isset($data['shop_name']) ? $data['shop_name'] : '',

            ]);
        } else {
            return redirect()->back()->with('error', 'Please accept the terms and conditions');
        }
    }
}
