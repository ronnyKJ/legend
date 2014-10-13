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

    <!--弹出层-->
    <div class="popup-layer" style="display:none;">
        <span class="close-popup">关闭</span>
        <div>
            <ul class="col-checkbox fix">
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb1" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb1" class="css-label"></label>
                </li>
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb2" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb2" class="css-label"></label>
                </li>
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb3" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb3" class="css-label"></label>
                </li>
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb4" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb4" class="css-label"></label>
                </li>
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb5" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb5" class="css-label"></label>
                </li>
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb6" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb6" class="css-label"></label>
                </li>
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb7" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb7" class="css-label"></label>
                </li>
                <li>
                    <input type="checkbox" unselectable="on" onselectstart="return false" id="cb8" class="css-checkbox" name="col-check" checked="checked">
                    <label for="cb8" class="css-label"></label>
                </li>
            </ul>
            <div class="table-wrap"></div>
        </div>
    </div>

</body>
</html>