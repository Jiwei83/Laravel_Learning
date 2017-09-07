<?php
/**
 * Created by PhpStorm.
 * User: majiwei
 * Date: 7/09/2017
 * Time: 2:16 PM
 */

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $member = $request->session()->get('member', '');
        if($member == '') {
            return redirect('/login');
        }
        return $next($request);
    }

}