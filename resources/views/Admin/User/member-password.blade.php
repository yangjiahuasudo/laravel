<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <!--<meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />-->
        <link rel="stylesheet" href="/X-admin/css/font.css">
        <link rel="stylesheet" href="/X-admin/css/xadmin.css">
        <script type="text/javascript" src="/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/X-admin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--></head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    <input type="hidden" name="id" value="{{ $user['0']->id }}"> 
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">昵称</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="name" disabled="" value="{{ $user['0']->name }}" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                            <span class="x-red">*</span>旧密码</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_repass" name="oldpass" disabled="" value="{{ $user['0']->password }}" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_pass" class="layui-form-label">
                            <span class="x-red">*</span>新密码</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_pass" name="newpass" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                        <div class="layui-form-mid layui-word-aux">6到16个字符</div></div>
<!--                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                            <span class="x-red">*</span>确认密码</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_repass" name="repass" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>-->
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="save" lay-submit="">确认</button></div>
                </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //监听提交
                form.on('submit(save)',
                function(data) {
                    var params = {
                        id:data.field.id,
                        password:data.field.newpass,
                        '_token':'{{csrf_token()}}'
                    };
                    //发异步，把数据提交给php
                    $.ajax({
                        url:'/admin/member-password-over',
                        type:'post',
                        data:params,
        //                contentType: "application/json; charset=utf-8",
                        traditional:true,
                        dataType:'json',
                        success:function(r){
                                layer.alert("修改成功", {icon: 6},
                                function() {
                                    xadmin.close();//关闭当前frame
                                    xadmin.father_reload();// 可以对父窗口进行刷新 
                                });
                        },
                        error: function () {
                            layer.alert("网络错误,请稍后重试", {icon: 2},
                                function() {
                                    xadmin.close();//关闭当前frame
                                    xadmin.father_reload();// 可以对父窗口进行刷新 
                                });
                        },

                    }),
                    function() {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        parent.layer.close(index);
                    };
                    return false;
                });

            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>