<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"/webdata/eintcoin/public/../application/index/view/info/kj_mall.html";i:1523451842;s:58:"/webdata/eintcoin/application/index/view/public/index.html";i:1523452303;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>茵特币</title>
	<link rel="stylesheet" href="/static/index/layui/css/layui.css">
	<script src="/static/index/layui/layui.js"></script>
	<script src="/static/index/layui/jquery-2.0.3.min.js"></script>
	<!-- <script src="/static/index/layer/layer.js"></script> -->
	<script type="text/javascript" src="/static/index/js/echarts.js"></script>
	<style media="screen">
		#jiaoyi {
			background-color: #999999;
			/*width: 100%;*/
			/*height: 800px;*/
		}


		/*#k{
      border-bottom: solid 1px;
    }*/

		#bord {
			/*margin-top: -900px;*/
			/*margin-right: 500px;*/
		}

		.code span {
			color: rgb(288, 94, 55);
		}

		.code .btn {
			text-align: center;
		}

		#xianjia {
			/*padding: 10px;*/
			margin-top: 10px;
			margin-left: 10px;
			margin-right: 10px;
			/*margin-bottom:-20px;*/
			background-color: #ffffff;
			height: 60px;
			line-height: 60px;
			border-radius: 5px;
		}

		#mai1 {
			/*width: 100%;*/
			height: 30px;
			line-height: 30px;
			border-radius: 10px;
			text-align: center;
			background-color: rgb(224, 38, 38);
		}

		#mai2 {
			/*width: 250px;*/
			height: 30px;
			line-height: 30px;
			border-radius: 10px;
			text-align: center;
			background-color: rgb(57, 124, 57);
		}

		#team_income_title {
			width: 100px;
			height: 30px;
			line-height: 30px;
			text-align: center;
			background-color: #ffffff;
			margin: 0 auto;
			border-radius: 5px;
		}

		#team1 {
			margin: 0 auto;
			text-align: center;
			background-color: #ffffff;
			width: 170px;
			height: auto;
			border-radius: 5px;
		}

		#team_income_content {
			margin-top: 10px;
			height: 800px;
		}

		#kf_content {
			margin-top: 10px;
			/*margin-left: 30px;*/
			text-align: center;
			/*height: 800px;*/
		}

		/*#kf_img{

        }*/

		#team1 img {
			margin-top: -20px;
		}

		#kf_img img {
			margin-top: 2px;
		}

		/*kj*/

		#my_kj_wrap {
			background-color: rgb(228, 234, 237);
			margin: 0 auto;
			text-align: center;
		}

		#kj_title {
			margin-top: -20px;
		}

		#chan {
			width: 60px;
			height: 20px;
			background-color: #ffffff;
			border-radius: 5px;
			display: inline-block;
		}

		#suan {
			width: 60px;
			height: 20px;
			background-color: #ffffff;
			border-radius: 5px;
			display: inline-block;
			margin-left: 80px;
		}

		#kj_title p {
			margin-top: 10px;
			color: rgb(237, 60, 9);
		}

		/*yun_gq*/

		#yun_gq {
			margin-top: 60px;
		}

		#yun {
			display: inline-block;
			background-color: #ffffff;
			border-radius: 5px;
			width: 100px;
			height: 20px;
			color: rgb(0, 194, 53);
		}

		#gq {
			display: inline-block;
			border-radius: 5px;
			background-color: rgb(132, 132, 132);
			width: 100px;
			height: 20px;
			color: rgb(224, 38, 38);
		}

		/*table*/

		#table_kj_gq {
			display: none;
		}

		#zc td {
			color: rgb(0, 194, 53);
		}

		#ygq td {
			color: rgb(224, 38, 38);
		}

		/*team*/

		#my_team_wrap {
			background-color: rgb(228, 234, 237);
			margin: 0 auto;
			text-align: center;
			height: 600px;
		}

		#my_team {
			width: 600px;
			height: 60px;
			line-height: 60px;
			background-color: #ffffff;
			border-radius: 8px;
			margin: 0 auto;
			margin-top: -20px;
		}

		#my_team p {
			margin-top: -40px;
		}

		#team_info {
			width: 600px;
			height: 95px;
			background-color: #ffffff;
			border-radius: 8px;
			margin: 0 auto;
			margin-top: 10px;
		}

		#my_team_info {
			margin-top: 8px;
			margin-left: -460px;
		}

		/*#my_team_qq{
          margin-left: -260px;
        }*/

		#mem_info {
			width: 600px;
			height: 110px;
			background-color: #ffffff;
			border-radius: 8px;
			margin: 0 auto;
			margin-top: 10px;
		}

		#my_mem_title {
			margin-left: -460px;
		}

		#info1 {
			margin-left: -300px;

		}

		/*pai*/

		#pai_wrap {
			background-color: rgb(228, 234, 237);
			margin: 0 auto;
			text-align: center;
			height: 600px;
		}

		#pai_title {
			width: 200px;
			height: 40px;
			margin: 0 auto;
			line-height: 40px;
			background-color: #ffffff;
			border-radius: 8px;
			font-weight: bold;
			font-size: 20px;
		}

		#pai_content {
			text-align: center;
			margin-left: 200px;
		}

		#a {
			/*display: inline-block;*/
			margin-top: -40px;
			padding-top: -20px;
			/*margin: 0 auto;
          text-align: center;*/
		}

		#b {
			/*display: inline-block;*/
			float: left;
			margin-top: -70px;
			margin-left: 76px;
		}

		#d {
			margin-top: -40px;
		}

		.radius10 {
			border-radius: 10px;
		}

		.radius15 {
			border-radius: 15px;
		}

		#jiaoyi td {
			font-size: 12px;
			color: #ED3C09;
			padding: 3px 5px;
			border-bottom-width: 3px;
			border-color: #eee;
		}
		.layui-layer-pwd{
			padding: 12px 12px 0 12px;
		}
	</style>
</head>

<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
		<div class="layui-header">
			<div class="layui-logo">用户中心</div>
			<!-- 头部区域（可配合layui已有的水平导航） -->
			<div class="layui-nav layui-layout-left" style="margin-top:20px;">
				<marquee direction="left" align="bottom" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="2" scrolldelay="1">
					<span style="font-size:20px;font-weight:bold;color:red;">
						张三以￥8元购买了100个茵特币 张三以￥8元购买了100个茵特币 张三以￥8元购买了100个茵特币
					</span>
				</marquee>
			</div>
			<ul class="layui-nav layui-layout-right">
				<li class="layui-nav-item">
					<a href="javascript:;">
						<img src="http://t.cn/RCzsdCq" class="layui-nav-img"> 贤心
					</a>
					<dl class="layui-nav-child">
						<dd>
							<a href="">基本资料</a>
						</dd>
						<dd>
							<a href="">安全设置</a>
						</dd>
					</dl>
				</li>
				<li class="layui-nav-item">
					<a href="">退出</a>
				</li>
			</ul>
		</div>
		<div class="layui-side layui-bg-black">
			<div class="layui-side-scroll">
				<!-- 左侧导航区域（可配合layui已有的垂直导航） -->
				<ul class="layui-nav layui-nav-tree" lay-filter="test">
					<li id="t1" class="layui-nav-item layui-nav-itemed">
						<a href="javascript:;">用户信息</a>
						<dl class="layui-nav-child">
							<dd id="info">
								<a href="<?php echo url('info/info'); ?>">个人信息</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/renzhengform'); ?>">实名认证</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/shoukuan'); ?>">收款方式</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/loginpw'); ?>">登录密码重置</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/jiaoyipw'); ?>">交易密码重置</a>
							</dd>
							<!--  <dd onclick="display('info/kj.html');"><a href="javascript:;">我的矿机</a></dd> -->
						</dl>
					</li>
					<li id="t2" class="layui-nav-item">
						<a href="<?php echo url('info/kj_mall'); ?>">矿机商城</a>
					</li>
					<li id="t3" class="layui-nav-item">
						<a href="<?php echo url('info/jy_center'); ?>">交易中心</a>
					</li>
					<li id="t4" class="layui-nav-item layui-nav-itemed">
						<a href="javascript:;">订单管理</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="<?php echo url('info/ordering'); ?>">执行中订单</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/order1'); ?>">购买订单</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/order2'); ?>">卖出订单</a>
							</dd>
						</dl>
					</li>
					<li class="layui-nav-item layui-nav-itemed">
						<a href="javascript:;">资金管理</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="<?php echo url('info/my_money'); ?>">我的钱包</a>
							</dd>
						</dl>
					</li>
					<!-- <li class="layui-nav-item">
                        <a href="javascript:;">资金管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('info/money'); ?>">我的钱包</a></dd>
                            <dd><a href="<?php echo url('info/in_come'); ?>">团队收益</a></dd>
                        </dl>
                    </li> -->
					<!-- <li class="layui-nav-item"><a href="<?php echo url('info/team_income'); ?>">团队收益</a></li> -->
					<!-- <li class="layui-nav-item"><a href="<?php echo url('info/my_team'); ?>">我的战队</a></li> -->

					<!-- <li class="layui-nav-item">
                        <a href="javascript:;">团队收益</a>
                        <dl class="layui-nav-child">
                            <dd><a href="<?php echo url('info/team'); ?>">推广收益</a></dd>
                            <dd><a href="<?php echo url('info/team'); ?>">团队矿机分红</a></dd>
                            <dd><a href="<?php echo url('info/invite'); ?>">团队总币量提成</a></dd>
                        </dl>
                    </li> -->
					<li id="t5" class="layui-nav-item layui-nav-itemed">
						<a href="javascript:;">团队管理</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="<?php echo url('info/my_team'); ?>">我的团队</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/team_income'); ?>">团队收益</a>
							</dd>
							<dd>
								<a href="<?php echo url('info/invite'); ?>">我的邀请码</a>
							</dd>
						</dl>
					</li>
					<li id="t6" class="layui-nav-item">
						<a href="<?php echo url('info/my_kj'); ?>">我的矿机</a>
					</li>
					<li id="t7" class="layui-nav-item">
						<a href="<?php echo url('info/pai'); ?>">排行榜</a>
					</li>
					<li id="t8" class="layui-nav-item">
						<a href="<?php echo url('info/kf_center'); ?>">客服中心</a>
					</li>
					<!-- <li class="layui-nav-item"><a href="">发布商品</a></li> -->
				</ul>
			</div>
		</div>
		<div class="layui-body">
			<!-- 内容主体区域 -->
			<div id="k">
				<div class="layui-row layui-col-space10">
					<div class="layui-col-md9">
						<!-- K线图 -->
						<section class="cta2">
							<!-- 为ECharts准备一个具备大小（宽高）的DOM -->
							<div id="needs" style="width: 100%; height: 200px;"></div>
							<!-- js代码 -->
							<script type="text/javascript" src="/static/index/js/kline2.js"></script>
							<div class="overlay"></div>
							<hr class="layui-bg-green">
						</section>
						<div style="padding: 30px 5px;" id="bord">
							
<style>
	.alone-buy {
		text-align: center;
	}

	.text-warm {
		color: #FF5722;
	}

	.layui-text {
		padding: 20px;
		max-width: 282px;
	}
	.layui-layer-btn .layui-layer-btn0{
		border-color:#FFB800;
		background-color:#FFB800;
	}
	.layui-elem-field .layui-row {
		margin: 20px 30px 10px;
	}
	.layui-bg-white{
		background-color: white;
	}
</style>

<body class="layui-layout-body">
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
		<legend>矿机商城</legend>
	</fieldset>
	<div class="layui-fluid">
	<div class="layui-row">
		<div class="layui-col-xs12">
			<fieldset class="layui-elem-field">
				<legend>一级矿机</legend>
				<div class="layui-row layui-col-space20" style="padding: 20px 10px;" id="kj1">
						<div class="layui-col-sm6 layui-col-md4 layui-col-lg4" v-for="kj in kjs1">
							<div class="layui-card">
								<div class="layui-card-body">
									<div class="layui-text">
										<img :src="kj.photo" alt="" width="150px" height="150px">
										<p>名&emsp;称：
											<span class="text-warm">{{kj.title}}</span>
										</p>
										<p>日产量：
											<span class="text-warm">{{kj.create_coin}}个币</span>
										</p>
										<p>时&emsp;间：
											<span class="text-warm">{{kj.create_time}}</span>
										</p>
										<p>描&emsp;述：
											<span class="text-warm">{{kj.remark}}</span>
										</p>
										<p>价&emsp;格：
											<span class="text-warm">￥{{kj.price}}</span>
										</p>
										<br>
									</div>
									<div class="alone-buy layui-btn-container">
										<button data-type="auto" data-id="{{kj.id}}" class="layui-btn layui-btn-warm layui-btn-radius">立即购买</button>
									</div>
								</div>
							</div>
						</div>
			
					</div>
			</fieldset>
		</div>
		<div class="layui-col-xs12">
			<fieldset class="layui-elem-field">
				<legend>二级矿机</legend>
				<div class="layui-row layui-col-space20" style="padding: 20px 10px;" id="kj2">
						<div class="layui-col-sm6 layui-col-md4 layui-col-lg4" v-for="kj in kjs2">
							<div class="layui-card">
								<div class="layui-card-body">
									<div class="layui-text">
										<img :src="kj.photo" alt="" width="150px" height="150px">
										<p>名&emsp;称：
											<span class="text-warm">{{kj.title}}</span>
										</p>
										<p>日产量：
											<span class="text-warm">{{kj.create_coin}}个币</span>
										</p>
										<p>时&emsp;间：
											<span class="text-warm">{{kj.create_time}}</span>
										</p>
										<p>描&emsp;述：
											<span class="text-warm">{{kj.remark}}</span>
										</p>
										<p>价&emsp;格：
											<span class="text-warm">￥{{kj.price}}</span>
										</p>
										<br>
									</div>
									<div class="alone-buy layui-btn-container">
										<button data-type="auto" data-id="{{kj.id}}" class="layui-btn layui-btn-warm layui-btn-radius">立即购买</button>
									</div>
								</div>
							</div>
						</div>
			
					</div>
			</fieldset>
		</div>
		<div class="layui-col-xs12">
			<fieldset class="layui-elem-field">
				<legend>三级矿机</legend>
				<div class="layui-row layui-col-space20" style="padding: 20px 10px;" id="kj3">
				</div>
			</fieldset>
		</div>
		<div class="layui-col-xs12">
			<fieldset class="layui-elem-field">
				<legend>四级矿机</legend>
				<div class="layui-row layui-col-space20" style="padding: 20px 10px;" id="kj4">
				</div>
			</fieldset>
		</div>
		<div class="layui-col-xs12">
			<fieldset class="layui-elem-field">
				<legend>五级矿机</legend>
				<div class="layui-row layui-col-space20" style="padding: 20px 10px;" id="kj5">
				</div>
			</fieldset>
		</div>
		<div class="layui-col-xs12">
			<fieldset class="layui-elem-field">
				<legend>六级矿机</legend>
				<div class="layui-row layui-col-space20" style="padding: 20px 10px;" id="kj6">
				</div>
			</fieldset>
		</div>
	</div>
</div>

	<!-- <script src="../layui/layui.js"></script> -->
	<!-- <script src="../layui/jquery-2.0.3.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<script>
		//JavaScript代码区域
		layui.use('element', function() {
			var element = layui.element;
			// alert(123123);
		});
		layui.use('layer', function(){
		//	var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
			//触发事件  
			var othis = $(this)
			var type = othis.data('type'),text = othis.text();
			$('.alone-buy .layui-btn').on('click', function(){
				layer.open({
					type: 1
					,offset: type
					,title: '交易密码'
					//,id: 'kj'+wid //防止重复弹出
					,content: '<div class="layui-layer-pwd"><input type="text" name="kj_pwd" autocomplete="off" class="layui-input"></div>'
					,scrollbar: false
					,btn: '确认'
					,btnAlign: 'c' //按钮居中
					,shade: 0 //不显示遮罩
					,yes: function(){
						console.log('点击成功');
						layer.closeAll();
					}
				});
			});
		});
		
		
		$.ajax({
			async: false,
			type: "GET",
			url: "http://www.eintcoin.com/Index/mills/index",
			data: {
				// oldPassword: document.form.oldpassword.value,
				// newPassword: document.form.password2.value
			},
			dataType: "json",
			async: false,
			success: function(data) {
				console.log(data);
				// alert(data.length);
				var kj1 = new Vue({
					el: '#kj1',
					data: {
						kjs1: data
					}
				})
				var kj2 = new Vue({
					el: '#kj2',
					data: {
						kjs2: data
					}
				})
			},
			error: function(err) {
				console.log(err);
			}
		});

		function display(url) {
			htmlobj = $.ajax({
				url: url,
				async: false
			});
			$("#bord").html(htmlobj.responseText);
		}
	</script>
</body>

						</div>
					</div>
					<div class="layui-col-md3">
						<div class="layui-bg-gray">
							<div class="" style="padding:14px">
								<div class="layui-btn layui-btn-primary">当前币价</div>
								<div class="layui-btn">￥12.8</div>
							</div>
							<div id="jiaoyi" class="layui-bg-gray">

								<marquee direction="down" align="bottom" width="100%" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="2"
								  scrolldelay="1">

									<table class="layui-table" lay-skin="line" style="font-size:12px">
										<tbody>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
											<tr>
												<td>李茂期</td>
												<td>ID: 154874</td>
												<td>卖10币/150$</td>
												<td>总计 1500$</td>
											</tr>
										</tbody>
									</table>
								</marquee>
							</div>

						</div>

					</div>
				</div>
			</div>
			
		</div>
		<div class="layui-footer">
			<!-- 底部固定区域 -->
			<!-- © layui.com - 底部固定区域 -->
		</div>
	</div>
	<script>
		//JavaScript代码区域
		layui.use('element', function () {
			var element = layui.element;
			// alert(123123);
		});
		
	</script>
	<script>

		// function xz(str){
		//   // document.getElementById(str).setAttribute("class", "abc");
		//   document.getElementById(str).setAttribute('style', 'background-color:red');
		//
		// }
	</script>
</body>

</html>