<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/webdata/eintcoin/public/../application/index/view/test/test2.html";i:1523434369;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!--<input type="text" id="jy" value="336600">-->

<!--&lt;!&ndash;交易密码测试&ndash;&gt;-->
<!--<script>-->
    <!--console.log($('#jy').val());-->
    <!--var url  = '/Index/info/transaction_password';-->
    <!--var data = {-->
        <!--password:$('#jy').val()-->
    <!--};-->
    <!--$.post(url,data,function (res) {-->
        <!--alert(res);-->
    <!--},'json');-->
<!--</script>-->
<!--&lt;!&ndash;交易密码测试结束&ndash;&gt;-->
<script>

    // 我要卖币
     // var url = '/api/order/sell_member_coin';
     // var data = {
     //     order_id:2
     // };
     // $.post(url,data,function (res) {
     //     console.log(res.code);
     // },'json')

    // 卖家信息展示
    // var url  = '/api/order/sell_info';
    // var data = {
    //     order_id:2
    // };
    // $.post(url,data,function (res) {
    //     console.log(res);
    // },'json')

    //卖币余额查询
    var url  = '/api/order/buy_coin_balance';
    var data = {
        order_id:2
    };
    $.post(url,data,function (res) {
        console.log(res);
    },'json')
</script>
</body>
</html>