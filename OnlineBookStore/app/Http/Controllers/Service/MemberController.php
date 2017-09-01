<?php
/**
 * Created by PhpStorm.
 * User: majiwei
 * Date: 26/08/2017
 * Time: 12:19 PM
 */
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M3Result;
use App\Entity\Member;
use App\Entity\TempPhone;

class MemberController extends Controller {
    public function register(Request $request)
    {
        $email = $request->input('email', '');
        $phone = $request->input('phone', '');
        $password = $request->input('password', '');
        $confirm = $request->input('confirm', '');
        $phone_code = $request->input('phone_code', '');

        $m3_result = new M3Result;
        if ($email == '' && $phone == '') {
            $m3_result->status = 1;
            $m3_result->message = 'Empty phone or email';
            return $m3_result->toJson();
        }
        if ($password == '' || strlen($password) < 6) {
            $m3_result->status = 2;
            $m3_result->message = 'Password incorrect';
            return $m3_result->toJson();
        }
        if ($confirm == '' || strlen($confirm) < 6) {
            $m3_result->status = 3;
            $m3_result->message = 'Confirm password incorrect';
            return $m3_result->toJson();
        }
        if ($confirm != $password) {
            $m3_result->status = 4;
            $m3_result->message = 'Confirm password and password not same';
        }

        // 手机号注册
        if ($phone != '') {
            if ($phone_code == '' || strlen($phone_code) != 6) {
                $m3_result->status = 5;
                $m3_result->message = '手机验证码为6位';
                return $m3_result->toJson();
            }

            $tempPhone = TempPhone::where('phone', $phone)->first();
            if ($tempPhone->code == $phone_code) {
                if (time() > strtotime($tempPhone->deadline)) {
                    $m3_result->status = 7;
                    $m3_result->message = '手机验证码不正确';
                    return $m3_result->toJson();
                }

                $member = new Member;
                $member->phone = $phone;
                $member->password = md5('bk' . $password);
                $member->save();

                $m3_result->status = 0;
                $m3_result->message = '注册成功';
                return $m3_result->toJson();
            } else {
                $m3_result->status = 7;
                $m3_result->message = '手机验证码不正确';
                return $m3_result->toJson();
            }
        }
        else {
            $m3_result->status = 8;
            $m3_result->message = 'Unkown';
            return $m3_result->toJson();
        }
    }
}







































