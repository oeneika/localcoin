<?php

namespace CorpBinary\Http\Controllers\Auth;

use CorpBinary\User;
use CorpBinary\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
        return Validator::make($data, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
            'lastname' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
            'country' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|alpha|string|max:255',
            'state' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user' => 'required|max:255|unique:users',
            'passport' => 'required|file|image',
            'identification' => 'required|file|image',
            'password' => 'required|string|min:6|confirmed',
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
        #Get the passports and identification files\Obtenemos los archivos de  pasaporte e identificacion
        $request = request();

        $passport_path = $request->passport->store('passport');
        $identification_path = $request->identification->store('identification');

        var_dump($data);


        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'birthday' => $data['expiration-date'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'passport' => $passport_path,
            'identificationi' => $identification_path,
            'city' => $data['city'],
            'state' => $data['state'],
            'mobile' => $data['mobile'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'user' => $data['user'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
