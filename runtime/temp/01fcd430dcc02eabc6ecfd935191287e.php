<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"F:\myphp_www\PHPTutorial\WWW\eintcoin\public/../application/admin\view\coupon\dumpxls.html";i:1527518829;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\header.html";i:1527512283;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\footer.html";i:1521703318;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('WEB_SITE_TITLE'); ?></title>
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/elementUI-1.4.12/css/index.min.css" rel="stylesheet">
    <link href="/static/layui/css/layui.css" rel="stylesheet">
    <script src="/static/admin/elementUI-1.4.12/js/vue.min.js"></script>
    <script src="/static/admin/elementUI-1.4.12/js/index.min.js"></script>
    <script src="/static/layui/layui.js"></script>
    <style type="text/css">
    .long-tr th{
        text-align: center
    }
    .long-td td{
        text-align: center
    }
    </style>
</head>


<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <button type="button" class="layui-btn" id="test1">
  <i class="layui-icon">&#xe67c;</i>上传文件
</button>
<button type="button" class="layui-btn" id="dump" style="display:none;">
<i class="layui-icon">&#xe67c;</i>导入中...
</button>

        <script src="/static/layui/layui.js"></script>
        <script>
            layui.use('upload', function() {
                var upload = layui.upload;

                //执行实例
                var uploadInst = upload.render({
                    elem: '#test1' //绑定元素
                        ,
                    url: '<?php echo url('doxls'); ?>' //上传接口
                    ,
                    exts: 'xls',
                    before: function(obj) { //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
                        layer.load(); //上传loading
                    },
                    done: function(res) {
                        //上传完毕回调
                        //上传完毕回调
                        layer.closeAll('loading'); //关闭loading
                        if(res.code==201){
                           document.getElementById('dump').style.display = 'block';
                        }
                    },
                    error: function() {
                        //请求异常回调
                        layer.closeAll('loading'); //关闭loading
                    }
                });
            });
        </script>
    </div>
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
<script src="/static/admin/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>
<script src="/static/admin/js/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script src="/static/admin/js/jquery.form.js"></script>
<script src="/static/admin/js/layer/layer.js"></script>
<script src="/static/admin/js/laypage/laypage.js"></script>
<script src="/static/admin/js/laytpl/laytpl.js"></script>
<script src="/static/admin/js/lunhui.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>

</html>
