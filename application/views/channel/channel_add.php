<!DOCTYPE html>
<html>
	<head>
		<title>form</title>
	</head>
	<body>
		<h2><?php echo $title; ?></h2>
		<a href="<?php echo site_url('news/add');?>">返回添加新闻</a>
		<?php echo validation_errors(); ?>
		<?php echo form_open('channel/add'); ?>
		<label for="title">Channel</label>
		<input type="input" name="channel" /><br />
		<input type="submit" name="submit" value="Create news item" />
	</body>
</html>