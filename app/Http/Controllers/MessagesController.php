<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function buy()
    {
        return view('messages.buy');
    }

    public function sell()
    {
        return view('messages.sell');
    }

    /**
     * Send messages/Envia mensajes
     */
    public function sendMessage(Request $request){

    }
}
