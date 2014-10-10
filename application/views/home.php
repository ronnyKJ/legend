<?php $base_url = $this->config->item('base_url');?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图表模板</title>
    <link rel="stylesheet" href="<?=$base_url?>public/css/home.css">
</head>

<body>

	<ul class="top-bar fix">
		<li class="first-block"></li>
		<li class="second-block"></li>
		<li class="third-block"></li>
		<li class="forth-block"></li>
		<li class="fifth-block"></li>
		<li class="sixth-block"></li>
	</ul>


	<?php if(isset($_SESSION['uid'])){?>
	<div id="user" class="login-signup">
		<span class="my-charts" data-uid="<?=$_SESSION['uid']?>"><?=$_SESSION['username']?></span>
    	<span class="chart-numbers">13</span>
	</div>
	<?}else{?>
	<div id="login" class="login-signup">
		<span class="login">登录</span>
    	<span class="sign-up">注册</span>
	</div>
	<?php }?>


	<div class="grid">
		<h1 class="title">可视化工具图表模板</h1>
		<h2 class="sub-title">
			<span class="st1">爱国</span>
			<span class="st2">包容</span>
			<span class="st3">厚德</span>
			<span class="st4">创新</span>
		</h2>
		<div class="tree"></div>
		<h2 class="list-title">图表模板</h2>
	</div>

	<ul id="chart-list" class="temp-list fix">
		<li data-type="dynamic-bubble">
			<div class="temp temp-1"></div>
			<h4 class="temp-title">动态气泡图</h4>
		</li>
		<li>
			<div class="temp temp-2"></div>
			<h4 class="temp-title">平行坐标图</h4>
		</li>
		<li>
			<div class="temp temp-3"></div>
			<h4 class="temp-title">地图</h4>
		</li>
		<li>
			<div class="temp temp-4"></div>
			<h4 class="temp-title">弦图</h4>
		</li>
		<li>
			<div class="temp temp-5"></div>
			<h4 class="temp-title">南丁格尔图</h4>
		</li>
		<li>
			<div class="temp temp-6"></div>
			<h4 class="temp-title">光环图</h4>
		</li>
		<li>
			<div class="temp temp-7"></div>
			<h4 class="temp-title">热力图</h4>
		</li>
		<li>
			<div class="temp temp-8"></div>
			<h4 class="temp-title">树图</h4>
		</li>
		<li>
			<div class="temp temp-9"></div>
			<h4 class="temp-title">重力导向图</h4>
		</li>
	</ul>

	<footer class="copyright">&copy; 2014 Baidu. All rights reserved.</footer>

	<?php if(!isset($_SESSION['uid'])){?>
		<iframe id="login-frame" class="login-frame" src="http://kityaccess.duapp.com/access.html?redirect_uri=http://127.0.0.1:8500/login/check"></iframe>
	<?php }?>

	<script src="<?=$base_url?>public/js/jquery-2.1.0.min.js"></script>
	<script src="<?=$base_url?>public/js/home.js"></script>
</body>

</html>