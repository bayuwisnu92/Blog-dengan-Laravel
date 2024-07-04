<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckUsername
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
        $allowedUsernames = $this->getAllowedUsernames();
        
        if (Auth::check() && in_array(Auth::user()->username, $allowedUsernames)) {
            return $next($request);
        }
        
        return redirect('/dashboard')->with('anda tidak dapat mengakses halaman ini karena anda bukan admin!!');
    }
    
    /**
     * Get the list of allowed usernames.
     *
     * @return array
     */
    protected function getAllowedUsernames()
    {
        // Mengambil daftar username yang diizinkan dari cache
        return Cache::get('allowed_usernames', ['bayuwisnu92']);
    }
}
