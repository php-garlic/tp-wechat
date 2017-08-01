<?php
namespace Home\Controller;

use Think\Controller;
use EasyWeChat\Message\Text;
use EasyWeChat\Foundation\Application;

class IndexController extends Controller
{

    public function index()
    {
        $options = [
            'debug' => true,
            'app_id' => 'wxe07339320208362c',
            'secret' => '4676228912b84ff8e157a1b42dad2657',
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
}
