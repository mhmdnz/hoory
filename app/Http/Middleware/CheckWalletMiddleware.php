<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckWalletMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            count(Auth::user()->wallets) > 0 ||
            in_array(\Request::route()->getName(), ['wallet.add.show', 'wallet.add.create'])
        ) {
            return $next($request);
        }

        return redirect()->route('wallet.add.show');
    }
}
