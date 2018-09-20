<?php

namespace CorpBinary\Http\Controllers\Auth;

use CorpBinary\User;
use CorpBinary\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
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
    protected $redirectTo = '/home';

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
        $captcha = Request::input('g-recaptcha-response');

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data_post = [
            'secret'=>'6LcBTHEUAAAAAPzvv71gcg7-EF68xFVLxXUVjxu1',
            'response'=>$captcha,
        ];
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data_post));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        $data['captcha'] = $response->success;

        return Validator::make($data, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
            'lastname' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user' => 'required|alpha_dash|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'captcha' => 'accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \CorpBinary\User
     */
    protected function create(array $data)
    {
        

        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'user' => $data['user'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
