<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"F:\myphp_www\PHPTutorial\WWW\eintcoin\public/../application/admin\view\money\adjustment.html";i:1522376902;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\header.html";i:1527512283;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\footer.html";i:1521703318;}*/ ?>
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
<div class="wrapper wrapper-content">

    <!-- 上方tab -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="ibox float-e-margins" style="text-align: center">
                <div class="ibox-title">
                    <h2 >当前币价</h2>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" style="font-size: 100px"><?php echo $moneyData['price']; ?></h1>
                    <small style="font-size: 20px;text-align: left;">最后更新时间：<?php echo $moneyData['update_time']; ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
            <div class="ibox float-e-margins" style="text-align: center">
                <div class="ibox-title">
                    <h2 >币值调整</h2>
                </div>

                <div class="ibox-content">
                    <!--工具条-->
                    <form action="<?php echo url('add'); ?>" class="" method="post">
                        增加币值：<input type="text"  name="add" value=""><br><br>
                        增加幅度：<input type="text"  name="add_range" value=""><br><br>
                        <input type="submit" class="btn-primary" value="增加币值">
                    </form>
                </div>
                <div class="ibox-content">
                    <!--工具条-->
                    <form action="<?php echo url('reduce'); ?>" class="" method="post">
                        减少币值：<input type="number" min="0" name="reduce" value=""><br><br>
                        减少幅度：<input type="number" min="0" name="reduce_range" value=""><br><br>
                        <input type="submit" class="btn-danger" value="减少币值">
                    </form>
                </div>
            </div>
        </div>
    </div>
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