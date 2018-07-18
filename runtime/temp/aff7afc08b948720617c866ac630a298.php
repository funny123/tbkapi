<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"F:\myphp_www\PHPTutorial\WWW\eintcoin\public/../application/admin\view\order\index.html";i:1522119300;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\header.html";i:1527512283;s:79:"F:\myphp_www\PHPTutorial\WWW\eintcoin\application\admin\view\public\footer.html";i:1521703318;}*/ ?>
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
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>订单列表</h5>
        </div>
        <div class="ibox-content">

            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="long-tr">
                                <th>ID</th>
                                <th>买方账号</th>
                                <th>买方联系方式</th>
                                <th>卖方账号</th>
                                <th>卖方联系方式</th>
                                <th>订单状态</th>
                                <th>订单种类</th>
                                <th width="15%">订单创建时间</th>
                                <th width="20%">操作</th>
                            </tr>
                        </thead>
                        <tbody id="article_list">
                        <?php if(isset($list)): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                                <tr class="long-td">
                                    <td><?php echo $vo['id']; ?></td>
                                    <td><?php echo $vo['buy_account']; ?></td>
                                    <td><?php echo $vo['buy_mobile']; ?></td>
                                    <td><?php echo $vo['sell_account']; ?></td>
                                    <td><?php echo $vo['sell_mobile']; ?></td>
                                    <td>
                                        <?php if($vo['status'] == 1): ?>
                                            已经提交
                                        <?php elseif($vo['status'] ==2): ?>
                                            执行中
                                        <?php elseif($vo['status'] ==3): ?>
                                            已完成
                                        <?php elseif($vo['status'] ==0): ?>
                                            订单失效
                                        <?php endif; ?>   
                                    </td>
                                    <td>
                                        <?php if($vo['type'] == 1): ?>
                                        卖单
                                        <?php elseif($vo['type'] ==2): ?>
                                        买单
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
                                    <td>
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