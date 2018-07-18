<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"F:\myphp_www\PHPTutorial\WWW\eintcoin\public/../application/admin\view\agent\agent.html";i:1522151384;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\header.html";i:1527512283;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\footer.html";i:1521703318;}*/ ?>
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

<link rel="stylesheet" type="text/css" href="/static/admin/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/style.css">
<style>
.file-item{float: left; position: relative; width: 110px;height: 110px; margin: 0 20px 20px 0; padding: 4px;}
.file-item .info{overflow: hidden;}
.uploader-list{width: 100%; overflow: hidden;}
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>代理设置</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <?php if(isset($agent)): ?>
                <div class="ibox-content">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">代理层级：</label>
                            <div class="input-group col-sm-4">
                                <input type="number" readonly name="level" class="form-control" placeholder="请输入数字" value="<?php echo $agent['level']; ?>">
                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">代理名称：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" readonly name="name" class="form-control"  value="<?php if(isset($agent['name'])): ?><?php echo $agent['name']; else: ?>暂未设置<?php endif; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">注册赠币(个数)：</label>
                            <div class="input-group col-sm-4">
                                <input  readonly type="text" name="register_coin" class="form-control" value="<?php if(isset($agent['register_coin'])): ?><?php echo $agent['register_coin']; else: ?>暂未设置<?php endif; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">交易赠币(%)：</label>
                            <div class="input-group col-sm-4">
                                <input  readonly type="text" name="order_coin" class="form-control" value="<?php if(isset($agent['order_coin'])): ?><?php echo $agent['order_coin']; else: ?>暂未设置<?php endif; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">购买矿机赠币(%)：</label>
                            <div class="input-group col-sm-4">
                                <input  readonly type="text" name="mills_coin" class="form-control" value="<?php if(isset($agent['mills_coin'])): ?><?php echo $agent['mills_coin']; else: ?>暂未设置<?php endif; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <a class="btn btn-primary" href="<?php echo url('edit_agent'); ?>"> 修改代理模式</a>
                            </div>
                        </div>
                </div>
                    <?php else: ?>
                    <a style="font-size: 30px;color: red;" href="<?php echo url('set_agent'); ?>">您还暂未设置代理系统，请点击我进行设置</a>
                    <?php endif; ?>
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
