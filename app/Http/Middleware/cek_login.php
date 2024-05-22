<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserModel;

class Cek_Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!Auth::check()){
            return redirect('login');
        }

        $user = Auth::user();

        if(in_array($user->id_level, $roles)){
            return $next($request);
        }

        return redirect('login')->with('error', 'Maaf anda tidak memiliki akses');
    
    }
}
