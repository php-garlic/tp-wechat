<?php
namespace Admin\Controller;
use Think\Controller;

class MemberController extends Controller 
{
    public function index()
    {
        $this->display('Member/list');
    }

    public function edit()
    {
        $this->display('Member/edit');
    }

    public function add()
    {
        $this->display('Member/add');
    }
}
