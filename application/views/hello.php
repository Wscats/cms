<!DOCTYPE html>
<html>
	<head>
		<title>hello</title>
	</head>
	<body>
		<ul>
			<?php foreach ($wsscat_list as $item):?>
			<li>
				<?php 
					if(is_array($item)){
						echo "我的第一个技能是".$item['first']."我的第二个技能是".$item['second'];
					}
					else{
						echo "我的名字是".$item;
					};?>
			</li>
			<?php endforeach;?>
		</ul>
	</body>
</html>