<?php
/**
 * Created by PhpStorm.
 * User: hr
 * Date: 2018/9/18
 * Time: 10:13
 */

namespace App\Services\Impl;


use App\Services\BaseService;
use App\Services\PostService;

class PostImplService extends BaseService implements PostService
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getPostModel();
    }
}