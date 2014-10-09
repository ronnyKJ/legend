<?php $base_url = $this->config->item('base_url');?>

<?php
	session_start();

	$_SESSION['uid'] = $uid;
	$_SESSION['username'] = $username;
	$_SESSION['portrait'] = $portrait;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<script>
	window.parent.location.href = "/user";
</script>
</body>
</html>