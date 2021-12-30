<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class Language {

    public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;
        \App::setLocale(session('lang' ));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('lang') == null){
            session(['lang' => 'es']);
        }
        $this->app->setLocale(session('lang'));
        \Illuminate\Support\Facades\Lang::setLocale(session('lang' ));
        

        return $next($request);
    }

}