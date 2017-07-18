<?php
namespace Admin\Controller;
use Think\Controller;

class CateController extends Controller 
{
    public function index()
    {
        $this->display('Cate/list');
    }
    public function edit()
    {
        $this->display('Cate/edit');
    }
}
