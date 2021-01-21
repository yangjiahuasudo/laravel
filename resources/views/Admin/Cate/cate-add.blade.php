<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <!--<meta name="csrf-token" content="{{ csrf_token()}}">-->
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
                <form  class="layui-form" width = 50%>
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
                            <span class="x-red">*</span>分类名称</label>
                        <div class="layui-input-inline" >
                            <input  type="text" id="L_username" name="name" required="" lay-verify="nikename" autocomplete="off" class="layui-input" style="width:50%"></div>
                    </div>
                    <div  class="layui-form-item" >
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>权重</label>
                        <div  class="layui-input-inline" >
                            <input type="radio" name="weight" value="10" title="10">
                            <input type="radio" name="weight" value="9" title="9">
                            <input type="radio" name="weight" value="8" title="8">
                            <input type="radio" name="weight" value="7" title="7">
                            <input type="radio" name="weight" value="6" title="6">
                            <input type="radio" name="weight" value="5" title="5">
                            <input type="radio" name="weight" value="4" title="4">
                            <input type="radio" name="weight" value="3" title="3">
                            <input type="radio" name="weight" value="2" title="2">
                            <input type="radio" name="weight" value="1" title="1(默认)" checked>
                    </div>                   
                    </div>
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
                name:data.field.name,
                weight:data.field.weight,
                _token:'{{csrf_token()}}'
            };
            //发异步，把数据提交给php

            $.ajax({
                url:'/admin/cate-add-over',
                type:'post',
                data:params,
//                contentType: "application/json; charset=utf-8",
                traditional:true,
                dataType:'json',
                
                success:function(r){
                    if(r.code){
                        layer.alert("添加失败，请重试",{icon:5,},
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