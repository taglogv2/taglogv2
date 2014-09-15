<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if($_GET[type] == 'rewrite'): ?><base href="http://<?php echo ($_SERVER['HTTP_HOST']); ?>"><?php endif; ?>
<title>用户宝</title>
<meta name="keywords" content="视频说明书，电子说明书，二维码，二维码说明书，二维码链接，专业说明书平台，说明书，说明书引擎，免费视频">
<meta name="description" content="不只是电子化的产品说明书，而是动态的、全方位的产品描述平台。让消费者为您传播品牌，让口碑“转”起来。扫描即可浏览，让用户更直观地理解你的产品与品牌文化">
<link rel="shortcut icon" href="./favicon.png"/>
<link href="http://yhb360.qiniudn.com/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="http://yhb360.qiniudn.com/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
<link href="http://yhb360.qiniudn.com/css/style.css" rel="stylesheet">
<link href="http://yhb360.qiniudn.com/css/style.css" rel="stylesheet">
<?php if(stristr($_SERVER['HTTP_USER_AGENT'], 'msie')): ?><style>
.product_view_box {
	width: 402px;
}
.product_view_page_box {
	width: 385px;
	overflow-y:scroll;
	overflow-x:hidden;
}
.product_view_page_box_big {
	overflow-y:hidden;
}
</style><?php endif; ?>
<script type="text/javascript">
	var browserInfo = {browser:"", version: ""};
	var ua = navigator.userAgent.toLowerCase();
	if (window.ActiveXObject) {
		browserInfo.browser = "IE";
		browserInfo.version = ua.match(/msie ([\d.]+)/)[1];
		if(browserInfo.version <= 7){
			if(confirm("您的浏览器版本过低，请使用IE8及以上浏览器，或者firefox、chrome、360等浏览器;")){}
			location.href = 'http://chrome.360.cn/';
		}
	}
</script>
<script src="http://yhb360.qiniudn.com/js/jquery-1.9.0.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/layer/layer.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/jquery-ui-1.10.0.custom.min.js"></script>
</head>
<body class="no_index">
	<div class="top">
		<div class="w980">
			<div class="login">
				<?php if(session('?email')): ?><a title="个人中心" href="<?php echo U('member/home');?>"><?php echo session('email');?>&nbsp;<font id="message_tips" color="#1DB1AB">(0)</font></a>
				<span><a href="<?php echo U('member/index');?>">我的说明书</a></span>
				<a href="<?php echo U('member/logout');?>">退出</a>
				<?php else: ?>
				<span><a target="_blank" href="<?php echo U('member/login');?>">登录</a></span>
				<a target="_blank" href="<?php echo U('member/register');?>">注册</a><?php endif; ?>
			</div>
			<a href="<?php echo U('index/index');?>" style="float:left"><img src="http://yhb360.qiniudn.com/images/logo.png" class="logo"></a>
		</div>
	</div>
    <div class="naver">
         <div class="w980">
			<a class="input_botton fr" href="<?php echo U('product/edit','product_id='.$product['product_id'].'&verify='.$_GET['verify']);?>" id="product_submit"><img src="http://yhb360.qiniudn.com/images/view2_ico.png"><span>返回编辑</span></a>
            <a href="javascript:void(0);" class="return_index" rel="index">返回首页</a> &gt;
			<a href="javascript:void(0);" class="return_index" rel="member_index">返回根目录</a>&gt;
            <a href="<?php echo U('product/edit','product_id='.$product['product_id'].'&verify='.$_GET['verify']);?>" >返回编辑</a>
        </div>
    </div>
    <div class="w980 main_table">
        <div class="product_left">
			<?php if($_GET['verify'] && !$product['member_id']): ?><button class="qrpng_botton" id="earn_button">认领此说明书</button><?php endif; ?>
			<p class="qrpng1">扫一扫试试看吧~</p>
			<img class="qrpng" src="<?php echo U('product/qrdownload','product_id='.$product['product_id']);?>">
			<button class="qrpng_botton" id="qrpng_botton">下载二维码</button>
			<p class="qrpng_2">可将二维码印刷或者粘贴在产品、包装或者说明书上用户扫描即可浏览</p>
			<p class="qrpng_3">用户也可通过以下链接直接访问：</p>
			<p class="qrpng_4"><a target="_blank" href="<?php echo ($link); ?>"><?php echo ($link); ?></a></p>
        </div>
		<div class="product_right">
			<div class="product_view_box">
				<div class="product_view_page_box">
					<div class="product_view_page_box_big">
						<?php if(is_array($pages)): $pages_k = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($pages_k % 2 );++$pages_k;?><div class="product_view_page">
							<div class="product_view_page_content">
								<!--
								<?php if($product['image'] != ''): ?><img class="uploadify_img" width="100%" src="<?php echo ($product[image]); ?>"><?php endif; ?>
								-->
								<p class="product_view_name"><?php echo ($product["name"]); ?></p>
								<p class="product_view_content_name"><?php echo ($page["subject"]); ?></p>
								<?php if(is_array($page["content"])): $i = 0; $__LIST__ = $page["content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><div style="margin-bottom:20px;">
									<div class="product_view_description"><?php echo ($content["description"]); ?></div>
									<?php if(is_array($content["file"])): $i = 0; $__LIST__ = $content["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><div class="product_view_file">
										<div class="product_view_file_box">
											<?php if($file['type'] == 'image'): ?><img class="uploadify_img" width="100%" src="<?php echo ($file["path"]); ?>">
											<?php elseif($file['type'] == 'video'): ?>
											<?php if($file['status'] == 1): $file['height'] = $file['height']?$file['height']:490 ?>
											<?php $file['width'] = $file['width'] ? $file['width']:600 ?>
											<?php $swf_height = 348 * $file['height'] /$file['width'] ?>
											<?php if(stristr($_SERVER['HTTP_USER_AGENT'], 'chrome')): ?><video width="100%" class="polyvplayer<?php echo ($file["vid"]); ?> video" preload="metadata" controls="controls">
												<source src="<?php echo ($file["mp4"]); ?>" type="video/mp4" />
											</video>
											<script>
												var swf_width = $('.product_view_file_box').width();
												var swf_height = swf_width * <?php echo ($file["height"]); ?>/<?php echo ($file["width"]); ?>;
												$('.polyvplayer<?php echo ($file["vid"]); ?>').height(swf_height);
											</script>
											<?php else: ?>
											<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" height="<?php echo ($swf_height); ?>" width="348" id="polyvplayer<?php echo ($file["vid"]); ?>">
											<param name="movie" value="http://player.polyv.net/videos/<?php echo ($file["vid"]); ?>.swf">
											<param name="allowscriptaccess" value="always">
											<param name="wmode" value="opaque">   
											<param name="allowFullScreen" value="true" />
											<embed src="http://player.polyv.net/videos/<?php echo ($file["vid"]); ?>.swf" width="348" height="<?php echo ($swf_height); ?>" type="application/x-shockwave-flash" allowscriptaccess="always" wmode="opaque" name="polyvplayer<?php echo ($file["vid"]); ?>" allowFullScreen="true" /></embed>
											</object><?php endif; ?>
											<?php elseif($file['status'] == 0): ?>
											<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
											<div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>根据国家政策规定，您的视频正在被审核。建议您先进行其他编辑。20分钟左右后再查看结果将会自动生效。</span></div>
											<?php elseif($file['status'] == 2): ?>
											<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
											<div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>根据国家政策规定，您的视频审核失败。</span></div>
											<?php elseif($file['status'] == 3): ?>
											<img class="uploadify_img" width="100%" src="<?php echo ($file["first_image"]); ?>">
											<div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>根据国家政策规定，您的视频存在违法信息，已被删除。</span></div><?php endif; endif; ?>
										</div>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="clear"></div>
					</div>
				</div>
				<div class="product_view_botton_left"></div>
				<div class="product_view_botton_right"></div>
			</div>
			<div class="product_count_pages">
				<?php if(is_array($pages)): $pages_k = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($pages_k % 2 );++$pages_k;?><span <?php if($pages_k == 1): ?>class="active"<?php endif; ?>></span><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<script>
			var i = 1;
			var height_time_stop = false;
			$(function(){
				$('table').attr('width','99%');
				$('table').attr('border','1');
				<?php if(!stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')): ?>$(".product_view_page_content").draggable({
					appendTo:'product_view_page',
					cursor: 'move',
					axis:"y",
					containment: 'parent'
				});
				var page_num = 0 - (<?php echo count($pages);?> - 1) * 370;
				$('.product_view_page_box_big').width(<?php echo count($pages);?> * 370);
				<?php else: ?>
				var page_num = 0 - (<?php echo count($pages);?> - 1) * 385;
				$('.product_view_page_box_big').width(<?php echo count($pages);?> * 385);<?php endif; ?>
				$('.product_view_botton_right').click(function(){
					$(".product_view_page").stop(true,true);
					if(i < <?php echo count($pages);?>){
						height_time_stop = true;
						<?php if(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')): ?>$('.product_view_page_box_big').height($('.product_view_page_content').eq(i).height());<?php endif; ?>
						$('.product_view_page').animate({left:'-=370px'});
						$('.product_count_pages span.active').removeClass('active').next().addClass('active');
						++i;
					}
				});
				$('.product_view_botton_left').click(function(){
					$(".product_view_page").stop(true,true);
					if(i > 1){
						height_time_stop = true;
						--i;
						<?php if(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')): ?>var s= i-1;
						$('.product_view_page_box_big').height($('.product_view_page_content').eq(s).height());<?php endif; ?>
						$('.product_view_page').animate({left:'+=370px'});
						$('.product_count_pages span.active').removeClass('active').prev().addClass('active');
					}
				});
			})
			
			<?php if(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')): ?>var h_time = '';
			function set_height(){
				if(height_time_stop == false){
					var s = i - 1;
					$('.product_view_page_box_big').height($('.product_view_page_content').eq(s).height());
					height_time = setTimeout('set_height()',h_time);
					h_time+=200;
				}
			}
			set_height();<?php endif; ?>
			</script>
        </div>
        <div class="clear"></div>
    </div>
	<?php if(!session('?member_id')): ?><div class="tips">
		<div class="w980">
		<div class="tips_button">
			<a class="down" href="javascript:void(0)"></a>
			<a class="up" href="javascript:void(0)"></a>
		</div>
		<div class="tips_massage">
			由于您尚未注册，请保存此文档的编辑链接，以便下次访问
			<a class="copy_button" target="_blank" href="<?php echo ($copylink); ?>"><?php echo ($copylink); ?></a>。否则关闭浏览器您将无法找回已创建说明书。我们建议您注册一个帐户，这样您已创建和编辑的文档将会保存到您的帐号内。
		</div>
		<div class="tips_botton"><a href="<?php echo U('member/register');?>" target="_blank">立即注册</a></div>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			setTimeout('no_register_tips()',2000);
			$('.tips_button .up').click(function(){
				$('.tips').css({height:25});
				$('.tips_button .up').css({display:'none'});
				$('.tips_button .down').css({display:'inline-block'});
			});
			$('.tips_button .down').click(function(){
				$('.tips').css({height:''});
				$('.tips_button .down').css({display:'none'});
				$('.tips_button .up').css({display:'inline-block'});
			});
		});
		function no_register_tips(){
			$('.tips').slideDown(1500);
		}
		var unloadPageTip = function(){
			return "直接离开将无法找回已创建说明书，请保存页面下方的编辑链接，以便找回和认领。";
		};
		window.onbeforeunload = unloadPageTip;
	</script><?php endif; ?>
	<div class="qrdownload" id="dialog-download" title="下载二维码">
		<table class="table" style="text-align:center;">
			<thead>
				<tr>
					<th>二维码大小</th>
					<th>建议扫描距离(米)</th>
					<th>下载链接</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>8cm</td>
					<td>0.5m</td>
					<td><a href="<?php echo U('product/qrdownload','product_id='.$product['product_id'].'&act=download&qrsize=6');?>"></a></td>
				</tr>
				<tr>
					<td>12cm</td>
					<td>0.8m</td>
					<td><a href="<?php echo U('product/qrdownload','product_id='.$product['product_id'].'&act=download&qrsize=9');?>"></a></td>
				</tr>
				<tr>
					<td>15cm</td>
					<td>1.2m</td>
					<td><a href="<?php echo U('product/qrdownload','product_id='.$product['product_id'].'&act=download&qrsize=11');?>"></a></td>
				</tr>
				<tr>
					<td>30cm</td>
					<td>1.8m</td>
					<td><a href="<?php echo U('product/qrdownload','product_id='.$product['product_id'].'&act=download&qrsize=24');?>"></a></td>
				</tr>
			</tbody>
		</table>
		<p>*二维码尺寸请按照43像素的整数倍缩放，以保持最佳效果</p>
	</div>
	<script type="text/javascript">
		$(function(){
			$(document).on("click","object",function (e){
				e.preventDefault();
			});
			$(document).on("click","embed",function (e){
				e.preventDefault();
			});
			$("#dialog-download").dialog({
				autoOpen: false,
				modal: true,
				width: 800,
				maxHeight:500,
				position: ["center",100],
				buttons: {
					'关闭':function(){
						$(this).dialog('close');
					}
				}
			});
			$('#qrpng_botton').click(function(){
				$('#dialog-download').dialog('open');
			});
			
			$('.return_index').click(function(){
				var rel = $(this).attr('rel');
				if(rel == 'index'){
					<?php if($copylink): ?>layer.alert('您未认领该说明书，请务必保存此说明书的编辑链接:'+'<?php echo ($copylink); ?>'+'，以便下次访问:-)', -1, function(){
							location.href = '<?php echo U("index/index");?>';
						});
					<?php else: ?>
						location.href = '<?php echo U("index/index");?>';<?php endif; ?>
				}else{
					$.get('<?php echo U("member/islogin");?>',function(data){
						if(data.data == 1){
							window.location.href="<?php echo U('member/index');?>";
						}else{
							var title = '您需要先注册一个帐号，才能为您创建根目录，现在就去注册么？';
							var url = "<?php echo U('member/register','','','',true);?>";
							layer.confirm(title,function(){
								var w=window.open();
								setTimeout(function(){ 
									w.location=url; 
								}, 500)
								
								return false;
							});
						}
					});
				}
			});
			
			$('#earn_button').click(function(){
				$.get('<?php echo U("member/islogin");?>',function(data){
					if(data.data == 1){
						//发送认领请求
						$.get('<?php echo U("member/earn",'product_id='.$_GET['product_id'].'&verify='.$_GET['verify']);?>',function(data){
							if(data.data == 1) {
								layer.alert('恭喜你，认领成功', -1, function(){
									window.location.href='<?php echo U('member/index');?>';
								});
							}else{
								layer.msg(data.info, 1);
							}
						});
					}else{
						<?php if($islogin): ?>var title = '时光流逝，您已登录超时,请重新登录后认领:-)';
							var url = "<?php echo U('member/login','','','',true);?>";
						<?php else: ?>
							$.layer({
								shade: [0],
								area: ['auto','auto'],
								dialog: {
									msg: '您需要登录帐号才能认领，现在就去注册么？',
									btns: 2,                    
									type: 4,
									btn: ['去注册','去登录'],
									yes: function(){
										var w=window.open();
										w.location = '<?php echo U('member/register');?>';
									}, no: function(){
										var w=window.open();
										w.location = '<?php echo U('member/login');?>';
									}
								}
							});<?php endif; ?>
					}
				});
			});
		});
	</script>
	<?php if(session('?email')): ?><script>

			var a = 1;
			function fn(){
				if(a == 1){
					$('#message_tips').css({color:'white'});
					a = 0;
				}else{
					$('#message_tips').css({color:'#FF0000'});
					a = 1;
				}
			}
			var myInterval;

			function message_tips(){
				$.get("<?php echo U('member/tips');?>", function(data){
					if(data.data > 0){
						$("#message_tips").html('('+data.data+')');
						$('#message_tips').css({color:'white'});
						if(!myInterval)	myInterval = setInterval(fn,1000);
					} else {
						$("#message_tips").html('(0)');
						if(data.data == 0){
							$('#message_tips').css({color:'#1DB1AB'});
							clearInterval(myInterval);
						}
					}
				});
				setTimeout('message_tips()',5000);
			}
			$(function(){
				message_tips();
			});
		</script><?php endif; ?>
	<div class="feedback">
	<div class="feedback_content" style="padding:10px;height:auto">
		<div class="feedback_title">在线客服</div>
		<div class="feedback_content_box" style="display:none">
			<textarea id="feedback_content">在这里留下您的意见</textarea>
			<div class="feedback_email_box">
				<input type="submit" id="sub_feedback" value="提交反馈"/>
				<input type="text" id="feedback_email" value="请输入您的邮箱"/>
			</div>
		</div>
		<a href="http://kefu6.kuaishang.cn/bs/im.htm?cas=13003___383498&fi=13063" style="display:block;margin:10px 0 15px;" target=_blank><img src="__PUBLIC__/img/kefu1.jpg" border='0' /></a>
		<a href="http://kefu6.kuaishang.cn/bs/im.htm?cas=13001___254766&fi=13061" style="display:block;margin:10px 0;" target=_blank><img src="__PUBLIC__/img/kefu2.jpg" border='0' /></a>
	</div>
	<div class="feedback_button"></div>
</div>
<script type="text/javascript" src="http://kefu6.kuaishang.cn/bs/ks.j?cI=383498&fI=13063" charset="utf-8"></script>
<script>
	$(function(){
		$('#feedback_email').focus(function(){
			if($(this).val() == '请输入您的邮箱')	$(this).val('');
		}).blur(function(){
			if(!$(this).val())	$(this).val('请输入您的邮箱');
		});
		$('#feedback_content').focus(function(){
			if($(this).val() == '在这里留下您的意见')	$(this).val('');
		}).blur(function(){
			if(!$(this).val())	$(this).val('在这里留下您的意见');
		});
		var menuYloc = $(".feedback").offset().top; 
		$(window).scroll(function (){ 
			var offsetTop = menuYloc + $(window).scrollTop() +"px"; 
			$(".feedback").animate({top : offsetTop },{ duration:600 , queue:false }); 
		}); 
		$(".feedback_button").mouseenter(function(){
			$(this).hide();
			$(".feedback").width(120);
			$(".feedback_content").show();
		});
		$('#feedback_close').click(function(){
			$(".feedback").width(46);
			$(".feedback_content").hide();
			$(".feedback_button").show();
		});
		$(".feedback").mouseleave(function(){
			if(($("#feedback_content").val() == '' || $("#feedback_content").val() == '在这里留下您的意见') && ($("#feedback_email").val() == '' || $("#feedback_email").val() == '请输入您的邮箱')){
				$(".feedback").width(46);
				$(".feedback_content").hide();
				$(".feedback_button").show();
			}
		});
		$("*[class!=feedback]").click(function(){
			if(($("#feedback_content").val() == '' || $("#feedback_content").val() == '在这里留下您的意见') && ($("#feedback_email").val() == '' || $("#feedback_email").val() == '请输入您的邮箱')){
				$(".feedback").width(46);
				$(".feedback_content").hide();
				$(".feedback_button").show();
			}
		});
		$('#sub_feedback').click(function(){
			var content = $('#feedback_content').val();
			var email = $('#feedback_email').val();
			if(content != '在这里留下您的意见'){
				$.post('<?php echo U("member/feedback");?>',{content : content, email : email},function(data){
					if(data.status == '1'){
						layer.alert(data.info,-1);
						$("#feedback_content").val('');
						$("#feedback_email").val('');
						$(".feedback").width(46);
						$(".feedback_content").hide();
						$(".feedback_button").show();
					}else{
						layer.alert(data.info,-1);
					}
				});
			} else {
				layer.alert('您忘记写反馈的内容了！',-1);
			}
		});
	});
	
	//百度统计
	var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F287083f19481e4a2a0e7db232e8085cc' type='text/javascript'%3E%3C/script%3E"));
	
</script>
</body>
</html>