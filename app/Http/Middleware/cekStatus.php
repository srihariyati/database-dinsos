<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = array_slice(func_get_args(), 2); 
        foreach ($roles as $name) {
            $user = auth() ->user()->name; 
            if($user == $name){
                return $next($request);
            }
        }

        return back()->with('error',' Kamu tidak memiliki hak akses untuk mengedit data !!');
    }

}
