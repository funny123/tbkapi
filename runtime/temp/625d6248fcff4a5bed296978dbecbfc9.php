<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/webdata/eintcoin/public/../application/index/view/login/register.html";i:1523414048;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="renderer" content="webkit">

    <meta name="author" content="FastAdmin">

    <link rel="shortcut icon" href="/intcoin/public/assets/img/favicon.ico" />
    <!-- Loading Bootstrap -->
    <link href="/static/index/css/frontend.css" rel="stylesheet">
    <script src="/static/index/js/jquery.min.js" data-main="js/jquery.min.js"></script>
    <script src="/static/index/layui/jquery-2.0.3.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
  <script src="/intcoin/public/assets/js/html5shiv.js"></script>
  <script src="/intcoin/public/assets/js/respond.min.js"></script>
<![endif]-->
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
                <a class="navbar-brand" href="/intcoin/public/" style="padding:6px 15px;"><img src="/assets/img/logo.png" style="height:40px;" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" target="_blank">首页</a></li>
                    <li><a href="needs.html" target="_blank">需求大厅</a></li>
                    <li><a href="sale.html" target="_blank">售币大厅</a></li>
                    <li class="dropdown">
                        <a href="/intcoin/public/index/user/index.html" class="dropdown-toggle" data-toggle="dropdown">会员中心 <b class="caret"></b></a>
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
                <div class="logon-tab clearfix"> <a href="login.html">登 录</a> <a class="active">注 册</a> </div>
                <div class="login-main">
                    <form name="form1" id="register-form" class="form-vertical" method="POST" action="">
                        <input type="hidden" name="invite_user_id" value="0" />
                        <div class="form-group">
                            <label class="control-label">用户名</label>
                            <div class="controls">
                                <input type="text" onblur="check();" id="account" name="account" data-rule="required;username" class="form-control input-lg" placeholder="用户名必须3-30个字符">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label required">上级编号<span class="text-success"></span></label>
                            <div class="controls">
                                <input type="text" name="parent_id" id="parent_id" data-rule="required;invite" class="form-control input-lg" placeholder="上级编号">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">手机号</label>
                            <div class="controls">
                                <input type="text" id="mobile" onblur="check();" name="mobile" data-rule="required;mobile" class="form-control input-lg" placeholder="手机号">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">验证码</label>
                            <div class="controls">
                                <div class="input-group input-group-lg">
                                    <input type="text" name="captcha" class="form-control" placeholder="验证码" data-rule="required;length(6)" style="border-radius: 0;" />
                                    <span class="input-group-addon" style="padding:0;border:none;">
                                   <input class="btn btn-primary btn-lg generate_code" type="button" id="btn" value="免费获取验证码"/>
                            </span>
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <!-- 21 -->
                        <!-- <input type="number" class="code" name="verify" placeholder="请输入手机验证码" required maxlength="6"> -->
                        <!-- <input type="button" class="generate_code" value=" 获取验证码"> -->
                        <!-- 121 -->
                        <div class="form-group">
                            <label class="control-label">密码</label>
                            <div class="controls">
                                <input type="password" id="password1" name="password1" data-rule="required;password" class="form-control input-lg" placeholder="密码必须6-30个字符">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">确认密码</label>
                            <div class="controls">
                                <input type="password" id="password2" name="password2" data-rule="required;password" class="form-control input-lg" placeholder="密码必须6-30个字符">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="myCheck();">注 册</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer" style="clear:both">
        <p class="copyright">Copyright&nbsp;©&nbsp;2017-2018 All Rights Reserved 版权所有
            <a href="#" target="_blank"></a>
        </p>
    </footer>

    <script src="/static/index/js/require.js" data-main="js/require-frontend.js"></script>
    <script src="/static/index/js/jquery.min.js" data-main="js/jquery.min.js"></script>
    <script>
        function sentsms() {
            $.ajax({
                async: false,
                type: "GET",
                url: "http://www.eintcoin.com/api/sendSMS/register",
                data: {
                    mobile: document.form1.mobile.value
                },
                dataType: "json",
                async: false,
                success: function(data) {
                    console.log(data);
                    // settime();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        var countdown = 60;

        // function settime(val) {
        //     if (countdown == 0) {
        //         val.removeAttribute("disabled");
        //         val.value = "获取验证码";
        //         countdown = 60;
        //         return false;
        //     } else {
        //         val.setAttribute("disabled", true);
        //         val.value = "重新发送(" + countdown + ")";
        //         countdown--;
        //     }
        //     setTimeout(function() {
        //         settime(val)
        //     }, 1000)
        // }

        // function check() {
        //     // alert(document.form1.mobile.value);
        //     if (document.form1.mobile.value == "" || document.form1.mobile.value.length != 11) {
        //         alert("请填写正确的手机号！");
        //         document.form1.mobile.focus();
        //         // return false;
        //     }
        // }

        function myCheck() {
            for (var i = 0; i < document.form1.elements.length - 1; i++) {
                if (document.form1.elements[i].value == "") {
                    alert("当前表单不能有空项");
                    document.form1.elements[i].focus();
                    return false;
                }
            }
            if(document.form1.password1.value!=document.form1.password2.value){
              alert("2次输入密码不一致！");
              document.form1.password2.focus();
              return false;
            }
            $.ajax({
                async: false,
                type: "POST",
                url: "http://www.eintcoin.com/Index/login/register",
                data: {
                    account:document.form1.account.value,
                    parent_id:document.form1.parent_id.value,
                    password:document.form1.password1.value,
                    mobile: document.form1.mobile.value
                },
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data);
                    alert("注册成功");
                    window.location.href = "http://www.eintcoin.com/index/login/login";
                    // settime();
                },
                error: function(err) {
                    console.log(err);
                }
            });
            // return true;

        }
    </script>
    <script type="text/javascript">
        $(function() {
            $(".generate_code").click(function() {
              // alert("发送成功");
                // var disabled = $(".generate_code").attr("disabled");
                // if (disabled) {
                //     return false;
                // }
                if ($("#mobile").val() == "" || isNaN($("#mobile").val()) || $("#mobile").val().length != 11) {
                    alert("请填写正确的手机号！");
                    return false;
                }
                $.ajax({
                    async: false,
                    type: "GET",
                    url: "http://www.eintcoin.com/api/sendSMS/register",
                    data: {
                        mobile: document.form1.mobile.value
                    },
                    dataType: "json",
                    async: false,
                    success: function(data) {
                        alert("验证码发送成功");
                        settime();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
            var countdown = 60;
            var _generate_code = $(".generate_code");

            function settime() {
                if (countdown == 0) {
                    _generate_code.attr("disabled", false);
                    _generate_code.val("获取验证码");
                    countdown = 60;
                    return false;
                } else {
                    $(".generate_code").attr("disabled", true);
                    _generate_code.val("重新发送(" + countdown + ")");
                    countdown--;
                }
                setTimeout(function() {
                    settime();
                }, 1000);
            }
        })
    </script>
</body>

</html>
