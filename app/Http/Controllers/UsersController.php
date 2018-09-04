<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Http\Controllers\Controller;
use CorpBinary\User;
use Validator;

class UsersController extends Controller
{
    /**
     * Show user with a specific id
     * 
     * @param $id: Id of the user to find
     */
    public function show($id){
        return \CorpBinary\User::find($id);
    }

    /**
     * Display all users in the system for the Admin/Muestra todos los usuarios en el sistema para el admin
     */
    public function showUsers(){
        $users = \CorpBinary\User::selectRaw('users.id, users.name, users.lastname, COUNT(transaction.id_transaction) AS transactions_by_user, IFNULL(reputation.reputation,0) AS rank')
        ->join('bank_account','bank_account.id_user','=','users.id')
        ->leftJoin('transaction',function($join){
            $join->on('transaction.id_submitting_account','=','bank_account.id_bank_account')->orOn('transaction.id_receiving_account','=','bank_account.id_bank_account');
        })
        ->leftJoin('reputation','reputation.id_user','=','users.id')
        ->groupBy('users.id','users.name','users.lastname','rank')
        ->get();
    	return view('users.users',array(
            'users'=>$users
        ));
    }

    /**
     * Rank an user
     */
    public function rank(Request $request){
        
        $validator = Validator::make($request->all(),[
            'id_user'=>'required',
            'rank'=>'required|numeric'
        ]);

        if($validator->passes()){
            $rank = \CorpBinary\Rank::find($request->input('id_user'));

            #If empty, create a new enitity/Si esta vacio crear un entidad nueva
            if (blank($rank)){
                $rank =  new \CorpBinary\Rank;
            }

            $rank->reputation = $request->input('rank');
            $rank->id_user = $request->input('id_user');

            $rank->save();

            return response()->json(array('success'=>1,'message'=>'Puntuado con éxito!'));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }
    
}
