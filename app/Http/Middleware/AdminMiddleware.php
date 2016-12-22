<?php

namespace appTest\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function __construct(Guard $auth)
      {
        $this->auth = $auth;
      }

    public function handle($request, Closure $next)
    {         
        $user = $this->auth->user(); 
        if($user != null) {      
            if ($user->typeAdminUser->typeAdmin->abbreviation=='ADMIN'){
              return $next($request);
            }else{           
              return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }
}
