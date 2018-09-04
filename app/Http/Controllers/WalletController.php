<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Http\Controllers\Controller;
use Validator;
use Auth;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'address'=>'required|between:26,35|alpha_num|unique:wallet,address',
            'label'=>'max:180'
        ]);

        if ($validator->passes()){
            $wallet = new \CorpBinary\Wallet();
            $wallet->id_user = Auth::user()->id;
            $wallet->address = $request->input('address');
            $wallet->label = $request->input('label');

            $wallet->save();

            return response()->json(array('success'=>1,'message'=>'Wallet agregada con éxito'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }
}
