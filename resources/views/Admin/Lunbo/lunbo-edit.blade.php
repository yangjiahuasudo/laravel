<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />-->
        <link rel="stylesheet" href="/X-admin/css/font.css">
        <link rel="stylesheet" href="/X-admin/css/xadmin.css">
        <script type="text/javascript" src="/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/X-admin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
<!--        <div class="">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">商品管理</a>
            <a>
              <cite>添加商品</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>-->
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    
                    <input type="hidden" name="id" value="{{ $lunbo['0']['id'] }}"> 
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>名称</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="name" value="{{$lunbo['0']['name']}}" required="" lay-verify="nikename" autocomplete="off" class="layui-input"></div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>描述</label>
                        <div class="layui-input-inline">
                           <textarea name="desc"  required lay-verify="required" placeholder="请输入商品描述。。。" class="layui-textarea">{{$lunbo['0']['desc']}}</textarea>
                    </div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span>图片</label>
                        <div class="layui-input-inline">
                            <img id="pic_old" src="{{$lunbo['0']['pic']}}" style="width:90%">
                    </div>
                    </div>
                        
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span></label>
                        <div class="layui-input-inline">
                            <button type="button" class="layui-btn" id="test1">
                                <i class="layui-icon">&#xe67c;</i>更换图片
                              </button>
                        </div>

                    </div>
                    
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label" id="aaa" >
                            <span class="x-red">*</span>预览
                            
                        </label>
                        <!--隐藏输入框 用来存放上传后图片路径--->
                         
                        <div class="layui-input-inline">
                            <div class="layui-upload-list" id="show"></div>
                        </div>

                    </div>
                    <!--隐藏输入框 用来存放上传后图片路径--->
                    <!--<input id="credential_hide" name="credentialOne" type="hidden" lay-verify="credentialOne" autocomplete="off" class="layui-input">-->
                    <input id="credential_hide"  type="hidden" >

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn layui-btn-danger" lay-filter="add" lay-submit="">确认修改</button></div>
                </form>
            </div>
        </div>
          
<!--<script src="/static/build/layui.js"></script>-->
<script>
layui.use('upload', function(){
  var upload = layui.upload;
var pic_old = document.getElementById("pic_old").src;
//   console.log(pic_old);

   
  //执行实例
  var uploadInst = upload.render({
      
    elem : '#test1', //绑定元素
//    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},//若没有排除post上传图片的令牌验证，就需要将此处取消注释
    multiple : false,//多文件
    
    data:{pic_old:pic_old,'_token':"{{ csrf_token() }}"},
    url: '/admin/lunbo/picture/upload_del', //上传接口

    before: function(obj) {
        //预读本地文件示例，不支持ie8
        obj.preview(function(index, file, result) {
            if ((file.type).indexOf("image") >= 0) {
                $('#show').append('<img src="' + result + '" alt="' + file.name +'" class="layui-upload-img" style="max-width:100%">')
            } else {
                $('#show').append(file.name)

            }
        });
    },

    done: function(r){
        if(r.code===1){
            layer.alert("图片更换失败",{icon:5},
            function() {location.reload();}
//            function() {
//                xadmin.close(); //关闭当前frame
//                xadmin.father_reload(); // 可以对父窗口进行刷新 
//            }
            );
        }else{
            layer.alert("图片更换成功", {icon: 6},
//            function() {
//                xadmin.close();//关闭当前frame
//                xadmin.father_reload();// 可以对父窗口进行刷新 
//            }
            );
        }
        $('#test1').addClass("layui-btn-disabled").attr("disabled",true);
        
        //上传成功后才显示图片，太慢了，没有用户体验,所以注释掉
        //$('#show').append('<img src=http://106.13.224.218/storage/' + r.msg + ' alt=' + r.msg +'" class="layui-upload-img" style="max-width:100%">')
       $("#show").append('<input type="hidden" name="imgs" value="'+ r.msg +'">');
        
//        console.log(r);
//        layer.msg(r.msg,{time:'5000',tipsMore: true,zIndex:'2'}); 
    },
//    allDone: function(obj) { //当文件全部被提交后，才触发
//console.log(obj);
//        if(obj.total ==obj.successful){
//            layer.msg('图片上传成功', {icon: 6,time:1000 }); 
//        }else{
//            layer.msg('部分图片上传失败', {icon: 5,time:4000 }); 
//        }
////        console.log(obj.total); //得到总文件数
////        console.log(obj.successful); //请求成功的文件数
////        console.log(obj.aborted); //请求失败的文件数
//
//    },
    error: function(r){
      layer.alert("网络错误,请稍后重试", {icon: 2},
                                function() {
                                    xadmin.close();//关闭当前frame
                                    xadmin.father_reload();// 可以对父窗口进行刷新 
                                });
    }
  });
});
</script>
        
        
<script>layui.use(['form', 'layer','jquery'],
    function() {
        $ = layui.jquery;
        var form = layui.form,
        layer = layui.layer;


        //监听提交
        form.on('submit(add)',
        function(data) {
            

            var params = {
                id:data.field.id,
                name:data.field.name,
                desc:data.field.desc,
                pic:data.field.imgs,
                _token:'{{csrf_token()}}'
            };
            params = JSON.stringify(params);
//console.log(params);
            //发异步，把数据提交给php

            $.ajax({ 
                url:'/admin/lunbo-edit-over',
                type:'post',
                data:params,
                contentType: "application/json; charset=utf-8",
                traditional:true,
                dataType:'json',
                
                success:function(r){
                    if(r.code===1){
                        layer.alert("添加失败",{icon:5},
                        function() {
                            xadmin.close(); //关闭当前frame
                            xadmin.father_reload(); // 可以对父窗口进行刷新 
                        });
                    }else{
                        layer.alert("添加成功", {icon: 6},
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