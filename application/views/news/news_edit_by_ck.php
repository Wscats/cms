<!DOCTYPE html>
<html>

	<head>
		<title>form</title>
	</head>
	<!--ck资源文件-->
	<script src="<?php echo base_url('assets/lib/ckeditor/ckeditor.js');?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/lib/ckeditor/samples.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/lib/ckeditor/neo.css');?>">
	
	<!--uploadImg资源文件-->
	<script src="<?php echo base_url('assets/lib/jquery.js');?>"></script>
	<script src="<?php echo base_url('assets/lib/uploadify/jquery.uploadify.js');?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/lib/uploadify/uploadify.css');?>" />
	<style>
		img {
			width: 50px;
			height: 50px;
		}
	</style>
	<body id="main">
		<h2><?php echo $title; ?></h2>
		<a href="<?php echo site_url('news/edit?id='.$id);?>">文本编辑</a><br />
		<select name="channel">
			<?php foreach ($channels as $item):?>
			<option value="<?php echo $item['id'];?>">
				<?php echo $item['channel'];?>
			</option>
			<?php endforeach;?>
		</select>
		<label for="title">Title</label>
		<input type="input" name="title" value="<?php echo $news[0]['title'];?>" /><br />
		
		<!--图片上传-->
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		<!--放图片的容器-->
		<p id="img_url">请上传图片</p>
		<!--隐藏图片的输入框，图片成功上传才有数据，这句为了表单提交时候把图片的url提交到后台-->
		<input id="img" name="image" value="" style="display: none;" /><br />
		
		<!--显示ck-->
		<main>
			<div class="grid-width-100">
				<!--数据库拿出来的html结构渲染到富文本编辑器-->
				<div id="editor">
					<?php echo $news[0]['text'];?>
				</div>
			</div>
		</main>
		<input type="submit" name="submit" onclick="submitNewsDetail()" value="提交修改" />
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
						$("<img src="+data+" /><p>"+data+"</p>").appendTo("#img_url");
					})
				},
				'onUploadError': function(file, errorCode, errorMsg, errorString) {
					alert(errorString);
				}
			});
		});
	</script>
	<script>
		//用ajax提交ck编辑信息
		function submitNewsDetail() {
			console.log($("[name='title']").val());
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('news/edit_by_ck?id='.$id);?>",
				data: {
					title: $("[name='title']").val(),
					//获取富文本的html内容
					text: CKEDITOR.instances.editor.getData(),
					channel: $("[name='channel']").val(),
				},
				async: true,
				success:function(data){
					console.log("已经成功提交");
					console.log(JSON.parse(data));
					//成功后返回新闻列表详细页面
					window.location.href = "<?php echo site_url('news/show');?>"
				}
			});
		}
	</script>
	<script>
		//富文本编辑器初始化，来自ck demo
		if(CKEDITOR.env.ie && CKEDITOR.env.version < 9)
			CKEDITOR.tools.enableHtml5Elements(document);

		CKEDITOR.config.height = 150;
		CKEDITOR.config.width = 'auto';

		var initSample = (function() {
			var wysiwygareaAvailable = isWysiwygareaAvailable(),
				isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');

			return function() {
				var editorElement = CKEDITOR.document.getById('editor');

				// :(((
				if(isBBCodeBuiltIn) {
					editorElement.setHtml('<h1>Hello world1!</h1><p>I&#39;m an instance of <a href="http://ckeditor.com">CKEditor</a>.');
				}

				// Depending on the wysiwygare plugin availability initialize classic or inline editor.
				if(wysiwygareaAvailable) {
					CKEDITOR.replace('editor');
				} else {
					editorElement.setAttribute('contenteditable', 'true');
					CKEDITOR.inline('editor');

					// TODO we can consider displaying some info box that
					// without wysiwygarea the classic editor may not work.
				}
			};

			function isWysiwygareaAvailable() {
				// If in development mode, then the wysiwygarea must be available.
				// Split REV into two strings so builder does not replace it :D.
				if(CKEDITOR.revision == ('%RE' + 'V%')) {
					return true;
				}

				return !!CKEDITOR.plugins.get('wysiwygarea');
			}
		})();
		initSample();
	</script>

</html>