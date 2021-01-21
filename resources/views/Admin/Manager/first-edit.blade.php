<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
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
<!--                    <div class="layui-form-item">
                        <label for="L_email" class="layui-form-label">
                            <span class="x-red">*</span>邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off" class="layui-input"></div>
                        <div class="layui-form-mid layui-word-aux">
                            <span class="x-red">*</span>将会成为您唯一的登入名</div></div>-->
                    <input type="hidden" name="id" value="{{ $first['0']->id }}"> 
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>第一行</label>
                        <div class="layui-input-inline" >
                            <input  type="text" id="L_username" name="first_line" value="{{ $first['0']->first_line }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input" style="width:250%"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>第二行</label>
                        <div class="layui-input-inline" >
                            <input  type="text" id="L_username" name="second_line" value="{{ $first['0']->second_line }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input" style="width:250%"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>第三行</label>
                        <div class="layui-input-inline" >
                            <input  type="text" id="L_username" name="third_line" value="{{ $first['0']->third_line }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input" style="width:250%"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>第四行</label>
                        <div class="layui-input-inline" >
                            <input  type="text" id="L_username" name="fourth_line" value="{{ $first['0']->fourth_line }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input" style="width:250%"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>第五行</label>
                        <div class="layui-input-inline" >
                            <input  type="text" id="L_username" name="fifth_line" value="{{ $first['0']->fifth_line }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input" style="width:250%"></div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">确认修改</button></div>
                </form>
            </div>
        </div>
        <script>
            
        layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
//                form.verify({
//                    nikename: function(value) {
//                        if (value.length < 5) {
//                            return '昵称至少得5个字符啊';
//                        }
//                    },
//                    pass: [/(.+){6,12}$/, '密码必须6到12位'],
//                    repass: function(value) {
//                        if ($('#L_pass').val() != $('#L_repass').val()) {
//                            return '两次密码不一致';
//                        }
//                    }
//                });

                //监听提交
                form.on('submit(add)',
                function(data) {
//                    console.log(data);
                    
                    var params = {
                        id:data.field.id,
                        first_line:data.field.first_line,
                        second_line:data.field.second_line,
                        third_line:data.field.third_line,
                        fourth_line:data.field.fourth_line,
                        fifth_line:data.field.fifth_line,
                        _token:'{{csrf_token()}}'
                    };
                    console.log(params);
                    
                    //发异步，把数据提交给php
                    $.ajax({
                        url:'/admin/manager/first-edit-over',
                        type:'post',
                        data:params,
        //                contentType: "application/json; charset=utf-8",
                        traditional:true,
                        dataType:'json',

                        success:function(r){
                            if(r.code){
                                layer.alert("修改失败，请重试", {icon: 5},
                                function() {
                                    xadmin.close();//关闭当前frame
                                    xadmin.father_reload();// 可以对父窗口进行刷新 
                                });
                            }else{
                                layer.alert("修改成功", {icon: 6},
                                function() {
                                    xadmin.close();//关闭当前frame
                                    xadmin.father_reload();// 可以对父窗口进行刷新 
                                });
                            }
                                
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

            });
        </script>
        
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>