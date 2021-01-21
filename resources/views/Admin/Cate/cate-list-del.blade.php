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
    <![endif]-->
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
    </div>
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
<!--                    <div class="layui-card-body ">
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
<!--                    <div class="layui-card-header">
                        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量恢复</button>
                    </div>-->
                    <div class="layui-card-body ">
                        <table class="layui-table layui-form">
                          <thead>
                            <tr>
<!--                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>-->
                                    <th>分类名</th>
                                    <th>权重</th>
                                    <th>操作</th></tr>
                          </thead>
                          <tbody>
                              @foreach($cates as $cate)
                            <tr>
<!--                                <td>
                                    <input type="checkbox" name=""  lay-skin="primary"> 
                                </td>
                                 <td>{{ $cate->id }}</td>-->
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->weight }}</td>
                              <td class="td-manage">
                                <a class="layui-btn" title="恢复" onclick="member_reset(this,'{{ $cate->id }}')" href="javascript:;">
                                  <i class="layui-icon">恢复</i>
                                </a>
                                <a class="layui-btn layui-btn-disabled" class="layui-btn layui-btn-danger" title="彻底删除" onclick="//member_del(this,'{{ $cate->id }}')" href="javascript:;">
                                  <i class="layui-icon">彻底删除</i>
                                </a>
                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                    </div>
<!--                    <div class="layui-card-body ">
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
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      /*用户-恢复*/
      function member_reset(obj,id){
          layer.confirm('确认要恢复吗？',function(index){
                //发异步删除数据
                $.ajax({
                    url:'/admin/cate-list-del-reset',
                    type:'post',
                    data:{id:id,_token:'{{csrf_token()}}'},
    //                contentType: "application/json; charset=utf-8",
                    traditional:true,
                    dataType:'json',
                    success:function(r){
                            $(obj).parents("tr").remove();
                            layer.msg('已恢复!',{icon:1,time:1000});
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

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要恢复吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('恢复成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>