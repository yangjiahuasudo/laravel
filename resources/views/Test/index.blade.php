<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/X-admin/lib/layui/css/layui.css">
</head>
<body>
    <div id="test1" class="layui-carousel">
        <div carousel-item>
            <img src="/Index/ky_img/5.jpg">
            <img src="/Index/ky_img/5.jpg">
        </div>
    </div>
</body>
<script type="text/javascript" src="/X-admin/lib/layui/layui.js"></script>
<style type="text/css">
    #test1 img{
        width:100%;
        height:100%;
    }
</style>
<script type="text/javascript" src="/Index/js/jquery.js"></script>
<script type="text/javascript">
var ins;
layui.use(['carousel', 'form'], function () {
            var carousel = layui.carousel;
            ins = carousel.render({
                elem: '#test1'
                , width: '500px'
                , height: '200px'
                , interval: 4000
                // , arrow: 'none' //始终不显示箭头
            });
        });
$("#test1").on("touchstart", function (e) {
            var startX = e.originalEvent.targetTouches[0].pageX;//开始坐标X
            $(this).on('touchmove', function (e) {
                arguments[0].preventDefault();//阻止手机浏览器默认事件
            });
            $(this).on('touchend', function (e) {
                var endX = e.originalEvent.changedTouches[0].pageX;//结束坐标X
                e.stopPropagation();//停止DOM事件逐层往上传播
                if (endX - startX > 30) {
                    ins.slide("sub"); 
                }
                else if (startX - endX > 30) {
                    ins.slide("add"); 
                }
                $(this).off('touchmove touchend');
            });
        });
</script>
</html>