<!DOCTYPE html>
<html>

	<head>
		<title>新闻列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php require_once('css/css.php');?>
	</head>

	<body>
		<?php require_once('news_header.php');?>
		<div class="weui-panel weui-panel_access">
			<div class="weui-panel__hd">
				<span>新闻列表</span>
				<a style="display: block;" href="<?php echo site_url('news/add');?>" class="weui-btn weui-btn_mini weui-btn_default">增加新闻</a>
			</div>
			<?php 
				$i = 0;
				foreach ($news as $item): ?>
			<?php $i++;?>
			<div class="weui-panel__bd">
				<a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
					<div class="weui-media-box__hd">
						<img class="weui-media-box__thumb" src="<?php echo $item['image'][0];?>" alt="">
					</div>
					<div class="weui-media-box__bd">
						<h4 class="weui-media-box__title"><?php echo $item['title'];?></h4>
						<p class="weui-media-box__desc">
							<?php echo $item['text'];?>
						</p>
					</div>
				</a>
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
									<p class="weui-uploader__title">
										<label class="weui-form-preview__label" style="min-width: 0em">
											<?php foreach ($channels as $channel):?>
											<?php 
												if($channel['id']==$item['channel_id']){
													echo $channel['channel'];
												}
												;?>
											<?php endforeach;?>
										</label>
									</p>
									<a href="javascript:;" onclick="expand(<?php echo $i;?>)" class="weui-btn weui-btn_mini weui-btn_primary">展开图片：
										<?php echo count($item['image']);?>张</a>
									<!--<div class="weui-uploader__info"><?php echo count($item['image']);?>张</div>-->
								</div>
								<script>
									function expand(num) {
										var el = document.getElementById('expand_' + num);

										var status = el.style.display;
										//console.log(status)
										if(status == 'none') {
											el.style.display = 'block'
										} else {
											el.style.display = 'none'
										}
									}
								</script>
								<div id="expand_<?php echo $i;?>" class="weui-uploader__bd" style="display: none;">
									<ul class="weui-uploader__files" id="uploaderFiles">
										<?php foreach ($item['image'] as $img):?>
										<li class="weui-uploader__file" style="background-image:url(<?php echo $img;?>)"></li>
										<?php endforeach;?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="weui-form-preview">
				<div class="weui-form-preview__ft">
					<a class="weui-form-preview__btn weui-form-preview__btn_default" href="<?php echo site_url('news/edit?id='.$item['id']);?>">修改</a>
					<a class="weui-form-preview__btn weui-form-preview__btn_primary" href="<?php echo site_url('news/delete?id='.$item['id']);?>">删除</a>
				</div>
			</div>
			<style>
				.weui-form-preview__ft:after {
					border-top: 0px;
				}
			</style>
			<?php endforeach;?>
		</div>
	</body>

</html>