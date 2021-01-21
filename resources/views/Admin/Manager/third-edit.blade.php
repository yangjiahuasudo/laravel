<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/X-admin/css/font.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/X-admin/css/xadmin.css">
        <script type="text/javascript" src="/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/X-admin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--></head>
    
    <body>
<!--        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">商品管理</a>
            <a>
              <cite>全部商品</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>-->
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
                    <input type="hidden" name="id" id="idid" value="{{ $cate['0']['id'] }}"> 


                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span>图片
                        </label>
                        <div class="layui-input-inline">
                            <img id="pic_old" src="{{$cate['0']['pic']}}" style="width:100%">
                        </div>
                        <div class="layui-form-label">
                            <button type="button" class="layui-btn" id="test1"><i class="layui-icon">&#xe67c;</i>更换图片</button>
                        </div>
                        <div class="layui-input-inline">
                            <div class="layui-upload-list" id="show1"></div>
                        </div>
                    </div>
                    
                    
                        
<!--                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span></label>
                        <div class="layui-input-inline">
                                <button type="button" class="layui-btn" id="test1">
                                    <i class="layui-icon">&#xe67c;</i>更换图片
                                </button>
                        </div>
                    </div>-->
                    
<!--                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label" id="aaa" >
                            <span class="x-red">*</span>预览
                            
                        </label>
                        隐藏输入框 用来存放上传后图片路径-
                        <div class="layui-input-inline">
                            <div class="layui-upload-list" id="show"></div>
                        </div>

                    </div>-->
                    
                    
                    
<!--                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">确认修改</button></div>-->
                </form>
            </div>
        </div>

            
            
<script>
layui.use('upload', function(){
    var upload = layui.upload;
    var id = document.getElementById("idid").value;
    var pic_old = document.getElementById("pic_old").src;

    //上传图1
    var uploadInst_1 = upload.render({
        elem : '#test1', //绑定元素
        data:{pic_old:pic_old,id:id,_token:'{{csrf_token()}}'},
        url: '/admin/manager/third-upload_pic_del', //上传接口
        auto: true, //不自动上传
        before: function(obj) {
            //预读本地文件示例，不支持ie8
            obj.preview(function(index, file, result) {
                if ((file.type).indexOf("image") >= 0) {
                    $('#show1').append('<img src="' + result + '" alt="' + file.name +'" class="layui-upload-img" style="max-width:100%">')
                } else {
                    $('#show1').append(file.name)
                }
            });
        },
        done: function(r){

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


            
            $('#test1').addClass("layui-btn-disabled").attr("disabled",true);
        },
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



</body>

</html>