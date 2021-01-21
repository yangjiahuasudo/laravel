<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <!--<meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />-->
        <link rel="stylesheet" href="/X-admin/css/font.css">
        <link rel="stylesheet" href="/X-admin/css/xadmin.css">
        <script type="text/javascript" src="/X-admin//lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/X-admin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    {{csrf_field()}}
<!--                    <div class="layui-form-item">
                        <label for="L_email" class="layui-form-label">
                            <span class="x-red">*</span>邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off" class="layui-input"></div>
                        <div class="layui-form-mid layui-word-aux">
                            <span class="x-red">*</span>将会成为您唯一的登入名</div></div>-->
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="username" required="" lay-verify="nikename" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_pass" class="layui-form-label">
                            <span class="x-red">*</span>密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_pass" name="password" required="" lay-verify="pass" autocomplete="off" class="layui-input"></div>
                        <div class="layui-form-mid layui-word-aux">6到16个字符</div></div>
                    
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>手机号</label>
                        <div class="layui-input-inline">
                            <input type="text" id="" name="phone" required="" lay-verify="nikename" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>性别</label>
                        <div class="layui-input-inline">
                            <input type="radio" name="sex" value="男" title="男" checked>
                            <input type="radio" name="sex" value="女" title="女">
                            <input type="radio" name="sex" value="中性" title="中性" disabled>    
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>地址</label>
                        <div class="layui-input-inline">
                            <input type="text" id="" name="addr" required="" lay-verify="nikename" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span>描述</label>
                        <div class="layui-input-inline">
                            <textarea name="desc" required lay-verify="required" placeholder="请输入" class="layui-textarea"></textarea>
                        </div>
                    </div>

<!--                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                            <span class="x-red">*</span>确认密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_repass" name="repass" required="" lay-verify="repass" autocomplete="off" class="layui-input"></div>
                    </div>-->
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
                </form>
            </div>
        </div>
          
<script>layui.use(['form', 'layer','jquery'],
    function() {
        $ = layui.jquery;
        var form = layui.form,
        layer = layui.layer;


        //监听提交
        form.on('submit(add)',
        function(data) {
//            console.log(data);

            var params = {
                name:data.field.username,
                password:data.field.password,
                phone:data.field.phone,
                sex:data.field.sex,
                addr:data.field.addr,
                desc:data.field.desc,
                _token:'{{csrf_token()}}'
            };
//console.log(params);
            //发异步，把数据提交给php

            $.ajax({
                url:'/admin/member-add-over',
                type:'post',
                data:params,
//                contentType: "application/json; charset=utf-8",
                traditional:true,
                dataType:'json',
                
                success:function(r){
                    if(r.code){
                        layer.alert("用户已存在",{icon:5,},
                        function() {
                            xadmin.close(); //关闭当前frame
                            xadmin.father_reload(); // 可以对父窗口进行刷新 
                        });
                    }else{
                        layer.alert("增加成功", {icon: 6},
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
                
            });


//layer.alert("增加成功", {
//    icon: 6
//},
//function() {
//    //关闭当前frame
//    xadmin.close();
//
//    // 可以对父窗口进行刷新 
//    xadmin.father_reload();
//});
            
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