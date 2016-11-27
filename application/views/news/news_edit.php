<!DOCTYPE html>
<html>
	<head>
		<title>form</title>
	</head>
	<body>
		
		<h2><?php echo $title; ?></h2>
		<a href="<?php echo site_url('news/edit_by_ck?id='.$id);?>">富文本编辑</a>
		<form action="<?php echo site_url('news/edit?id='.$id);?>" method="post" accept-charset="utf-8">
			<select name="channel">
				<?php foreach ($channels as $item):?>
					<option value="<?php echo $item['id'];?>">
						<?php echo $item['channel'];?>
					</option>
				<?php endforeach;?>
			</select>
			<label for="title">Title</label>
			<input type="input" name="title" value="<?php echo $news[0]['title'];?>" /><br />
			<label for="text">Text</label>
			<textarea name="text"><?php echo $news[0]['text'];?></textarea><br />
			<input type="submit" name="submit" value="提交修改" />
		</form>
	</body>
</html>