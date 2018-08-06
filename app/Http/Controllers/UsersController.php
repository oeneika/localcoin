<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    /**
     * Show user with a specific id
     * 
     * @param $id: Id of the user to find
     */
    public function show($id){
        return \App\User::find($id);
    }
}
