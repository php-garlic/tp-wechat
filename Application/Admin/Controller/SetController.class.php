<?php
namespace Admin\Controller;

use Think\Controller;

class SetController extends Controller 
{
    /**
     *
     */
    public function index()
    {
        $set = D('Config')->getField('name,value');
        $this->assign('set', $set);
        $this->display('Set/Set');

    } 

    public function setLog()
    {
        $this->display('Set/sys-log');
    }

    /**
     * 更新配置信息
     *
     * @return mixed
     */
    public function updateSet()
    {
        if ( Is_POST ) {

            $set = D('Config');
            $status = 1;
            foreach ( I("post.") as $k => $v) {

                $res = $set->where("name = '". $k ."'")->find();

                if ( $res['value'] !== $v ) {
                    $status = $set->where("id = ".$res['id'] )->setField('value', $v);
                }

            }

            if ( $status ) {
                if ( $this->setConfig() ) {
                    return $this->success('保存成功！');

                } else {
                    return $this->error('保存成功！配置文件写入失败！');
                }

            } else {
                return $this->error('保存失败！');
            }
//            dump(D('Config'));
        }
        return $this->error('非法请求');

    }

    /**
     * 写入配置文件
     *
     * @return int
     */
    public function setConfig()
    {
        $set = D('Config')->getField('name,value');

        $str = "<?php \r\n return".'  '.var_export($set,true).";";

        $path = CONF_PATH.'config_web.php';

        if ( file_put_contents($path, $str) ) {
            return 1;
        }
        return 0;

    }

}
