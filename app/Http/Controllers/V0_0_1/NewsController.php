<?php

namespace App\Http\Controllers\V0_0_1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getPostService()->list();
        return ['code' => 200, 'data' => $data];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->post('title');
        $content = $request->post('content');
        $result = $this->getPostService()->insert(['title' => 'post', 'content' => date('Y-m-d H:i:s', time())]);
        if ($result){
            $this->getEmailService()->test();
            return ['code' => 200, 'data' => $result];
        } else {
            return ['code' => 500, 'msg' => '保存失败', 'data' => false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->getPostService()->getById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->post('title');
        $content = $request->post('content');
        $result = $this->getPostService()->updateById(['title' => 'post', 'content' => date('Y-m-d H:i:s', time())], $id);
        if ($result){
//            $this->getEmailService()->test();
            return ['code' => 200, 'data' => $result];
        } else {
            return ['code' => 500, 'msg' => '保存失败', 'data' => false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->getPostService()->checkExistsById($id)){
            $result = $this->getPostService()->delete($id);
            if ($result){
                return ['code' => 200, 'msg' => '删除成功'];
            } else {
                return ['code' => 500, 'msg' => '删除失败'];
            }
        } else {
            return ['code' => 500, 'msg' => '不存在该条记录数据'];
        }
    }

}
