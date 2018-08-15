<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Http\Controllers\Controller;
use Validator;
use CorpBinary\BankAccount;

class BankAccountsController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #Fields Validation/Validacion de campos
        $validator = Validator::make($request->all(),[
            'bank'=>'required',
            'account_number'=>'required|numeric|digits:20|unique:bank_account,number'
        ]);

        if ($validator->passes()){
            $bank_account = new BankAccount;
            $bank_account->id_bank = $request->input('bank');
            $bank_account->number = $request->input('account_number');
            $bank_account->id_user = auth()->user('id')['id'];

            $bank_account->save();

            return response()->json(array('success'=>1,'message'=>'Cuanta guardada con éxito'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $bank_account = BankAccount::find($id);
        $bank_account->delete();

        return response()->json(['success'=>1,'message'=>'Eliminado exitosamente']);
    }
}
