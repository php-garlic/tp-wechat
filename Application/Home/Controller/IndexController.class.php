<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $signature  = $_GET["signature"];
        $timestamp  = $_GET["timestamp"];
        $nonce      = $_GET["nonce"];
        $echostr    = $_GET['echostr'];
        $token      = 'dasuan';
        $tmpArr     = array($token, $timestamp, $nonce);
            sort($tmpArr, SORT_STRING);
            $tmpStr    = implode( $tmpArr );
            $tmpStr    = sha1( $tmpStr );
            if( $tmpStr == $signature && $echostr)
            {
            <span style="white-space:pre">  </span>echo $echostr;
            }else{
                $this->reposeMsg();
            }
    }
}
