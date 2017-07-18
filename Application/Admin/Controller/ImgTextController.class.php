<?php
namespace Admin\Controller;
use Think\Controller;

class ImgTextController extends Controller 
{
    public function index()
    {
        $this->display('ImgText/list');
    }

    public function edit()
    {
        $this->display('ImgText/edit');
    }

    public function add()
    {
        $this->display('ImgText/add');
    }
}
