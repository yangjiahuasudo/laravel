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
        <script src="/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/X-admin/js/xadmin.js"></script>
        <!--<script type="text/javascript" src="/X-admin/js/jquery.mins.js"></script>-->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">商品管理</a>
            <a>
              <cite>全部商品</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
<!--                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>-->

<!--                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加用户','/admin/member-add',600,400)"><i class="layui-icon"></i>添加</button>
                        </div>-->

                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
<!--                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>-->
                                    <th>ID</th>
                                    <th>名称</th>
                                    <th>类别</th>
                                    <th>价格</th>
                                    <th>描述</th>
                                    <th>首图</th>
                                    <th style="width:100px!important">状态</th>
                                    <th>操作</th></tr>
                                </thead>
                                <tbody>
                                    @foreach($goods_details as $goods_detail)
                                  <tr>
<!--                                    <td>
                                      <input type="checkbox" name="id" value="1"   lay-skin="primary"> 
                                    </td>-->
                                    <td>{{ $goods_detail['id'] }}</td>
                                    <td>{{ $goods_detail['goods_name'] }}</td>
                                    <td>{{ $goods_detail['goods_cate'] }}</td>
                                    <td>{{ $goods_detail['goods_price'] }}</td>
                                    <td>{{ $goods_detail['goods_desc'] }}</td>
                                    <td><img src="{{ $goods_detail['goods_picture'] }}"></td>
                                    <td class="">
                                          @if($goods_detail['status'] == 0)
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">上线</span>
                                          @else
                                            <span class="layui-btn layui-btn-danger layui-btn-mini">下线</span>
                                          @endif
                                      </td>
                                    <td class="td-manage">
<!--                                      <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用">
                                        <i class="layui-icon">&#xe601;</i>
                                      </a>-->

                                      @if($goods_detail['status'] == 1)
                                        <a title="上线" onclick="goods_online(this,'{{ $goods_detail['id'] }}')" href="javascript:;">
                                            <i class="layui-icon">&#xe619;</i>
                                        </a>
                                      @else
                                        <a title="下线" onclick="goods_downline(this,'{{ $goods_detail['id'] }}')" href="javascript:;">
                                            <i class="layui-icon">&#xe61a;</i>
                                        </a>
                                      @endif
                                        <a title="编辑" id="bianji"  onclick="xadmin.open('编辑','/admin/goods-edit/{{ $goods_detail['id'] }}',900,800)" href="javascript:;">
                                          <i class="layui-icon">&#xe642;</i>
                                        </a>
                                        <a title="图片"  onclick="xadmin.open('图片','/admin/goods-pic-edit/{{ $goods_detail['id'] }}',900,600)" href="javascript:;">
                                            <i class="layui-icon">&#xe64a;</i>
                                        </a>
<!--                                      <a onclick="xadmin.open('修改密码','/admin/member-password/{{ $goods_detail['id'] }}',600,400)" title="修改密码" href="javascript:;">
                                        <i class="layui-icon">&#xe631;</i>
                                      </a>-->
<!--                                      <a title="删除" onclick="member_del(this,'{{ $goods_detail['id'] }}')" href="javascript:;">
                                        <i class="layui-icon">&#xe640;</i>
                                      </a>-->
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
<!--                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                  <a class="prev" href="">&lt;&lt;</a>
                                  <a class="num" href="">1</a>
                                  <span class="current">2</span>
                                  <a class="num" href="">3</a>
                                  <a class="num" href="">489</a>
                                  <a class="next" href="">&gt;&gt;</a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
        

        
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;


        // 监听全选
        form.on('checkbox(checkall)', function(data){

          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });


      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }
      
      /*商品上线*/
      function goods_online(obj,id){
          console.log(id);
          layer.confirm('确认要上线吗？',function(index){
              //发异步删除数据
                $.ajax({
                    url:'/admin/goods-online',
                    type:'post',
                    data:{id:id,_token:'{{csrf_token()}}'},
    //                contentType: "application/json; charset=utf-8",
                    traditional:true,
                    dataType:'json',
                    success:function(r){
                            xadmin.father_reload();
//                            $(obj).parents("tr").remove();
                            layer.msg('已上线!',{icon:1,time:1000});
                    },
                    error: function () {
                        layer.alert("网络错误,请稍后重试", {icon: 2},
                            function() {
                                xadmin.close();//关闭当前frame
                                xadmin.father_reload();// 可以对父窗口进行刷新 
                            });
                    },

                });
             
          });
      }

      /*商品下线*/
      function goods_downline(obj,id){
          console.log(id);
          layer.confirm('确认要下线吗？',function(index){
              //发异步删除数据
                $.ajax({
                    url:'/admin/goods-downline',
                    type:'post',
                    data:{id:id,_token:'{{csrf_token()}}'},
    //                contentType: "application/json; charset=utf-8",
                    traditional:true,
                    dataType:'json',
                    success:function(r){
//                            $(obj).parents("tr").remove();
                            xadmin.father_reload();
                            layer.msg('已下线!',{icon:1,time:1000});
                    },
                    error: function () {
                        layer.alert("网络错误,请稍后重试", {icon: 2},
                            function() {
                                xadmin.close();//关闭当前frame
                                xadmin.father_reload();// 可以对父窗口进行刷新 
                            });
                    },

                });
             
          });
      }



      function delAll (argument) {
        var ids = [];

        // 获取选中的id 
        $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });
  
        layer.confirm('确认要删除吗？'+ids.toString(),function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
</html>