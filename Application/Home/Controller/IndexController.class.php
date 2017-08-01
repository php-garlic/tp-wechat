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
                    return '收到文字消息'.$userApi->get($message->FromUserName)->nickname;
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
