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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = \CorpBinary\Transaction::join('users','users.id','=','transaction.id_submitting_user')
        ->leftJoin('reputation','users.id','=','reputation.id_user')
        ->join('currency','transaction.id_currency','=','currency.id_currency')
        ->where('type',1)
        ->where('status',0)->selectRaw('transaction.*,users.*, reputation.reputation, currency.abv')->get();

        $buys = \CorpBinary\Transaction::join('users','users.id','=','transaction.id_submitting_user')
        ->leftJoin('reputation','users.id','=','reputation.id_user')
        ->join('currency','transaction.id_currency','=','currency.id_currency')
        ->where('type',0)
        ->where('status',0)->selectRaw('transaction.*,users.*, reputation.reputation, currency.abv')->get();
        
        return view('home',array(
            'buys'=>$buys,
            'sells'=>$sells
        ));
    }
}
