<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    //Requesti handle ettiğimiz metod.
    //Bu metod middlewarei oluşturduğunuz zaman otomatik olarak gelir.
    //Bu metoda ek olarak argüman ekleyebilirsiniz. Ben $role argümanını ekledim.
    public function handle($request, Closure $next, $role)
    {
        //User modelinde yazmış olduğumuz checkRole metodunu çağırıyoruz.
        //Parametre olarak requestten gelen $role parametresini gönderiyoruz.
        if (!$request->user()->hasRole($role)) {
            return redirect('home');
        }
        //İş akışını devam ettiriyoruz.
        return $next($request);
    }
}
