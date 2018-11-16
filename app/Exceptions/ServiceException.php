<?php
/**
 * Created by PhpStorm.
 * User: chenbotome@163.com
 * Date: 2018/10/22
 * Time: 16:52
 */

namespace App\Exceptions;


class ServiceException extends \Exception
{
    public function report()
    {

    }

    public function render($request, \Exception $exception)
    {
        return response()->json(['code' => 5001, 'msg' => $exception->getMessage(), 'detail' => $exception->getFile()]);
    }
}