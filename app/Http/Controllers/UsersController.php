<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use CorpBinary\Http\Controllers\Controller;
use CorpBinary\User;

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

    public function showUsuarios(){
    	return view('usuarios.usuarios');
    }
    
}
