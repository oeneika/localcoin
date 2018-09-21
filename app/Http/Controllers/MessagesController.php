<?php

namespace CorpBinary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CorpBinary\Events\MessageSent;
use Validator;
use CorpBinary\Message;

class MessagesController extends Controller
{
    public function buy($id)
    {
        return view('messages.buy', [
            'transaction'=> \CorpBinary\Transaction::find($id),
        ]);
    }

    public function sell($id)
    {
        return view('messages.sell', [
            'transaction'=> \CorpBinary\Transaction::find($id),
        ]);
    }

    /**
     * Send messages/Envia mensajes
     */
    public function send(Request $request){
        #Validamos campos
        $validator = Validator::make($request->all(),[
            'content'=>'required',
            'id_transaction'=>'required',
            'image'=>'file|image'
        ]);
        
        if ($validator->passes()){
            $message = new Message;
            $message->content = $request->input('content');
            $message->id_user = Auth::user()->id;
            if($request->hasFile('image')){
                $message->file = $request->image->store('ChatImages');
            }
            $message->id_transaction = $request->input('id_transaction');

            $message->save();

            event(new MessageSent($message));
            return response()->json(array('success'=>1));
        }

        return response()->json(array('success'=>0,'errors'=>$validator->errors()->all()));
    }
}
