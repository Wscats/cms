<!DOCTYPE html>
<html>

	<head>
		<title>form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<script src="<?php echo base_url('assets/lib/jquery.js');?>"></script>
	<script src="<?php echo base_url('assets/lib/uploadify/jquery.uploadify.js');?>"></script>
	<!--<link rel="stylesheet" href="<?php echo base_url('assets/lib/uploadify/uploadify.css');?>" />-->
	<?php require_once('css/css.php');?>

	<body>
		<?php require_once('news_header.php');?>
		<div class="weui-panel weui-panel_access">
		<div class="weui-panel__hd">
			<span><?php echo $title; ?></span>
			<a style="display: block;" href="<?php echo site_url('channel/add');?>" class="weui-btn weui-btn_mini weui-btn_default">添加频道</a>
			<a style="display: block;" href="<?php echo site_url('news/show');?>" class="weui-btn weui-btn_mini weui-btn_default">返回新闻列表</a>
		</div>
		<?php echo validation_errors(); ?>
		<?php echo form_open('news/add'); ?>
		<div class="weui-cells__title">添加频道</div>
		<div class="weui-cells">
			<div class="weui-cell weui-cell_select weui-cell_select-before">
				<div class="weui-cell__hd">
					<select class="weui-select" name="channel">
						<?php foreach ($channel as $item):?>
						<option value="<?php echo $item['id'];?>">
							<?php echo $item['channel'];?>
						</option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="weui-cell__bd">
					<input class="weui-input" name="title" type="text" placeholder="请输入标题" />
				</div>
			</div>
		</div>
		<div class="weui-cells__title">添加内容</div>
		<div class="weui-cells weui-cells_form">
			<div class="weui-cell">
				<div class="weui-cell__bd">
					<textarea class="weui-textarea" name="text" placeholder="请输入内容" rows="3"></textarea>
					<!--<div class="weui-textarea-counter"><span>0</span>/200</div>-->
				</div>
			</div>
		</div>
		<div class="page__bd">
			<div class="weui-gallery" id="gallery">
				<span class="weui-gallery__img" id="galleryImg"></span>
				<div class="weui-gallery__opr">
					<a href="javascript:" class="weui-gallery__del">
						<i class="weui-icon-delete weui-icon_gallery-delete"></i>
					</a>
				</div>
			</div>

			<div class="weui-cells weui-cells_form">
				<div class="weui-cell">
					<div class="weui-cell__bd">
						<div class="weui-uploader">
							<div class="weui-uploader__hd">
								<p class="weui-uploader__title">图片上传</p>
								<!--<div class="weui-uploader__info">0/2</div>-->
							</div>
							<div class="weui-uploader__bd">
								<ul class="weui-uploader__files" id="img_url">
								</ul>
								<div class="weui-uploader__input-box">
									<input id="file_upload" class="weui-uploader__input" type="file" accept="image/*" multiple="true" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="padding: 0 15px; margin-top: 15px;">
			<button type="submit" href="javascript:;" name="submit" class="weui-btn weui-btn_primary">添加</button>
		</div>
		</div>
		<!--<input id="file_upload" name="file_upload" type="file" multiple="true">-->
		<!--放图片的容器-->
		<!--<p id="img_url">请上传图片</p>-->
		<!--隐藏图片的输入框，图片成功上传才有数据，这句为了表单提交时候把图片的url提交到后台-->
		<input id="img" name="image" value="" style="display: none;" /><br />
		</form>
	</body>
	<script type="text/javascript">
		console.log("<?php echo base_url("uploads/");?>");
		<?php $timestamp = time();?>
		$(function() {
			var imgArr = [];
			$('#file_upload').uploadify({
				'formData': {
					'timestamp': '<?php echo $timestamp;?>',
					'token': '<?php echo md5('unique_salt '.$timestamp);?>'
				},
				'buttonText':'',
				'width':79,
				'height':79,
				'hideButton':true,
				'removeTimeout':0,
				'swf': '<?php echo base_url('assets/lib/uploadify/uploadify.swf');?>',
				'uploader': 'upload_picture',
				'onUploadSuccess': function(file, data, response) {
					imgArr.push("<?php echo base_url("uploads/");?>" + file.name);
					$('#img').val(imgArr);
					//每次渲染前清空容器，让新的图片重新渲染
					$("#img_url").text("");
					//遍历渲染图片显示
					$.each(imgArr, function(index, data) {
						$('<li class="weui-uploader__file" style="background-image:url('+data+')"></li>').appendTo("#img_url");
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