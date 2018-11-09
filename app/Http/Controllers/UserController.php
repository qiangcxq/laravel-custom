<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/11/5
 * Time: 13:21
 */

namespace App\Http\Controllers;


use App\Http\ResponseCode;
use App\Services\Impl\UserImplService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function location(Request $request){
        $latitude = $request->post('latitude', 0);
        $longitude = $request->post('longitude', 0);
        resolve(UserImplService::class)->updateLocation($latitude, $longitude);
        return reply(ResponseCode::$statusSuccess, '位置信息更新');
    }
}