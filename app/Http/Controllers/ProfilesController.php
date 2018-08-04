<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\BankAccount;
use App\Bank;

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
     * Show profile of authenticated user
     */
    public function show(){
        $bank_accounts = \App\BankAccount::join('bank','bank.id_bank','=','bank_account.id_bank')->where('id_user',Auth::id())->get();
        return view ('profile.profile',array(
            'bank_accounts'=>$bank_accounts,
            'banks'=>\App\Bank::all()
        ));
    }
}
