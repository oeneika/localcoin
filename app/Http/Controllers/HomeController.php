<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function index(Request $request)
    {
        $sells = \CorpBinary\Transaction::join('currency','transaction.id_currency','=','currency.id_currency')
        ->where('type',1)
        ->where('status',0)->selectRaw('transaction.*, currency.abv')->get();

        $buys = \CorpBinary\Transaction::join('currency','transaction.id_currency','=','currency.id_currency')
        ->where('type',0)
        ->where('status',0)->selectRaw('transaction.*, currency.abv')->get();

        
        #If there is an authenticated user/Si hay un usuario conectado
        $trades = collect([]);
        if(Auth::user()){
            $trades = \CorpBinary\Transaction::selectRaw('transaction.*, currency.abv')
            ->join('currency','transaction.id_currency','=','currency.id_currency')
            ->where(function($query){
                $query->where('id_submitting_user',Auth::user()->id)
                ->orWhere('id_receiving_user',Auth::user()->id);
            })
            ->whereNotNull('transaction.id_receiving_user')
            ->whereNotNull('transaction.id_submitting_user')
            ->get();
        }

        $responses = $this->search($request);

        return view('home',array(
            'buys'=>$buys,
            'sells'=>$sells,
            'trades'=>$trades,
            'responses'=>$responses,
            'currencies'=>\CorpBinary\Currency::all()
        ));
    }

    /**
     * Display searched transactions
     */
    public function search(Request $request){

        $price = $request->input('price');
        $currency = $request->input('currency');
        $type = $request->input('type');
        $location = $request->input('location');
        $user = Auth::user() ? Auth::user()->id : null;

        $transactions = \CorpBinary\Transaction::when($price ,function($query,$price){
            return $query->where('bottom_limit','<',$price)
            ->where('upper_limit','>',$price);
        })
        ->when($type,function($query,$type){
            return $query->where('type',$type-1);
        })
        ->when($location,function($query,$location){
            return $query->where('location',$location);
        })
        ->when($currency,function($query,$currency){
            return $query->where('id_currency',$currency)->get();
        });

        return $transactions; 
    }
}
