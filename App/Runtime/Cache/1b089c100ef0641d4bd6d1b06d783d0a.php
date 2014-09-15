<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="Public/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.0.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/bootstrap/css/bootstrap.min.css"/>
<script type="text/javascript" src="Public/css/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="Public/css/font-awesome/css/font-awesome.min.css" />

<script type="text/javascript" src="Public/js/nicescroll/jquery.nicescroll.min.js	"></script>

<link rel="stylesheet" href="Public/js/summernote/summernote.css"/>
<script type="text/javascript" src="Public/js/summernote/summernote.js"></script>

<link rel="stylesheet" href="Public/js/colpick/css/colpick.css" />
<script type="text/javascript" src="Public/js/colpick/js/colpick.js"></script>

<script type="text/javascript" src="Public/js/edit.js"></script>
<link rel="stylesheet" href="Public/css/style.css"/>
<title>我的说明书 - 说明书编辑</title>
</head>
<body class="edit-builder">
	<!--st head-navigator-->
	<div class="head">
		<a class="head-logo" href="__ROOT__">
				<img src="Public/css/img/yhb_logo.png">
		</a>
		<div class="head-nav flr">
			<a>
				<i class="glyphicon glyphicon-cog"></i>刘昕<b class="caret"></b>
			</a>
			<a href=""><i class="glyphicon glyphicon-bell"></i>通知</a>
			<a href=""><i class="glyphicon glyphicon-book"></i>我的说明书</a>
		</div>
	</div>
	<!--end -->
	<!-- left-navigator -->
	<div class="left-nav">
			<a class="left-nav-slider" id="upload-img-btn">
				<span class="left-nav-icon"><i class="glyphicon glyphicon-plus"></i></span>
				<span class="left-nav-text">新建一页</span>
			</a>
		<!--page indexs the hover effect bug need to be fixed -->
		<div id="left-nav-pages">
					<a class="left-nav-slider">
						<span class="left-nav-icon"><i class="glyphicon glyphicon-file"></i></span>
						<span class="left-nav-text">第1页</span>
					</a>
					<a class="left-nav-slider">
						<span class="left-nav-icon"><i class="glyphicon glyphicon-file"></i></span>
						<span class="left-nav-text">第2页</span>
					</a>
					<a class="left-nav-slider">
						<span class="left-nav-icon"><i class="glyphicon glyphicon-file"></i></span>
						<span class="left-nav-text">第3页</span>
					</a>
		</div>

		<div class="left-nav-controls">
			<a class="left-nav-slider">
				<span class="left-nav-icon"><i class="glyphicon glyphicon-floppy-disk"></i></span>
				<span class="left-nav-text">保存</span>
			</a>
			<a class="left-nav-slider">
				<span class="left-nav-icon"><i class="glyphicon glyphicon-ok"></i></span>
				<span class="left-nav-text">生成二维码</span>
			</a>
		</div>
		
	</div>
	<!-- end -->
	<!-- st edit-wrapper -->
	<div class="edit-wrapper">
		<!-- left column of the preview section -->
		<div class="col-5 canvas-wrapper">
			<div class="canvas-board">
				<div id="canvas">

					<button class="text-button">text-button</button>
					<div class="component cmp-image">
						<div class="component-inner">
							<div class="component-head">
								<div class="component-btn">
									<i class="glyphicon glyphicon-trash"></i>
								</div>
							</div>
							<div class="component-preview">
								<div class="preview-box image-preview">
									<img>
								</div>
							</div>
						</div>
					</div>
					<div class="component cmp-text">
						<div class="component-inner">
							<div class="component-head">
								<div class="component-btn">
									<i class="glyphicon glyphicon-trash"></i>
								</div>
							</div>
							<div class="component-preview">
								<div class="preview-box text-preview">请在右侧编辑文字内容Blablabla</div>
							</div>
						</div>
					</div>
					<div class="component cmp-video">
						<div class="component-inner">
							<div class="component-head">
								<div class="component-btn">
									<i class="glyphicon glyphicon-trash"></i>
								</div>
							</div>
							<div class="component-preview">
								<div class="preview-box video-preview"></div>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<!-- right column of the editor -->
		<div class="col-5 editor-wrapper">
			<div class="editor-board">
				<div class="editor-head">
					<!-- tab-navigator -->
					<ul id="editor-tab" role="tablist">
					    <li><a href="#edit-page" role="tab" data-toggle="tab">编辑页面</a></li>
					    <li><a href="#add-component" role="tab" data-toggle="tab">添加组件</a></li>
					    <li class="active"><a href="#edit-component" role="tab" data-toggle="tab">编辑组件</a></li>
					</ul>
				</div>

				<div class="editor-content tab-content">
					  <div class="tab-pane fade" id="edit-page">
					  	<div class="edit-page">
					  		<!--basic setting of pages  -->
					  		<div class="edit-group">
					  			<div class="edit-group-title">基础设置</div>
						  		<div class="edit-group-row">
							  		<div class="edit-group-col">
								  		<div class="edit-header">
								  			背景色
								  		</div>
								  		<div class="edit-option">
								  			<button class="edit-colpick"><span>无</span><b class="caret"></b></button>
								  		</div>
							  		</div>
							  		<div class="edit-group-col">
								  		<div class="edit-header">
								  			页内边距
								  		</div>
								  		<div class="edit-option">
								  			<select>
								  				<option>无</option>
								  				<option>大</option>
								  				<option>中</option>
								  				<option>小</option>
								  			</select>
								  		</div>
								  	</div>
								  	<div class="edit-group-col">
								  		<div class="edit-header">
								  			页外边距
								  		</div>
								  		<div class="edit-option">
								  			<select>
								  				<option>无</option>
								  				<option>大</option>
								  				<option>中</option>
								  				<option>小</option>
								  			</select>
								  		</div>
							  		</div>
							  	</div>
						  		<div class="edit-group-row edit-background">
							  		<div class="edit-header">
							  			背景图片
							  		</div>
							  		<div class="edit-option">
							  			<ul>
											<li>
												<div>
													<img src>
												</div>
											</li>
											<li>
												<div>
													<img src>
												</div>
											</li>
											<li>
												<div>
													<img src>
												</div>
											</li>
											<li>
												<div>
													<img src>
												</div>
											</li>							  				
							  			</ul>
							  		</div>
							  		<button class="btn btn-primary">更多背景</button> 
							  		<button class="btn btn-primary">上传背景</button> 
							  	</div>
							  	</div>
							  	<!-- page transition effects -->
							  	<div class="edit-group">
							  		<div class="edit-group-title">换页效果</div>
							  		<div class="edit-group-row">
							  			<ul>
							  				<li>
							  					<label class="radio">
							  						<input type="radio" name="page-effects" value="滑入" data-toggle="radio" class="custom-radio">
							  						滑入
							  					</label>
							  				</li>
							  				<li>
							  					<label class="radio">
							  						<input type="radio" name="page-effects" value="淡入" data-toggle="radio" class="custom-radio">
							  						淡入
							  					</label>
							  				</li>
							  				<li>
							  					<label class="radio">
							  						<input type="radio" name="page-effects" value="弹出" data-toggle="radio" class="custom-radio">
							  						弹出
							  					</label>
							  				</li>
							  				<li>
							  					<label class="radio">
							  						<input type="radio" name="page-effects" value="滚动" data-toggle="radio" class="custom-radio">滚动
							  					</label>
							  				</li>
							  			</ul>	
							  		</div>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="tab-pane fade" id="add-component">
					  		<div class="edit-group">
					  			<div class="edit-group-title">点击或拖拽添加组件</div>
							  	<div class="editor-add-cmp">
								  	<ul>
								  		<li id="id-text">
								  			<div><i class=""></i>文本框</div>
								  		</li>
								  		<li id="id-image">
								  			<div>图片</div>
								  		</li>
								  		<li id="id-video">
								  			<div>视频</div>
								  		</li>
								  		<li id="id-audio">
								  			<div>音频</div>
								  		</li>
								  		<li id="id-audio">
								  			<div>轮播</div>
								  		</li>
								  		<li id="id-table">
								  			<div>表格</div>
								  		</li>
								  		<li id="id-icons">
								  			<div>图标</div>
								  		</li>
								  		<li id="id-button">
								  			<div>按钮</div>
								  		</li>
								  		<li id="id-divider">
								  			<div>分割线</div>
								  		</li>
								  		<li id="id-share">
								  			<div>分享到</div>
								  		</li>
								  	</ul>
								</div>	
					  		</div>
					  	</div>
					  	<div class="tab-pane fade in active" id="edit-component">
					  	<!-- st edit-slider slide from right when click event is trigged -->
					  	 	<div class="edit-slider edit-slider-back edit-slider-hidden">
					  		<div class="edit-component edit-component-text">
					  			<div class="edit-group edit-text">
							  		<div class="edit-group-row">
								  		<div class="edit-group-col">
									  		<div id="edit-texteditor"></div>
									  	</div>
								  	</div>
								</div>
							  	<div class="edit-group">
							  		<div class="edit-group-title">基础设置</div>
							  		<div class="edit-group-row">
							  			<div class="edit-group-col">
									  		<div class="edit-header">
									  			文本框背景色
									  		</div>
									  		<div class="edit-option">
									  			<button class="edit-colpick"><span>无</span><b class="caret"></b></button>
									  		</div>
									  	</div>
								  		<div class="edit-group-col">
									  		<div class="edit-header">
									  			文本框宽度
									  		</div>
									  		<div class="edit-option">
									  			<select>
									  				<option>100%</option>
									  				<option>80%</option>
									  				<option>60%</option>
									  				<option>50%</option>
									  			</select>
									  		</div>
									  	</div>
									</div> 
									</div> 	
									<div class="edit-group">
							  		<div class="edit-group-row">
								  		<div class="edit-group-col">
									  		<div class="edit-header">
									  			文本框内边距
									  		</div>
									  		<div class="edit-option">
									  			<select>
									  				<option>无</option>
									  				<option>大</option>
									  				<option>中</option>
									  				<option>小</option>
									  			</select>
									  		</div>
									  	</div>
									  	<div class="edit-group-col">
									  		<div class="edit-header">
									  			文本框外边距
									  		</div>
									  		<div class="edit-option">
									  			<select>
									  				<option>无</option>
									  				<option>大</option>
									  				<option>中</option>
									  				<option>小</option>
									  			</select>
									  		</div>
								  		</div>
								  	</div>
							  	</div>

						  		<div class="edit-group">
							  		<div class="edit-group-title">组件特效</div>
							  		<div class="edit-group-row">
							  			<ul>
							  				<li class="page-trans-default">
							  					<button class="btn btn-primary"></button>
							  				</li>
							  				<button class="btn btn-primary"></button>
							  					<button class="btn btn-primary"></button>
							  					<button class="btn btn-primary"></button>
							  			</ul>
							  		</div>
							  	</div>
					  		</div> 
					  		</div>
					  	</div>
					  	<div class="edit-slider">
					  		<div class="edit-component">
						  		<div class="edit-group">
								  		<div class="edit-group-title">图片设置</div>
								  		<div class="edit-group-row">
									  		<div class="edit-group-col">
										  		<div class="edit-option">
										  			<button class="btn btn-primary">上传图片</button>
										  			<button class="btn btn-primary">更多图片</button>
										  		</div>
										  	</div>
										</div>
								</div>			
							  	<div class="edit-group">
							  		<div class="edit-group-title">基础设置</div>
							  		<div class="edit-group-row">
								  		<div class="edit-group-col">
									  		<div class="edit-header">
									  			图片宽度
									  		</div>
									  		<div class="edit-option">
									  			<select>
									  				<option>100%</option>
									  				<option>80%</option>
									  				<option>60%</option>
									  				<option>50%</option>
									  			</select>
									  		</div>
									  	</div>
									</div>	
							  		<div class="edit-group-row">
								  		<div class="edit-group-col">
									  		<div class="edit-header">
									  			图片内边距
									  		</div>
									  		<div class="edit-option">
									  			<select>
									  				<option>无</option>
									  				<option>大</option>
									  				<option>中</option>
									  				<option>小</option>
									  			</select>
									  		</div>
									  	</div>
									  	<div class="edit-group-col">
									  		<div class="edit-header">
									  			图片外边距
									  		</div>
									  		<div class="edit-option">
									  			<select>
									  				<option>无</option>
									  				<option>大</option>
									  				<option>中</option>
									  				<option>小</option>
									  			</select>
									  		</div>
								  		</div>
								  	</div>
							  	</div>

						  		<div class="edit-group">
							  		<div class="edit-group-title">组件特效</div>
							  		<div class="edit-group-row">
							  			<ul>
							  				<li class="page-trans-default">
							  					
							  				</li>
							  			</ul>
							  		</div>
							  	</div>
					  		</div> 
					  		</div>
					  		</div>
					  	</div>
				</div>
			</div>
	    </div>
	</div>
	<!-- upload image modal 
	     just as demo
		 all styles need to be revised
	 -->
	<div id="upload-img-modal" class="upload-img-hide">
		<div id="close-upload-btn" class="close-upload-modal radius50">
			x
		</div>	
	</div>

	<div id="upload-img-overlay" class="close-upload-modal"></div>
	<!-- end -->
	<!-- add page modal -->
	<!-- end -->
	<script type="text/javascript">
	$(document).ready(function() {
		/* text-editor */
  		$('#edit-texteditor').summernote({
  			height : 200,
  			language :'zh-CN',
  			toolbar : [
		        ['font', ['bold', 'italic', 'underline']],
		        ['para', ['ul', 'ol', 'paragraph']],
		        ['style', ['style']],
		        ['color', ['color']],
		        ['fontname', ['fontname']],
		        ['height', ['height']],
		        ['insert', ['link', 'hr']],
  			]
  		});
  		/* niceScroll */
  		$('#canvas').niceScroll({cursorwidth:8});
  		$('.editor-content').niceScroll({cursorwidth:8});

	});
		/* colorpicker */
		$('.edit-colpick').colpick({
			colorScheme : 'dark',
			onSubmit:function(hsb,hex,rgb,el) {
				$(el).css({'background-color':'#'+hex,'color' : '#fff'})
				.find('span').text('#'+hex);
			}
		});	
		/* set left-nav-pages sortable*/
		$('#left-nav-pages').sortable();

		/* upload-img-modal */
		$('#upload-img-btn').click(function(){
			$('#upload-img-modal').removeClass('upload-img-hide');
			$('#upload-img-overlay').show();
		});
		$('.close-upload-modal').click(function(){
			$('#upload-img-modal').addClass('upload-img-hide');
			$('#upload-img-overlay').hide();
		});

		/* edit-slider put this in the click method of the component in canvas
	     * add a new page and add component editors in the page then let it slide in 
		 * <div class="edit-slider edit-slider-hidden">some editors of the specific component</div> 
		 */
		$('.text-button').click(function(){
			$('.edit-slider-back').show().addClass('edit-slidein');
			setTimeout(function(){
				$('.edit-slider-back').removeClass('edit-slider-hidden').removeClass('edit-slidein');
			},1000)
		});
	</script>
</body>
</html>