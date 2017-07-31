<?php
namespace Home\Controller;

use EasyWeChat\Foundation\Application;
use Think\Controller;


class IndexController extends Controller
{

    public function index()
    {
        $options = [
            'debug' => true,
            'app_id' => 'wxe07339320208362c',
            'secret' => '79a4a901a0f2deb9aeece8e11877927d',
            'token' => 'dasuan',
            'log' => [
                'level' => 'debug',
                'file' => '/tmp/easywechat.log',
            ],
// ...
        ];
        $app = new Application($options);
//        dump($app);
        $response = $app->server->serve();
// 将响应输出
        $response->send();
        $signature  = $_GET["signature"];
        $timestamp  = $_GET["timestamp"];
        $nonce      = $_GET["nonce"];
        $echostr    = $_GET['echostr'];
        $token      = 'dasuan';
        $tmpArr     = array($token, $timestamp, $nonce);
            sort($tmpArr, SORT_STRING);
            $tmpStr    = implode( $tmpArr );
            $tmpStr    = sha1( $tmpStr );
//            if( $tmpStr == $signature && $echostr)
//            {
//            echo $echostr;
//            }else{
//                $this->reposeMsg();
//            }
    }
}
