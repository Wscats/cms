<!DOCTYPE html>
<html>

	<head>
		<title>form</title>
	</head>
	<script src="<?php echo base_url('assets/lib/jquery.js');?>"></script>
	<script src="<?php echo base_url('assets/lib/uploadify/jquery.uploadify.js');?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/lib/uploadify/uploadify.css');?>" />

	<body>
		<h2><?php echo $title; ?></h2>
		<a href="<?php echo site_url('channel/add');?>">添加频道</a>
		<a href="<?php echo site_url('news/show');?>">返回新闻列表</a>
		<?php echo validation_errors(); ?>
		<?php echo form_open('news/add'); ?>
		<select name="channel">
			<?php foreach ($channel as $item):?>
			<option value="<?php echo $item['id'];?>">
				<?php echo $item['channel'];?>
			</option>
			<?php endforeach;?>
		</select><br />
		<label for="title">Title</label>
		<input type="input" name="title" /><br />
		<label for="text">Text</label>
		<textarea name="text"></textarea><br />
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		<!--放图片的容器-->
		<p id="img_url">请上传图片</p>
		<!--隐藏图片的输入框，图片成功上传才有数据，这句为了表单提交时候把图片的url提交到后台-->
		<input id="img" name="image" value="" style="display: none;" /><br />
		<input type="submit" name="submit" value="Create news item" />
		</form>
	</body>
	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			var imgArr = [];
			$('#file_upload').uploadify({
				'formData': {
					'timestamp': '<?php echo $timestamp;?>',
					'token': '<?php echo md5('unique_salt'.$timestamp);?>'
				},
				'swf': '<?php echo base_url('assets/lib/uploadify/uploadify.swf');?>',
				'uploader': 'upload_picture',
				'onUploadSuccess': function(file, data, response) {
					imgArr.push("http://localhost/CI/myCi/uploads/"+file.name);
					$('#img').val(imgArr);
					//每次渲染前清空容器，让新的图片重新渲染
					$("#img_url").text("");
					//遍历渲染图片显示
					$.each(imgArr,function(index,data){
						$("<img src="+data+" />").appendTo("#img_url");
					})
				},
				'onUploadError': function(file, errorCode, errorMsg, errorString) {
					alert(errorString);
				}
			});
		});
	</script>
	<style>
		img {
			width: 50px;
			height: 50px;
		}
	</style>
</html>