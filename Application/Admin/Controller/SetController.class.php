<?php
namespace Admin\Controller;
use Think\Controller;

class SetController extends Controller 
{
    public function index()
    {
        $this->display('Set/Set');
    } 

    public function setLog()
    {
        $this->display('Set/sys-log');
    }


    public function updateSet()
    {
        $json = json_decode(I("post.json"), true);
        var_dump($json);
        var_dump(I("post.json"));
    }

}
