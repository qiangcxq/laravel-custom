<?php
/**
 * Created by PhpStorm.
 * User: hr
 * Date: 2018/9/18
 * Time: 10:10
 */

namespace App\Services;


interface PostService
{
    public function list();

    public function insert(array $fields);

    public function updateById(array $fields, int $id);
}