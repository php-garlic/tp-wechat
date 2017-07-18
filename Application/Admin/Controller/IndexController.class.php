<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller 
{
    public function index()
    {
        $this->display('Index/index');
    }
    public function welcome()
    {
        $this->display('Index/welcome');
    }
}
