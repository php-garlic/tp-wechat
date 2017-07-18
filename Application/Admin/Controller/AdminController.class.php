<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller 
{
    public function index()
    {
        $this->display('Admin/list');
    }

    public function edit()
    {
        $this->display('Admin/edit');
    }

    public function add()
    {
        $this->display('Admin/add');
    }
}
