<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"F:\myphp_www\PHPTutorial\WWW\eintcoin\public/../application/admin\view\authentication\stay.html";i:1522134378;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\header.html";i:1517888447;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\footer.html";i:1521703318;}*/ ?>
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
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>待审核会员列表</h5>
        </div>
        <div class="ibox-content">

            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="long-tr">
                                <th>ID</th>
                                <th>会员账号</th>
                                <th>会员手机号码</th>
                                <th>审核状态</th>
                                <th>提交时间</th>
                                <th width="20%">操作</th>
                            </tr>
                        </thead>
                        <tbody id="article_list">
                        <?php if(isset($members)): if(is_array($members) || $members instanceof \think\Collection || $members instanceof \think\Paginator): if( count($members)==0 ) : echo "" ;else: foreach($members as $key=>$vo): ?>
                                <tr class="long-td">
                                    <td><?php echo $vo['member_id']; ?></td>
                                    <td><?php echo $vo['member_account']; ?></td>
                                    <td><?php echo $vo['member_mobile']; ?></td>
                                    <td>
                                        <?php if($vo['status'] == 1): ?>
                                            已提交
                                        <?php elseif($vo['status'] ==2): ?>
                                            审核成功
                                        <?php elseif($vo['status'] ==0): ?>
                                            失败
                                        <?php endif; ?>   
                                    </td>
                                    <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
                                    <td>
                                        <a href="<?php echo url('check',['id'=>$vo['member_id']]); ?>" class="btn btn-primary btn-outline btn-xs">
                                            <i class="fa fa-search"></i> 认证</a>
                                        <a href="javascript:;" onclick="del_order(<?php echo $vo['id']; ?>)" class="btn btn-danger btn-outline btn-xs">
                                            <i class="fa fa-trash-o"></i> 删除</a>   
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <tr class="long-td">暂无订单数据</tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Panel Other -->
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


<script type="text/javascript">

    /**
     * [del 删除订单]
     */
    function del_order(id){
        layer.confirm('订单删除！不可恢复！谨慎操作！', {icon: 3, title:'提示'}, function(index){
            //do something
            $.getJSON('./del_order', {'id' : id}, function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{icon:1,time:1500,shade: 0.1},function(){
                        window.location.href="<?php echo url('/buy'); ?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:0,time:1500,shade: 0.1});
                }
            });

            layer.close(index);
        })

    }


</script>
</body>
</html>