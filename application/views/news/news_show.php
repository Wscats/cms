<!DOCTYPE html>
<html>
	<head>
		<title>hello</title>
	</head>
	<body>
		<ul>
			<?php foreach ($news as $item):?>
			<li>
				<p><span>标题：</span><?php echo $item['title'];?></p>
				<p><span>内容：</span><?php echo $item['text'];?></p>
				<p>
					<?php foreach ($channels as $channel):?>
						<?php 
							if($channel['id']==$item['channel_id']){
								echo $channel['channel'];
							}
						;?>
					<?php endforeach;?>
				</p>
				<!--遍历输出图片-->
				<?php foreach ($item['image'] as $img):?>
					<?php echo '<img style="width: 50px; height: 50px;" src="'.$img.'" />';?>
				<?php endforeach;?>
				<a href="<?php echo site_url('news/edit?id='.$item['id']);?>">修改</a>
				<a href="<?php echo site_url('news/delete?id='.$item['id']);?>">删除</a>
			</li>
			<?php endforeach;?>
		</ul>
		<a href="<?php echo site_url('news/add');?>">增加新闻</a>
	</body>
</html>