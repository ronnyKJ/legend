<?php $base_url = $this->config->item('base_url');?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<script>
var uid = '<?=$uid?>';
var username = '<?=$username?>';
var portrait = '<?=$portrait?>';
window.parent.location.href = "/home";
</script>
</body>
</html>