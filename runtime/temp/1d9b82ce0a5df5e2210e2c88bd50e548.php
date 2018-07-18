<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/webdata/eintcoin/public/../application/index/view/test/want_buy_coin.html";i:1523450009;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
单价 <input type="text" id="price" value="50"><br>
数量 <input type="text" id="number" value="10">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    var url  = '/api/order/member_buy_coin';
    var data = {
        price:$('#price').val(),
        number:Math.random()*10
    };
    $.post(url,data,function (res) {
        alert(res.code);
    },'json')
</script>
</body>
</html>