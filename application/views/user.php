<?php $base_url = $this->config->item('base_url');?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的图表</title><link rel="stylesheet" href="<?=$base_url?>public/css/my-charts.css">
    
</head>

<body>

	<header class="grid-2">
		<div class="avatar-circle" data-uid="<?=$uid?>">
			<span class="avatar">
				<img src="<?=$portrait?>" alt="avatar" height="62">
			</span>
			<span class="nickname"><?=$username?></span>
		</div>
		<div id="create" class="add-charts">创建新图表</div>
	</header>

	<ul class="charts-list fix">
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-1.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-2.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-3.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-4.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-1.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-2.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-3.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-4.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-1.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-2.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-3.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-4.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-1.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-2.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-3.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
		<li><span class="chart-img"><img src="<?=$base_url?>public/images/chart-4.png" alt="chartImg"></span><span class="chart-title">Infographic</span></li>
	</ul>

	<footer class="copyright">&copy; 2014 Baidu. All rights reserved.</footer>

	<script src="<?=$base_url?>public/js/jquery-2.1.0.min.js"></script>
	<script src="<?=$base_url?>public/js/user.js"></script>
</body>

</html>