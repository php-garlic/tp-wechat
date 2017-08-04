<?php
namespace Home\Controller;

use Think\Controller;
use EasyWeChat\Message\Text;
use EasyWeChat\Foundation\Application;

class IndexController extends Controller
{

    public function index()
    {

        $this->show('hello word');

    }


    public function server()
    {
        $options = [
            'debug'  => true,
            'app_id' => C('Appid'),
            'secret' => C('AppSecret'),
            'token'  => C('Token'),
            'log'    => [
                'level' => 'debug',
                'file'  => '/tmp/easywechat.log',
            ],

        ];

        $app = new Application($options);
        $server = $app->server;
        $userApi = $app->user;
        $server->setMessageHandler(function ($message) use ( $userApi ) {
            switch ($message->MsgType) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    $res = D('Text')->where("keywords = '".$message->Content."'")->find();
                    if (!$res) {
                        return 'za';
                    }
                    return $text = new Text(['content' => $res['connent']]);
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
            // ...
        });
        $response = $server->serve();
        $response->send();
    }

    //测试号
    public function test()
    {

        $options = [
            'debug'  => true,
            'app_id' => 'wxbb072f64ecf059ba',
            'secret' => 'd4624c36b6795d1d99dcf0547af5443d',
            'token'  => C('Token'),
            'log'    => [
                'level' => 'debug',
                'file'  => '/tmp/easywechat.log',
            ],

        ];

        $app = new Application($options);
        $server = $app->server;
        $userApi = $app->user;
        $server->setMessageHandler(function ($message) use ( $userApi ) {
            switch ($message->MsgType) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    $res = D('Text')->where("keywords = '".$message->Content."'")->find();
                    if (!$res) {
                        return 'za';
                    }
                    return $text = new Text(['content' => $res['connent'].$userApi->get($message->FromUserName)->nickname]);
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
            // ...
        });
        $response = $server->serve();
        $response->send();
    }
}
