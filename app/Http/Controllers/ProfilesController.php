<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use CorpBinary\BankAccount;
use CorpBinary\Bank;

class ProfilesController extends Controller
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
     * Mostrar perfil en el Trade
     */
    public function showProfileTrade(){
        return view ('profile.perfil-trade');
    }

    /**
     * Show profile of authenticated user
     */
    public function show(){
        $bank_accounts = \CorpBinary\BankAccount::join('bank','bank.id_bank','=','bank_account.id_bank')->where('id_user',Auth::id())->get();
        return view ('profile.profile',array(
            'bank_accounts'=>$bank_accounts,
            'banks'=>\CorpBinary\Bank::all()
        ));
    }

    /**
     * Edit authenticated user
     */
    public function edit(Request $request, $id){
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
            'username' => 'required|alpha_dash|string|max:255|unique:users,user,'.$id,
            'lastname' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
            'phone'=>'required|alpha_num',
            'gender'=>'required',
            'birthday'=>'required',
            'email'=>'required|email|max:255|unique:users,email,'.$id
        ]);

        $user = \CorpBinary\User::find($id);

        $user->name = $request->input('name');
        $user->user = $request->input('username');
        $user->lastname = $request->input('lastname');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->address = $request->input('address');
        $user->birthday = $request->input('birthday');

        $user->save();

        return redirect()->back()->with(['Success'=>'Editado con éxito']);
    }
}
