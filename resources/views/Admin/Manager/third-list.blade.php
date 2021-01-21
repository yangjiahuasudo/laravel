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
                        <!--<div class="layui-card-header">-->
                            <!--<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>-->
                            <!--<button class="layui-btn" onclick="xadmin.open('添加类别','/admin/cate-add',450,330)"><i class="layui-icon"></i>添加类别</button>-->
                        <!--</div>-->
                        <blockquote class="layui-elem-quote">* 权重从10到1， 10最大， 1最小， 相同随机排序 *   &nbsp;&nbsp;&nbsp;  ( 默认 ' 其他 ' , 权重为-1)</blockquote>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
<!--                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>-->
                                    <th>分类名</th>
                                    <th>权重</th>
                                    <th>图片</th>
                                    <th>操作</th></tr>
                                </thead>
                                <tbody>
                                    @foreach($cates as $cate)
                                  <tr>
<!--                                    <td>
                                      <input type="checkbox" name="id" value="1"   lay-skin="primary"> 
                                    </td>
                                    <td></td>-->
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->weight }}</td>
                                    <td><img src="{{ $cate->pic }}"></td>
                                    
                                    <td class="td-manage">
<!--                                      <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用">
                                        <i class="layui-icon">&#xe601;</i>
                                      </a>-->
                                      <a title="编辑" id="bianji" class="layui-btn"  onclick="xadmin.open('编辑','/admin/manager/third-edit/{{ $cate->id }}',900,400)" href="javascript:;">
                                        <i class="layui-icon">修改图片</i>
                                      </a>
                                      
<!--                                      <a class="layui-btn layui-btn-normal" onclick="xadmin.open('权重','/admin/cate-weight/{{ $cate->id }}',450,220)" title="修改权重" href="javascript:;">
                                        <i class="layui-icon">权重</i>
                                      </a>-->
<!--                                      <a class="layui-btn layui-btn-danger" title="删除" onclick="member_del(this,'{{ $cate->id }}')" href="javascript:;">
                                        <i class="layui-icon">删除</i>
                                      </a>-->
                                    </td>
                                  </tr>
                                  @endforeach
                                  
                                  <tr>
<!--                                    <td>
                                      <input type="checkbox" name="id" value="1"   lay-skin="primary"> 
                                    </td>
                                    <td></td>-->
<!--                                    <td>其他</td>
                                    <td>-1</td>
                                    <td></td>-->
                                    
                                    <!--<td class="td-manage">-->

                                   
                                    <!--</td>-->
                                  <!--</tr>-->
                                  
                                  
                                  
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

      /*用户-删除*/
      function member_del(obj,id){
          console.log(id);
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
                $.ajax({
                    url:'/admin/cate-del',
                    type:'post',
                    data:{id:id,_token:'{{csrf_token()}}'},
    //                contentType: "application/json; charset=utf-8",
                    traditional:true,
                    dataType:'json',
                    success:function(r){
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!',{icon:1,time:1000});
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