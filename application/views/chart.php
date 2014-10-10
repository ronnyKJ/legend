<?php $base_url = $this->config->item('base_url');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑图表</title>
	<link rel="stylesheet" href="<?=$base_url?>public/css/chart-edit.css">
</head>
<body>
	<div class="nav fix">
		<a class="nav-item avatar" href="/user"><img src="<?=$_SESSION['portrait']?>" alt="avatar"></a>
		<a class="nav-item home" href="/home"></a>
		<a class="nav-item share"></a>
	</div>

	<ul class="edit-preview fix">
		<li class="edit selected"></li>
		<li class="preview"></li>
	</ul>
		
	<div class="main-part fix">
		<ul class="pc-mobile fix">
			<li class="pc selected"></li>
			<li class="mobile"></li>
		</ul>
		<div class="edit-area"></div>
	</div>

	<footer class="copyright">&copy; 2014 Baidu. All rights reserved.</footer>	
</body>
</html>