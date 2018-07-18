<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"/webdata/eintcoin/public/../application/index/view/info/my_kj.html";i:1523193406;s:58:"/webdata/eintcoin/application/index/view/public/index.html";i:1523452303;}*/ ?>
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
							

<body class="layui-layout-body">
	<style>
		
		.layui-table thead tr {
			background-color: white;
		}

		.layui-btn-green {
			background-color: white;
			color: green;
		}

		.layui-btn-green:hover {
			color: green;
		}

		.layui-btn-danger {
			background-color: white;
			color: red;
		}

		.layui-btn-danger:hover {
			color: red;
		}
		.code h1{
			font-size: 36px;
		}
	</style>
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
		<legend>我的矿机</legend>
	</fieldset>
	<div class="layui-fluid">
		<div class=" layui-bg-gray">
			<div class="layui-row" style="padding: 15px 30px">
				<div class="layui-col-md3 layui-col-md-offset2">
					<div class="layui-card radius10">
						<div class="layui-card-header" style="text-align: center;">
							产量总计
						</div>
					</div>
						<div class="layui-card-body layui-bg-gray" style="text-align: center;">
							<div class="code">
								<h1>
									<span>100</span>
								</h1>
							</div>
						</div>
				</div>
				<div class="layui-col-md3 layui-col-md-offset2">
					<div class="layui-card  radius10">
						<div class="layui-card-header" style="text-align: center;">
							算力总计
						</div>
					</div>
						<div class="layui-card-body layui-bg-gray" style="text-align: center;">
							<div class="code">
								<h1>
									<span>10</span>
								</h1>
							</div>
					</div>
				</div>
			</div>
			<div class="layui-row" style="padding: 15px 30px;text-align:center;">
				<div id="yun2" class="layui-btn layui-btn-green" onclick="yun();">运行中的矿机</div>
				<div id="gq2" class="layui-btn layui-btn-danger" onclick="gq();" style="background-color: #ccc;">已过期矿机</div>
			</div>
			<div class="layui-row" style="padding: 0 30px 15px 30px">
				<div class="layui-col-md12">
					<div id="table_kj_yun">
						<table class="layui-table" lay-skin="line">
							<thead>
								<tr>
									<th>状态</th>
									<th>机号</th>
									<th>类型</th>
									<th>起购日期</th>
									<th>剩余天数</th>
									<th>当日算力</th>
									<th>当日产量</th>
									<th>下次领取</th>
								</tr>
							</thead>
							<tbody id="zc">
								<tr>
									<td>正常</td>
									<td>Gt105</td>
									<td>体验</td>
									<td>2018-04-03</td>
									<td>16天5小时6分</td>
									<td>0.1</td>
									<td>0.1</td>
									<td>2018-11-29</td>
								</tr>
								<tr>
									<td>正常</td>
									<td>Gt105</td>
									<td>体验</td>
									<td>2018-04-03</td>
									<td>16天5小时6分</td>
									<td>0.1</td>
									<td>0.1</td>
									<td>2018-11-29</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div id="table_kj_gq">
						<table class="layui-table" lay-skin="line">
							<thead>
								<tr>
									<th>状态</th>
									<th>机号</th>
									<th>类型</th>
									<th>起购日期</th>
									<th>剩余天数</th>
									<th>当日算力</th>
									<th>当日产量</th>
									<th>下次领取</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>已过期</td>
									<td>Gt105</td>
									<td>体验</td>
									<td>2018-04-03</td>
									<td>16天5小时6分</td>
									<td>0.1</td>
									<td>0.1</td>
									<td>2018-11-29</td>
								</tr>
								<tr>
									<td>已过期</td>
									<td>Gt105</td>
									<td>体验</td>
									<td>2018-04-03</td>
									<td>16天5小时6分</td>
									<td>0.1</td>
									<td>0.1</td>
									<td>2018-11-29</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../layui/layui.js"></script>
	<script src="../layui/jquery-2.0.3.min.js"></script>
	<script>
		//JavaScript代码区域
		layui.use('element', function () {
			var element = layui.element;
			// alert(123123);
		});

		function display(url) {
			htmlobj = $.ajax({
				url: url,
				async: false
			});
			$("#bord").html(htmlobj.responseText);
		}
	</script>
	<script>
		function yun() {
			document.getElementById("table_kj_gq").style.display = "none";
			document.getElementById("table_kj_yun").style.display = "block";
			document.getElementById("yun2").style.backgroundColor = "#fff";
			document.getElementById("gq2").style.backgroundColor = "#ccc";
		}

		function gq() {
			document.getElementById("table_kj_gq").style.display = "block";
			document.getElementById("table_kj_yun").style.display = "none";
			document.getElementById("gq2").style.backgroundColor = "#fff";
			document.getElementById("yun2").style.backgroundColor = "#ccc";
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