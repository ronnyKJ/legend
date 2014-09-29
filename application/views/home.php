<?php $base_url = $this->config->item('base_url');?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>

<?php foreach($data as $key=>$entry):?>
	<?php echo $entry['nickname']?> <?php echo $entry['age']?>
<?php endforeach?>

</body>

</html>