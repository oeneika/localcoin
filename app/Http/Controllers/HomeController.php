<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Transaction;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = \CorpBinary\Transaction::join('bank_account','bank_account.id_bank_account','=','transaction.id_submitting_account')
        ->join('users','users.id','=','bank_account.id_user')
        ->join('bank','bank_account.id_bank','=','bank.id_bank')
        ->where('type',1)->selectRaw('transaction.*,users.*,bank.name AS bank_name')->get();

        $buys = \CorpBinary\Transaction::join('bank_account','bank_account.id_bank_account','=','transaction.id_submitting_account')
        ->join('users','users.id','=','bank_account.id_user')
        ->join('bank','bank_account.id_bank','=','bank.id_bank')
        ->where('type',0)->selectRaw('transaction.*,users.*,bank.name AS bank_name')->get();
        
        return view('home',array(
            'buys'=>$buys,
            'sells'=>$sells
        ));
    }
}
