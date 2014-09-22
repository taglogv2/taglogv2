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

<link rel="stylesheet" href="Public/css/style.css"/>
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
</head>
<body class="overflow-hidden">
	<!--st head-navigator-->
	<div class="head">
		<a class="head-logo" href="__ROOT__">
				<img src="Public/css/img/yhb_logo.png">
		</a>
		<div class="head-nav flr">
			<ul>
				<li class="head-dropdown" >
				<!-- can not use tag a, use span instead -->
					<span class="head-link">
						<i class="glyphicon glyphicon-cog"></i><?php echo session('email');?><b class="caret"></b>
						<ul class="head-dropdown-menu">
							<li><a class="need-save" href="<?php echo U('member/home');?>">账号设置</a></li>
							<li><a class="need-save" href="<?php echo U('member/logout');?>">退出</a></li>
						</ul>
					</span>
				</li>
			<li><a class="need-save"  href="<?php echo U('member/home','act=message');?>"><i class="glyphicon glyphicon-bell"></i>通知</a></li>
			<li><a class="need-save"  href="<?php echo U('member/index');?>"><i class="glyphicon glyphicon-book"></i>我的说明书</a></li>
		</div>
	</div>
	<!--end -->
	<div class="home-wrapper">
		<div class="home-left left-pane">
			<ul>
				<li><a href="<?php echo U('member/home');?>"><i class="glyphicon glyphicon-cog"></i>个人设置</a></li>
				<li class="active"><a><i class="glyphicon glyphicon-asterisk"></i>公司设置</a></li>
				<li><a href="<?php echo U('member/home','act=avatar');?>"><i class="glyphicon glyphicon-picture"></i>公司logo</a></li>
				<li><a href="<?php echo U('member/home','act=message');?>"><i class="glyphicon glyphicon-bell"></i>站内通知</a></li>
				<li><a href="<?php echo U('member/home','act=resetpassword');?>"><i class="glyphicon glyphicon-bell"></i>修改密码</a></li>
			</ul>
		</div>
		<div class="home-right">
			<div class="home-container">
				<div class="home-head">
					<h5>公司设置</h5>
				</div>
				<div class="home-content">
					<div class="home-personal">
						<form class="form-horizontal" role="form">
						  <div class="form-group">
						    <label for="inputText3" class="col-sm-2 control-label">公司名称:</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputEmail3" placeholder="公司名称" autocomplete="off">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputText3" class="col-sm-2 control-label">公司说明:</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputPassword3" placeholder="公司说明">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputText3" class="col-sm-2 control-label">网店链接:</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputPassword3" placeholder="网店链接">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputText3" class="col-sm-2 control-label">公司电话:</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputPassword3" placeholder="公司电话">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-4">
						      <button type="submit" class="btn btn-primary">保存</button>
						    </div>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
  
   <!--  <div class="w980 main_table">
		<div class="member_box">
			<div class="member_about">
	<div class="avatar">
		<div class="fr">
			<?php if($member['avatar']): ?><img src="<?php echo ($member["avatar"]); ?>"/><?php else: ?><img src="http://yhb360.qiniudn.com/images/avatar.png"/><?php endif; ?>
		</div>
	</div>
	<div class="about_info">
		<div class="user_about_info">
			<div class="fr"><span>说明书总数：</span><span class="count"><?php echo ($member["product_count"]); ?>份</span> <a href="<?php echo U('member/index');?>"><span>管理</span></a></div>
			<span class="user_nick"><?php echo ($member["email"]); ?>  &nbsp; </a></span>
		</div>
		<div class="user_count_info">
			<div class="fr">上次登录时间：<span><?php echo (date("Y-m-d H:i:s",$member["last_login_time"])); ?></span></div>
			
			<?php if($member['avatar']): ?><input name="check_logo" id="check_logo" type="checkbox" <?php if($member['check_logo']): ?>checked="checked"<?php endif; ?>vlaue="1"/>将此logo插入到二维码中<?php endif; ?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
	$(function(){
		$("#check_logo").click(function(){
			var checked = $(this).prop("checked");
			$.get('<?php echo U("member/setqrlogo","checked=");?>'+checked,function(data){
				if(data.status != '1'){
					layer.msg('设置失败了：网络异常，请稍后重试', 1);
					$("#check_logo").prop("checked","");
				}
			});
		});
	});
</script>
			<div class="member_info">
				<ul class="info_name">
					<li class="active"><a href="<?php echo U('member/home');?>">商家资料</a></li>
					<li><a href="<?php echo U('member/home','act=avatar');?>">设置logo</a></li>
					<li><a href="<?php echo U('member/home','act=message');?>"><a href="<?php echo U('member/home','act=message');?>">站内通知<?php if($message_alert_count > 0): ?><span style="color: red;">(<?php echo ($message_alert_count); ?>)</span><?php endif; ?></a></a></li>
					<li><a href="<?php echo U('member/home','act=resetpassword');?>">修改密码</a></li>
				</ul>
				<div class="info_box">
					<div class="info_title"><span>公司信息:</span></div>
					<div class="info_list">
						<span class="info_list_name">电话:</span>
						<span class="info_value"> <?php echo ($member["phone_number"]); ?> </span>
						<a class="changecontent" rel="phone_number"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
					<div class="info_list">
						<span class="info_list_name">qq号:</span>
						<span class="info_value"> <?php echo ($member["qq"]); ?> </span>
						<a class="changecontent" rel="qq"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
					<div class="info_list">
						<span class="info_list_name">公司全称:</span>
						<span class="info_value"> <?php echo ($member["company_name"]); ?> </span>
						<a class="changecontent" rel="company_name"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
					<div class="info_list">
						<span class="info_list_name">简称:</span>
						<span class="info_value"> <?php echo ($member["short_name"]); ?> </span>
						<a class="changecontent" rel="short_name"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
					<div class="info_list">
						<span class="info_list_name">公司官网:</span>
						<span class="info_value"> <?php if($member['company_website']): ?><a target="_blank" href="<?php echo ($member["company_website"]); ?>"><?php echo ($member["company_website"]); ?></a><?php endif; ?>  </span>
						<a class="changecontent" rel="company_website"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
					<div class="info_list">
						<span class="info_list_name">网店链接:</span>
						<span class="info_value"> <?php if($member['company_salelink']): ?><a target="_blank" href="<?php echo ($member["company_salelink"]); ?>"><?php echo ($member["company_salelink"]); ?></a><?php endif; ?>  </span>
						<a class="changecontent" rel="company_salelink"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
					<div class="info_list">
						<span class="info_list_name">公司地址:</span>
						<span class="info_value"> <?php echo ($member["company_address"]); ?>  </span>
						<a class="changecontent" rel="company_address"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
					<div class="info_list">
						<span class="info_list_name">公司说明:</span>
						<span class="info_value"><?php if($member['company_description']): ?><pre> <?php echo ($member["company_description"]); ?> </pre><?php endif; ?></span>
						<a class="changecontent" rel="company_description"  href="javascript:void(0)"> <img src="http://yhb360.qiniudn.com/images/edit_p.png"></a>
					</div>
				</div>
			</div>
		</div>
    </div> -->
    <!--
<script type="text/javascript">
/*	var add_temp = '';

	function ajax_edit_category(obj){
		if($(obj).val() != add_temp){
			$.post('<?php echo U("member/updateinfo");?>', {name:$(obj).attr('rel'),value:$(obj).val()}, function(data){
				if(data.status == 1){
					if($(obj).attr('rel') == 'short_name') location.reload() ;
					if($(obj).attr('rel') == 'company_website' || $(obj).attr('rel') == 'company_salelink') {
						$(obj).before('<span><a target="_blank" href="' + data.data + '">' + data.data + '</a></span>');
					}else if($(obj).attr('rel') == 'company_description') {
						$(obj).before('<span class="info_value"><pre>' + data.data + '</pre></span>');
					}else{
						$(obj).before('<span class="info_value">' + data.data + '</span>');
					}
					
					$(obj).remove();
				}else{
					$(obj).before('<span class="info_value">' + add_temp + '</span>');
					$(obj).remove();
				}
			});
		}else{
			$(obj).before('<span class="info_value">' + add_temp + '</span>');
			$(obj).remove();
		}
		$("a[rel="+$(obj).attr('rel')+"]").show();
		return true;
	}
	$(function(){
		$('.changecontent').click(function(){
			add_temp = $(this).prev().text();
			var name = $(this).attr('rel');
			if(name == 'company_description'){
				var $html = '<textarea style="text-align: left;text-align: left;width: 500px;height: 80px;" rel="'+ name + '" id="edit_category" onblur="ajax_edit_category(this)">'+ add_temp +'</textarea>';
			}else if(name == 'company_address'){
				var $html = '<input style="width:400px;" type="text" style="text-align: center;" rel="'+ name +'" value="'+ add_temp +'" id="edit_category" onblur="ajax_edit_category(this)"/>';
			}else{
				var $html = '<input type="text" style="min-width:200px;text-align: center;" rel="'+ name +'" value="'+ add_temp +'" id="edit_category" onblur="ajax_edit_category(this)"/>';
			}
			$(this).parent().children('span').eq(1).remove();
			$(this).before($html);
			$(this).hide();
			$('#edit_category').focus();
		});

	});
	*/
</script>-->
</body>

</html>