<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Transaction;
use App\Bank;
use App\Currency;
use App\PaymentMethod;

class TransactionsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myBuys()
    {
        //dump(\App\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->where('id_user_buyer',auth()->user('id')['id'])->get());
        return view('transactions.mybuys',array(
            'transactions' => \App\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->where('id_user_buyer',auth()->user('id')['id'])->get(),
            'banks'=> \App\Bank::all(),
            'currencies' => \App\Currency::all(),
            'methods' => \App\PaymentMethod::all()
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBuy()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBuy(Request $request)
    {
        #Validamos campos
        $validator = Validator::make($request->all(),[
            'bank'=>'required',
            'payment_method'=>'required',
            'price'=>'required|numeric',
            'currency'=>'required'
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->id_bank = $request->input('bank');
            $transaction->id_payment_method = $request->input('payment_method');
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');
            $transaction->type = 0;
            $transaction->id_user_buyer = auth()->user('id')['id'];

            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Venta creada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBuy(Request $request)
    {
        #Field validation\Validacion de campos
        $validator = Validator::make($request->all(),[
            'bank'=>'required',
            'payment_method'=>'required',
            'price'=>'required|numeric',
            'currency'=>'required'
        ]);

        #If validation passes without errors\Si la validacion pasa
        if ($validator->passes()){
            $transaction = Transaction::find($request->input('id_transaction'));
            $transaction->id_bank = $request->input('bank');
            $transaction->id_payment_method = $request->input('payment_method');
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');

            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Compra editada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }

    /**
     * Show sells meda by user in session
     */
    public function mySells()
    {
        //dump(\App\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->where('id_user_seller',auth()->user('id')['id'])->get());
        return view('transactions.mysells',array(
            'transactions' => \App\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->where('id_user_seller',auth()->user('id')['id'])->get(),
            'banks'=> \App\Bank::all(),
            'currencies' => \App\Currency::all(),
            'methods' => \App\PaymentMethod::all()
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSell()
    {
        return view('transactions.sell',array(
            'banks'=> \App\Bank::all(),
            'currencies' => \App\Currency::all(),
            'methods' => \App\PaymentMethod::all()
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSell(Request $request)
    {
        #Field validation\Validacion de campos
        $validator = Validator::make($request->all(),[
            'bank'=>'required',
            'payment_method'=>'required',
            'price'=>'required|numeric',
            'currency'=>'required'
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->id_bank = $request->input('bank');
            $transaction->id_payment_method = $request->input('payment_method');
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');
            $transaction->type = 1;
            $transaction->id_user_seller = auth()->user('id')['id'];

            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Compra creada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSell(Request $request)
    {
        #Field validation\Validacion de campos
        $validator = Validator::make($request->all(),[
            'bank'=>'required',
            'payment_method'=>'required',
            'price'=>'required|numeric',
            'currency'=>'required'
        ]);

        #If validation passes without errors\Si la validacion pasa
        if ($validator->passes()){
            $transaction = Transaction::find($request->input('id_transaction'));
            $transaction->id_bank = $request->input('bank');
            $transaction->id_payment_method = $request->input('payment_method');
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');

            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Compra editada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return response()->json(['success'=>1,'message'=>'Eliminado exitosamente']);
    }
}
