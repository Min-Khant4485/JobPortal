<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\CommonTrait;
use App\Models\Employer;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = RouteServiceProvider::JOBPOST;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $temporaryData = [];

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
    {
        if (Auth::user()->role == '18') {
            return RouteServiceProvider::ADMIN_DASHBOARD;
        } elseif (Auth::user()->role == '25') {
            return RouteServiceProvider::EMPLOYER_CREATE;
        } else {
            return RouteServiceProvider::JOBSEEKER_CREATE;
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // $companyName = request('company_name');

        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'string', 'max:13'],
            'dob' => 'date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer'],
        ];

        // if ($companyName != null) {
        //     $rules['company_name'] = ['required', 'string', 'max:255'];
        // }


        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd()
        // $companyName = request('company_name');
        $userData = [
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'phone_no' => $data['phone_no'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ];
        // dd($userData);

        // if ($companyName != null) {
        //     $userData['company_name'] = $data['company_name'];
        // }
        // dd($userData);
        return User::create($userData);
    }
}
