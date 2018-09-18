<?php
/**
 * Created by PhpStorm.
 * User: hr
 * Date: 2018/9/18
 * Time: 9:46
 */

namespace App\Services;


use App\Models\PostModel;

class BaseService
{
    protected $model;

    /**
     * 获取某条记录数据
     * @param int $id
     * @return mixed
     */
    public function getById(int $id){
        return $this->model->getById($id);
    }

    /**
     * 分页数据
     * @return mixed
     */
    public function list()
    {
        return $this->model->list();
    }

    /**
     * 新增数据
     * @param array $fields
     * @return mixed
     */
    public function insert(array $fields)
    {
        return $this->model->insert($fields);
    }

    /**
     * 更新数据
     * @param array $fields
     * @param $id
     * @return mixed
     */
    public function updateById(array $fields, int $id)
    {
        return $this->model->updateById($fields, $id);
    }

    /**
     * 删除数据
     * @param int $id
     * @return mixed
     */
    public function delete(int $id){
        return $this->model->delete($id);
    }

    /**
     * 判断是否存在
     * @param int $id
     * @return mixed
     */
    public function checkExistsById(int $id){
        return $this->model->checkExistsById($id);
    }

    protected function getEmailService(){
        return resolve(EmailService::class);
    }

    protected function getPostService(){
        return resolve(PostService::class);
    }

    protected function getPostModel(){
        return resolve(PostModel::class);
    }
}