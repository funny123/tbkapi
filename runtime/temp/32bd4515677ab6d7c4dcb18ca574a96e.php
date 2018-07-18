<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/webdata/eintcoin/public/../application/index/view/login/login.html";i:1523404366;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="renderer" content="webkit">

    <meta name="author" content="FastAdmin">

    <link rel="shortcut icon" href="/intcoin/public/assets/img/favicon.ico" />
    <!-- Loading Bootstrap -->
    <link href="/static/index/css/frontend.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
  <script src="/intcoin/public/assets/js/html5shiv.js"></script>
  <script src="/intcoin/public/assets/js/respond.min.js"></script>
<![endif]-->
    <script src="/static/index/layui/jquery-2.0.3.min.js"></script>
    <link href="/static/index/css/user.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="/intcoin/public/" style="padding:6px 15px;"><img src="/static/index/assets/img/logo.png" style="height:40px;" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" target="_blank">首页</a></li>
                    <li><a href="needs.html" target="_blank">需求大厅</a></li>
                    <li><a href="sale.html" target="_blank">售币大厅</a></li>
                    <li class="dropdown">
                        <a href="person.html" class="dropdown-toggle" data-toggle="dropdown">会员中心 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="login.html"><i class="fa fa-sign-in"></i> 登 录</a></li>
                            <li><a href="register.html"><i class="fa fa-user-o"></i> 注 册</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="content">
        <div id="content-container" class="container">
            <div class="user-section login-section">
                <div class="logon-tab clearfix"> <a class="active">登 录</a> <a href="register.html">注 册</a> </div>
                <div class="login-main">
                    <form name="form1" id="login-form" class="form-vertical" method="POST" action="">
                        <div class="form-group">
                            <label class="control-label" for="account">手机号码</label>
                            <div class="controls">
                                <input class="form-control input-lg" id="mobile" type="text" name="mobile" value="" data-rule="required" placeholder="手机号" autocomplete="off">
                                <div class="help-block"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">密码</label>
                            <div class="controls">
                                <input class="form-control input-lg" id="password" type="password" name="password" data-rule="required;password" placeholder="密码" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <input type="checkbox" name="keeplogin" checked="checked" value="1"> 保持会话
                                <div class="pull-right"><a href="javascript:;" class="btn-forgot">忘记密码?</a></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="myCheck();">登 录</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/html" id="resetpwdtpl">
            <form id="resetpwd-form" class="form-horizontal form-layer" method="POST" action="">
                <div class="form-body">
                    <input type="hidden" name="action" value="resetpwd" />
                    <div class="form-group">
                        <label for="" class="control-label col-xs-12 col-sm-3">类型:</label>
                        <div class="col-xs-12 col-sm-8">
                            <div class="radio">
                                <label for="type-email"><input id="type-email" checked="checked" name="type" data-send-url="/intcoin/public/api/ems/send.html" data-check-url="/intcoin/public/api/validate/check_ems_correct.html" type="radio" value="email"> 通过邮箱</label>
                                <label for="type-mobile"><input id="type-mobile" name="type" type="radio" data-send-url="/intcoin/public/api/sms/send.html" data-check-url="/intcoin/public/api/validate/check_sms_correct.html" value="mobile"> 通过手机重置</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-type="email">
                        <label for="email" class="control-label col-xs-12 col-sm-3">邮箱:</label>
                        <div class="col-xs-12 col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="" data-rule="required(#type-email:checked);email;remote(/intcoin/public/api/validate/check_email_exist.html, event=resetpwd, id=)" placeholder="">
                            <span class="msg-box"></span>
                        </div>
                    </div>
                    <div class="form-group hide" data-type="mobile">
                        <label for="mobile" class="control-label col-xs-12 col-sm-3">手机号:</label>
                        <div class="col-xs-12 col-sm-8">
                            <input type="text" class="form-control" id="mobile" name="mobile" value="" data-rule="required(#type-mobile:checked);mobile;remote(/intcoin/public/api/validate/check_mobile_exist.html, event=resetpwd, id=)" placeholder="">
                            <span class="msg-box"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="captcha" class="control-label col-xs-12 col-sm-3">验证码:</label>
                        <div class="col-xs-12 col-sm-8">
                            <div class="input-group">
                                <input type="text" name="captcha" class="form-control" data-rule="required;length(4);integer[+];remote(/intcoin/public/api/validate/check_ems_correct.html, event=resetpwd, email:#email)" />
                                <span class="input-group-btn" style="padding:0;border:none;">
                            <a href="javascript:;" class="btn btn-info btn-captcha" data-url="/intcoin/public/api/ems/send.html" data-type="email" data-event="resetpwd">发送验证码</a>
                        </span>
                            </div>
                            <span class="msg-box"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newpassword" class="control-label col-xs-12 col-sm-3">新密码:</label>
                        <div class="col-xs-12 col-sm-8">
                            <input type="password" class="form-control" id="newpassword" name="newpassword" value="" data-rule="required;password" placeholder="">
                            <span class="msg-box"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group form-footer">
                    <label class="control-label col-xs-12 col-sm-3"></label>
                    <div class="col-xs-12 col-sm-8">
                        <button type="button" class="btn btn-md btn-info">确定</button>
                    </div>
                </div>
            </form>
        </script>
    </main>

    <footer class="footer" style="clear:both">
        <p class="copyright">Copyright&nbsp;©&nbsp;2017-2018 All Rights Reserved
            <a href="#" target="_blank"></a>
        </p>
    </footer>

    <script src="/static/index/js/require.js" data-main="js/require-frontend.js"></script>
<script>
function myCheck() {
  // window.location.href = "http://www.eintcoin.com/index/user/index";
    for (var i = 0; i < document.form1.elements.length - 1; i++) {
        if (document.form1.elements[i].value == "") {
            alert("当前表单不能有空项");
            document.form1.elements[i].focus();
            return false;
        }
    }
    $.ajax({
        async: false,
        type: "POST",
        url: "http://www.eintcoin.com/Index/login/login",
        data: {
            mobile:document.form1.mobile.value,
            password:document.form1.password.value
        },
        dataType: "json",
        async: false,
        success: function(data) {
            console.log(data);
          if(data==4){
            alert("帐号被禁用");
            return false;
          }else if (data==3) {
            alert("帐号不存在");
            return false;
          }else if (data==2) {
            alert("用户名或密码错误");
            return false;
          }else if(data==1){
            // console.log(data);
            alert("登录成功");
            window.location.href = "http://www.eintcoin.com/index/user/index";
            // settime();
          }


        },
        error: function(err) {
            // console.log(err);
        }
    });
    // return true;

}
</script>
</body>

</html>
