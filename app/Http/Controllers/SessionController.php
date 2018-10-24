<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/19
 * Time: 16:11
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login(Request $request){
        $code = $request->post('code');
        $this->getWechatService()->getCode2Session($code);
        return reply(200, '登陆成功');
    }
}