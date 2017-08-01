<?php
namespace Admin\Controller;

use Think\Controller;

class TextController extends Controller
{
    public function index()
    {
        $text = D('Text');
        //统计总记录数
        $count = $text->count();
        //实例化分页类，传入总记录数和每页显示的条数
        $page = new \Think\Page($count, 1);
        //分页输出
        $show = $page->show();
        //进行分页查询，limit方法参数需要使用 page 类的属性
        $list = $text->order('id')->limit($page->firstRow.','.$page->listRows)->select();
        //发送数据到模板
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->assign('count', $count);
        //输出模板
        $this->display('Text/list');
    }

    //添加页
    public function create()
    {
        $this->display('Text/add');
    }

    //添加
    public function store()
    {
        if ( IS_AJAX ) {
            $text = D('Text');
            $res  = $text->where('keywords="'.I('post.keywords').'"')->getField('keywords');
            //判断是否存在
            if ( !$res ) {
                $data['keywords']    = I('post.keywords');
                $data['connent']     = I('post.connent');
                $data['enabled']     = I('post.enabled');
                $data['created_at']  = date('Y-m-d H:i:s');
                $data['updated_at']  = date('Y-m-d H:i:s');
                if ( $text->add($data) ) {
                    $this->ajaxReturn( $this->msg(1,'添加成功！') );
                }
                $this->ajaxReturn( $this->msg(0,'添加失败！') );
            }
            $this->ajaxReturn( $this->msg(0,'该关键词已存在！') );
        }
    }

    //修改页
    public function edit()
    {
        $res = D('Text')->find(I('get.id'));
        //判断是否存在
        if ($res) {
            $this->assign('text', $res);
            $this->display('Text/edit');
        } else {
            $this->error('没有找到相关信息！');
        }

    }

    //更新
    public function update()
    {
        if ( IS_AJAX ) {

            $res = D('Text')->find( I('post.id') );
            //判断是否存在
            if ( $res ) {
                $text = D('Text');
                $text->keywords    = I('post.keywords');
                $text->connent     = I('post.connent');
                $text->enabled     = I('post.enabled');
                $text->updated_at  = date('Y-m-d H:i:s');
                //判断是否保存成功
                if ( $text->save() ) {
                    $this->ajaxReturn( $this->msg(1, '修改成功！') );
                }
                $this->ajaxReturn( $this->msg(0, '修改失败！') );
            } else {
                $this->ajaxReturn( $this->msg(0, '没有找到相关信息！') );
            }
        } else {
            $this->ajaxReturn( $this->msg(0, '错误！非法请求！') );
        }
    }

    //修改状态
    public function enabled() {
        if ( IS_AJAX ) {

            $text = D('Text');
            $res  = $text->where('id='.i('post.id') )->getField('id');
            //判断是否存在
            if ( $res ) {

                $update = $text->where('id='.i('post.id') )
                               ->setField('enabled', I('post.enabled') );
                if ( $update ) {

                    $this->ajaxReturn( $this->msg(1, '修改成功') );
                }

                $this->ajaxReturn( $this->msg(0, '修改失败') );
            }

            $this->ajaxReturn( $this->msg(0, '错误！没有找到相关信息！') );

        } else {

            $this->ajaxReturn( $this->msg(0, '错误！非法请求！') );
        }

    }

    //删除
    public function destroy()
    {
        if ( IS_AJAX ) {

            $text = D('Text');
            $res  = $text->where('id='.i('post.id') )->getField('id');
            //判断是否存在
            if ( $res ) {
                if ( $text->delete( i('post.id') ) ) {
                    $this->ajaxReturn( $this->msg(1, '删除成功！') );
                }
                $this->ajaxReturn( $this->msg(0, '删除失败！') );
            } else {
                $this->ajaxReturn( $this->msg(0, '错误，没有找到相关信息！') );
            }
        } else {
            $this->ajaxReturn( $this->msg(0, '错误！非法请求！') );
        }
    }

    public function msg($number=0, $msg)
    {
        $error['success'] = $number;
        $error['msg']     = $msg;
        return $error;
    }

}
