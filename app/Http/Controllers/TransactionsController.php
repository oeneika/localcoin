<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use CorpBinary\User;
use CorpBinary\Transaction;
use CorpBinary\Bank;
use CorpBinary\Currency;
use CorpBinary\PaymentMethod;
use CorpBinary\BankAccount;
use CorpBinary\Notifications\approvedTransaction;

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
        $transactions = \CorpBinary\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->where('id_submitting_user',Auth::user()->id)->where('transaction.type',0)->get();
        return view('transactions.myBuysTrade',array(
            'transactions' => $transactions,
            'bank_accounts'=> \CorpBinary\BankAccount::where('id_user',Auth::user()->id)->get(),
            'currencies' => \CorpBinary\Currency::all()
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
            'price'=>'required|numeric',
            'currency'=>'required',
            'terms'=>'required',
            'upper_limit'=>'required|numeric|gt:bottom_limit',
            'bottom_limit'=>'required|numeric',
            'payment_method'=>'required',
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');
            //$transaction->quantity = $request->input('quantity');
            $transaction->terms = $request->input('terms');
            $transaction->upper_limit = $request->input('upper_limit');
            $transaction->bottom_limit = $request->input('bottom_limit');
            $transaction->payment_method = $request->input('payment_method');
            $transaction->location = $request->input('location');
            //$transaction->payment_window = $request->input('payment_window');
            $transaction->type = 0;
            $transaction->id_submitting_user = Auth::user()->id;

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
     * Show sells made by user in session
     */
    public function mySells()
    {
        $transactions = \CorpBinary\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->where('id_submitting_user',Auth::user()->id)->where('transaction.type',1)->get();
        return view('transactions.mySellsTrade',array(
            'transactions' => $transactions,
            'bank_accounts'=> \CorpBinary\BankAccount::where('id_user',Auth::user()->id)->get(),
            'currencies' => \CorpBinary\Currency::all()
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
            'price'=>'required|numeric',
            'currency'=>'required',
            'terms'=>'required',
            'upper_limit'=>'required|numeric|gt:bottom_limit',
            'bottom_limit'=>'required|numeric',
            'payment_method'=>'required',
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');
            //$transaction->quantity = $request->input('quantity');
            $transaction->terms = $request->input('terms');
            $transaction->upper_limit = $request->input('upper_limit');
            $transaction->bottom_limit = $request->input('bottom_limit');
            $transaction->payment_method = $request->input('payment_method');
            $transaction->location = $request->input('location');
            //$transaction->payment_window = $request->input('payment_window');
            $transaction->type = 1;
            $transaction->id_submitting_user = Auth::user()->id;

            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Venta creada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }

    /**
     * Makes transaction
     */
    public function make(Request $request, $id){

        $request->validate([
            'quantity'=>'required|numeric',
            'price'=>'required|numeric',
        ]);

        $transaction = Transaction::find($id);
        $transaction->status = 1;
        $transaction->quantity = $request->input('quantity');
        $transaction->id_receiving_user = Auth::user()->id;
        $transaction->save();

        return redirect(route('messagesBuy'));
    }

    /**
     * Notify the users about an approved transaction
     */
    private function notifyApprovedTransaction(Transaction $transaction){
        
        $sub_bank = BankAccount::find($transaction->id_submitting_account);
        $rec_bank = BankAccount::find($transaction->id_receiving_account);

        $sub_user = User::find($sub_bank->id_user);
        $rec_user = User::find($rec_bank->id_user);

        $sub_user->notify(new approvedTransaction($transaction));
        $rec_user->notify(new approvedTransaction($transaction));
    }

    /**
     * Aprove a transaction/Aprueba una transaccion
     * 
     * @param int $id: Transaction id
     */
    public function approveTransaction($id){

        $transaction = Transaction::find($id);

        $transaction->status = 2;

        $this->notifyApprovedTransaction($transaction);

        $transaction->save();

        return response()->json(array('success'=>1,'message'=>'Transacción aprovada con éxito'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buy($id)
    {
        return view('transactions.buy',[
            'transaction' => Transaction::find($id),
        ]);
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
