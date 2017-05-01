<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\customer;
use App\customer_update;

class ReturnToAccountIfAccountMismatch
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
        $customer = customer::find($request->route('id'));
        if($customer->user_id == Auth::user()->id)
    {
        return $next($request); // They're the owner, lets continue...
    }
    else {
      return redirect('/account');
    }


    }
}
