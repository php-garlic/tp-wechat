<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/Public/templates/admin/css/x-admin.css" media="all">
    </head>

    <body>
        <div class="x-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="cname" class="layui-form-label">
                        ID
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="cname" name="id" required="" lay-verify="required"
                        autocomplete="off"  value="<?php echo ($text["id"]); ?>" disabled="" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="cname" class="layui-form-label">
                        <span class="x-red">*</span>关键词
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="cname" name="keywords" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($text["keywords"]); ?>">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="cname" class="layui-form-label">
                        <span class="x-red">*</span>回复内容
                    </label>
                    <div class="layui-input-inline">
                        <textarea class="layui-input" name="connent" style="height:100px;width:300px"><?php echo ($text["connent"]); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                      <input type="radio" name="enabled" value="1" title="启用" <?php echo ($text['enabled'] == 1 ? 'checked' : ''); ?>>
                      <input type="radio" name="enabled" value="0" title="禁用" <?php echo ($text['enabled'] == 0 ? 'checked' : ''); ?>>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="save" lay-submit="">
                        保存
                    </button>
                </div>
            </form>
        </div>
        <script src="/Public/templates/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/Public/templates/admin/js/x-layui.js" charset="utf-8">
        </script>
        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;


              //监听提交
              form.on('submit(save)', function(data){
                // console.log(data);
                //发异步，把数据提交给php
                $.ajax({
                    url:"/admin.php?c=Text&a=update",
                    type:'post',
                    datatype:'json',
                    data:{
                        'id':data.field.id,
                        'keywords':data.field.keywords,
                        'connent':data.field.connent,
                        'enabled':data.field.enabled,
                    },
                    success:function(res){
                        if (res.success == 1) {
                            layer.alert(res.msg, {icon: 6},function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);

                            });

                        } else {
                            layer.msg(res.msg, {icon: 2});
                        }
                    }
                });

                return false;
              });


            });
        </script>
    </body>

</html>