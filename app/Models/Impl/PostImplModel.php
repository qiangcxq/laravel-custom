<?php
/**
 * Created by PhpStorm.
 * User: hr
 * Date: 2018/9/18
 * Time: 11:16
 */

namespace App\Models\Impl;


use App\Models\BaseModel;
use App\Models\PostModel;

class PostImplModel extends BaseModel implements PostModel
{
    protected $table = 'posts';
    protected $perPage = 5;

    public function updateById(array $fields, int $id)
    {
        return $this->update($fields, array("id" => $id));
    }
}