<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Http\Controllers\Controller;
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
        $transactions = \CorpBinary\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->join('bank_account','bank_account.id_bank_account','=','transaction.id_submitting_account')->where('bank_account.id_user',auth()->user('id')['id'])->where('transaction.type',0)->get();
        return view('transactions.mybuys',array(
            'transactions' => $transactions,
            'bank_accounts'=> \CorpBinary\BankAccount::where('id_user',auth()->user('id')['id'])->get(),
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
            'bank_account'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'currency'=>'required',
            'transfer_number'=>'required',
            'transfer_date'=>'required',
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->price = $request->input('price');
            $transaction->id_currency = $request->input('currency');
            $transaction->submitting_transfer_number = $request->input('transfer_number');
            $transaction->submitting_transfer_date = $request->input('transfer_date');
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
        $transactions = \CorpBinary\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')->join('bank_account','bank_account.id_bank_account','=','transaction.id_submitting_account')->where('bank_account.id_user',auth()->user('id')['id'])->where('transaction.type',1)->get();
        return view('transactions.mysells',array(
            'transactions' => $transactions,
            'bank_accounts'=> \CorpBinary\BankAccount::where('id_user',auth()->user('id')['id'])->get(),
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
            'bank_account'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'currency'=>'required',
            'transfer_number'=>'required',
            'transfer_date'=>'required',
        ]);

        if ($validator->passes()){
            $transaction = new Transaction;
            $transaction->price = $request->input('price');
            $transaction->quantity = $request->input('quantity');
            $transaction->submitting_transfer_number = $request->input('transfer_number');
            $transaction->submitting_transfer_date = $request->input('transfer_date');
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


    public function onHold(){

        $transactions = \CorpBinary\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')
        ->join('bank_account AS submitting_bank','submitting_bank.id_bank_account','=','transaction.id_submitting_account')
        ->join('bank_account AS receiving_bank','receiving_bank.id_bank_account','=','transaction.id_receiving_account')
        ->join('users AS submitting_user','submitting_user.id','=','submitting_bank.id_user')
        ->join('users AS receiving_user','receiving_user.id','=','receiving_bank.id_user')
        ->join('wallet as submitting_wallet','submitting_wallet.id_user','=','submitting_user.id')
        ->join('wallet as receiving_wallet','receiving_wallet.id_user','=','receiving_user.id')
        ->selectRaw('submitting_user.name as sub_name, submitting_user.lastname sub_lastname,
                     receiving_user.name as rec_name, receiving_user.lastname rec_lastname,
                     submitting_bank.number AS submitting_number, receiving_bank.number AS receiving_number, 
                     submitting_wallet.address AS sub_address, receiving_wallet.address AS rec_address,
                     transaction.*, currency.name AS currency_name, currency.abv')
        ->where('transaction.status',1)->get();

        return view('transactions.onhold',array(
            'transactions'=> $transactions
        ));
    }

    /**
     * Makes transaction
     */
    public function make(Request $request){

        $validator = Validator::make($request->all(),[
            'bank_account'=>'required|numeric',
            'transfer_number'=>'required|numeric',
        ]);

        if($validator->passes()){
            $transaction = \CorpBinary\Transaction::find($request->input('id_transaction'));
            $transaction->status = 1;
            $transaction->receiving_transfer_number = $request->input('transfer_number');
            $transaction->receiving_transfer_date = date_create_from_format('d/m/Y', $request->input('transfer_date'));
            $transaction->id_receiving_account = $request->input('bank_account');
            $transaction->save();

            return response()->json(array('success'=>1,'message'=>'Transacción realizada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }

    /**
     * Display all completed transactions
     */
    public function completedTransactions(){

        $transactions = \CorpBinary\Transaction::join('currency','currency.id_currency','=','transaction.id_currency')
        ->join('bank_account','bank_account.id_bank_account','=','transaction.id_submitting_account')
        ->join('bank_account AS receiving_account','receiving_account.id_bank_account','=','transaction.id_receiving_account')
        ->join('users','users.id','=','bank_account.id_user')
        ->join('users AS receiving_users','receiving_users.id','=','receiving_account.id_user')
        ->when(auth()->user()['role'] != 1, function($query){
            return $query->where('receiving_account.id_user',auth()->user('id')['id'])
                         ->orWhere('bank_account.id_user',auth()->user('id')['id']);
        })
        ->where('transaction.status','=','2')
        ->selectRaw('bank_account.*, users.user,receiving_users.user AS receiving_user, transaction.*, currency.name AS currency_name')
        ->get();

        return view('transactions.completedtransactions',array(
            'transactions'=>$transactions
        ));
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
