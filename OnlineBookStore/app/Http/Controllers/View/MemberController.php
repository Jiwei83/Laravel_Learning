<?php
/**
 * Created by PhpStorm.
 * User: majiwei
 * Date: 26/08/2017
 * Time: 12:19 PM
 */
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;

class MemberController extends Controller {
    public function toLogin() {
        return view('login');
    }

    public function toRegister() {
        return view('register');
    }
}