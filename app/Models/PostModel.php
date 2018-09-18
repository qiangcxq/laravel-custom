<?php

namespace App\Models;


interface PostModel
{
    public function getById(int $id);

    public function insert(array $fields);

    public function updateById(array $fields, int $id);
}
