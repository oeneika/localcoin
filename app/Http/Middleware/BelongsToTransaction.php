<?php

namespace CorpBinary\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BelongsToTransaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $transaction = \CorpBinary\Transaction::find($request->id);
        if($transaction->receivingUser->id != Auth::user()->id && $transaction->submittingUser->id != Auth::user()->id){
            return redirect('home');
        }
        return $next($request);
    }
}
