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
        $transactions = \App\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->join('bank_account','bank_account.id_bank_account','=','transaction.id_submitting_account')->where('bank_account.id_user',auth()->user('id')['id'])->where('transaction.type',0)->get();
        return view('transactions.mybuys',array(
            'transactions' => $transactions,
            'bank_accounts'=> \App\BankAccount::where('id_user',auth()->user('id')['id'])->get(),
            'currencies' => \App\Currency::all()
        ));
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
            'bank_account'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'currency'=>'required'
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');
            $transaction->quantity = $request->input('quantity');
            $transaction->type = 0;
            $transaction->id_submitting_account = $request->input('bank_account');

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
            'bank_account'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'currency'=>'required'
        ]);

        #If validation passes without errors\Si la validacion pasa
        if ($validator->passes()){
            $transaction = Transaction::find($request->input('id_transaction'));

            $transaction->id_submitting_account = $request->input('bank_account');
            $transaction->price = $request->input('price');
            $transaction->quantity = $request->input('quantity');
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
        $transactions = \App\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->join('bank_account','bank_account.id_bank_account','=','transaction.id_submitting_account')->where('bank_account.id_user',auth()->user('id')['id'])->where('transaction.type',1)->get();
        return view('transactions.mysells',array(
            'transactions' => $transactions,
            'bank_accounts'=> \App\BankAccount::where('id_user',auth()->user('id')['id'])->get(),
            'currencies' => \App\Currency::all()
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
        #Validamos campos
        $validator = Validator::make($request->all(),[
            'bank_account'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'currency'=>'required'
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->price = $request->input('price');
            $transaction->quantity = $request->input('quantity');
            $transaction->id_currency = $request->input('currency');
            $transaction->type = 1;
            $transaction->id_submitting_account = $request->input('bank_account');

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
    public function updateSell(Request $request)
    {
        #Field validation\Validacion de campos
        $validator = Validator::make($request->all(),[
            'bank_account'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'currency'=>'required'
        ]);

        #If validation passes without errors\Si la validacion pasa
        if ($validator->passes()){
            $transaction = Transaction::find($request->input('id_transaction'));

            $transaction->id_submitting_account = $request->input('bank_account');
            $transaction->price = $request->input('price');
            $transaction->quantity = $request->input('quantity');
            $transaction->id_currency = $request->input('currency');

            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Venta editada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }

    /**
     * Makes transaction
     */
    public function make(Request $request){

        $validator = Validator::make($request->all(),[
            'bank_account'=>'required'
        ]);

        if($validator->passes()){
            $transaction = \App\Transaction::find($request->input('id_transaction'));
            $transaction->status = 2;
            $transaction->id_recieving_account = $request->input('bank_account');
            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Transacción realizada con éxito'));
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
