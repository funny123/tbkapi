<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/webdata/eintcoin/public/../application/admin/view/authentication/check.html";i:1523276917;s:59:"/webdata/eintcoin/application/admin/view/public/header.html";i:1517888447;s:59:"/webdata/eintcoin/application/admin/view/public/footer.html";i:1521703318;}*/ ?>
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
    <script src="/static/admin/elementUI-1.4.12/js/vue.min.js"></script>
    <script src="/static/admin/elementUI-1.4.12/js/index.min.js"></script>
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
                    <h5>会员认证</h5>
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
                <div class="ibox-content">
                    <form class="form-horizontal m-t" name="edit" id="edit" method="post" action="<?php echo url('check_error'); ?>">
                        <input type="hidden" name="id" value="<?php echo $member['member_id']; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">用户ID：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" readonly class="form-control"  value="<?php echo $member['member_id']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">账号：</label>
                            <div class="input-group col-sm-4">
                                <input type="text" readonly class="form-control"  value="<?php echo $member['member_account']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">注册号码：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" readonly class="form-control" value="<?php echo $member['member_mobile']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">姓名：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" readonly class="form-control" value="<?php echo $member['name']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">身份证号：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" readonly class="form-control" value="<?php echo $member['person_id']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">银行卡号：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" readonly class="form-control" value="<?php echo $member['bank_id']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">银行预留手机号码：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" readonly class="form-control" value="<?php echo $member['bank_mobile']; ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">实名照片：</label>
                            <div class="input-group col-sm-4">
                                <img id="img_data" height="100px" style="float:left;margin-left: 50px;margin-top: -10px;"  src="/uploads/person_img/<?php echo $member['person_img']; ?>"/>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">提交时间：</label>
                            <div class="input-group col-sm-4">
                                <input  type="text" readonly class="form-control" value="<?php echo date('Y-m-d H:i:s',$member['update_time']); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">认证失败原因：</label>
                            <div class="input-group col-sm-4">
                                <textarea name="error" cols="65" placeholder="若认证失败，请在此填写失败原因（若认证失败必填，认证成功请忽略）" rows="10"></textarea>
                                <span style="color: red;font-size: 15px"><?php if(isset($message)): ?><?php echo $message; endif; ?></span>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <a class="btn btn-primary" href="<?php echo url('check_user',['id'=>$member['member_id'],'bankcardno'=>$member['bank_id'],'phone'=>$member['bank_mobile'],'name'=>123,'idcardno'=>$member['person_id']]); ?>"><i class="fa fa-check"></i> 银行信息认证</a>&nbsp;
                                <a class="btn btn-primary" href="<?php echo url('check_success',['id'=>$member['member_id']]); ?>"><i class="fa fa-check"></i> 认证通过</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger" type="submit"><i class="fa fa-close"></i> 认证失败</button>&nbsp;&nbsp;
                            </div>
                        </div>
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
