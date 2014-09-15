<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title>用户宝后台管理系统</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content="用户宝后台管理系统"/>
	<link type="text/css" href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="__PUBLIC__/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet" />
	<link href="__PUBLIC__/css/docs.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>
	<script src="__PUBLIC__/js/jquery-1.9.0.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/WdatePicker.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/5kcrm.js" type="text/javascript"></script>
	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap-ie6.css">
	<![endif]-->
	<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/ie.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
	<![endif]-->
	<!--[if lt IE 9]>
	<link type="text/css" href="__PUBLIC__/css/jquery.ui.1.10.0.ie.css" rel="stylesheet"/>
	<![endif]-->	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="__PUBLIC__/js/respond.min.js"></script>
	<![endif]-->
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div style="line-height: 40px;padding-right: 5px;padding-top: 6px;" class="pull-left"><img src="__PUBLIC__/img/logomini.png"/></div>
			<a class="brand" href="<?php echo (__APP__); ?>" alt="<?php echo C('defaultinfo.description');?>">后台管理系统</a>
			<?php echo W("Navigation");?>
		</div> 
	</div>
</div>
<div class="container">
	<!-- Docs nav ================================================== -->
	<div class="page-header">
		<h4>产品说明书列表</h4>
	</div>
	<ul class="nav nav-tabs">
		<li <?php if(!$_GET['content']): ?>class="active"<?php endif; ?>><a  href="<?php echo U('product/index');?>"><img src="__PUBLIC__/img/customer_icon.png"/>&nbsp; 会员数据</a></li>
		<li <?php if($_GET['content'] == 'free' ): ?>class="active"<?php endif; ?>><a  href="<?php echo U('product/index','content=free');?>"><img src="__PUBLIC__/img/customer_source_icon.png"/>&nbsp; 游客数据</a></li>
	</ul>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
	<p class="view"><b>视图：</b>
	<img src=" __PUBLIC__/img/by_owner.png"/>  <a href="<?php echo U('product/index','content='.$_GET['content']);?>" <?php if($_GET['by']== null): ?>class="active"<?php endif; ?>>全部</a>  | 
	<a href="<?php echo U('product/index','by=today&content='.$_GET['content']);?>" <?php if($_GET['by']== 'today'): ?>class="active"<?php endif; ?>>今日新增</a> | 
	<a href="<?php echo U('product/index','by=week&content='.$_GET['content']);?>" <?php if($_GET['by']== 'week'): ?>class="active"<?php endif; ?>>本周新增</a> | 
	<a href="<?php echo U('product/index','by=month&content='.$_GET['content']);?>" <?php if($_GET['by']== 'month'): ?>class="active"<?php endif; ?>>本月新增</a> &nbsp; &nbsp;
	<a href="<?php echo U('product/index','by=disable&content='.$_GET['content']);?>" <?php if($_GET['by']== 'disable'): ?>class="active"<?php endif; ?>> 已屏蔽</a>
	&nbsp;  &nbsp; <a href="<?php echo U('product/index','by=deleted&content='.$_GET['content']);?>" <?php if($_GET['by']== 'deleted'): ?>class="active"<?php endif; ?>><img src="__PUBLIC__/img/task_garbage.png"/> 回收站</a>
	</p>
	<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<li class="pull-left">
					<a id="delete" class="btn" style="margin-right: 5px;"><i class="icon-remove"></i>删除</a>
				</li>
				<li class="pull-left">
					<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
					<ul class="nav pull-left">
						<li class="pull-left">
							<select style="width:auto" name="field" id="field" onchange="changeCondition()">
								<option class="word" value="name">标题</option>
								<option class="number" value="product_id">ID</option>
								<option class="word" value="description">描述</option>
								<option class="date" value="create_time">添加时间</option>
								<option class="date" value="update_time">更新时间</option>
								<option class="date" value="last_login_date">最后浏览时间</option>
							</select>&nbsp;&nbsp;
						</li>
						<li id="conditionContent" class="pull-left">
						<select id="condition" style="width:auto" name="condition" onchange="changeSearch()">					
								<option value="contains">包含</option>
								<option value="is">是</option>
								<option value="start_with">开始字符</option>
								<option value="end_with">结束字符</option>
								<option value="is_empty">为空</option>
							</select>&nbsp;&nbsp;
						</li>
						<li id="searchContent" class="pull-left">
							<input id="search" type="text" class="input-medium search-query" value="<?php echo ($_GET['search']); ?>" name="search"/>&nbsp;&nbsp;
						</li>
						<li class="pull-left">
							<input type="hidden" name="m" value="product"/>
							<?php if($Think.get.by): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
							<?php if($Think.get.content): ?><input type="hidden" name="content" value="<?php echo ($_GET['content']); ?>"/><?php endif; ?>
							<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"/>  搜索</button>
						</li>
					</ul>
					</form>
				</li>
			</ul>
		</div>
		<div class="span12">
			<form id="form1" method="post">
				<table class="table table-hover table-striped"> 
					<thead> 
						<tr>
							<th><input type="checkbox" id="check_all"/></th>
							<th width="5%">ID</th>
							<th width="15%">标题</th>
							<th width="15%">描述</th>
							<th width="10%">
								<a title="升序" href="<?php echo U('product/index','order=hits_up&'.$parameter);?>"><i <?php if($_GET['order'] == 'hits_up'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-up"></i></a> 
								浏览次数
								<a title="降序" href="<?php echo U('product/index','order=hits_down&'.$parameter);?>"><i <?php if($_GET['order'] == 'hits_down'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-down"></i></a>
							</th>
							<th>
								<a title="升序" href="<?php echo U('product/index','order=ct_up&'.$parameter);?>"><i <?php if($_GET['order'] == 'ct_up'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-up"></i></a> 
								创建时间
								<a title="降序" href="<?php echo U('product/index','order=ct_down&'.$parameter);?>"><i <?php if($_GET['order'] == 'ct_down'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-down"></i></a>
							</th> 
							<th>
								<a title="升序" href="<?php echo U('product/index','order=ut_up&'.$parameter);?>"><i <?php if($_GET['order'] == 'ut_up'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-up"></i></a> 
								更新时间
								<a title="降序" href="<?php echo U('product/index','order=ut_down&'.$parameter);?>"><i <?php if($_GET['order'] == 'ut_down'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-down"></i></a>
							</th>
							<th>
								<a title="升序" href="<?php echo U('product/index','order=lt_up&'.$parameter);?>"><i <?php if($_GET['order'] == 'lt_up'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-up"></i></a> 
								最近浏览
								<a title="降序" href="<?php echo U('product/index','order=lt_down&'.$parameter);?>"><i <?php if($_GET['order'] == 'lt_down'): ?>style="color:#FF780F;"<?php endif; ?> class="icon-arrow-down"></i></a>
							</th>
							<?php if(!$_GET['content']): ?><th>会员</th><?php endif; ?>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tfoot>
						<tr><?php if(!$_GET['content']): ?><td colspan="10"><?php echo ($page); ?></td><?php else: ?><td colspan="9"><?php echo ($page); ?></td><?php endif; ?></tr>
					</tfoot>
					<tbody>
						<?php if($productlist == null): ?><tr>
								<?php if(!$_GET['content']): ?><td colspan="9">----暂无数据！----</td>
								<?php else: ?>
									<td colspan="8">----暂无数据！----</td><?php endif; ?>
							</tr>
						<?php else: ?>
							<?php if(is_array($productlist)): $i = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><input name="product_id[]" class="check_list" type="checkbox" value="<?php echo ($vo["product_id"]); ?>"/></td>
									<td><?php echo ($vo["product_id"]); ?></td>
									<td>
										<?php if($_GET['content'] != 'free'): ?><a target="_blank" href="<?php echo U('member/helplogin','act=showproduct&member_id='.$vo['member_id'].'&product_id='.$vo['product_id']);?>"><?php echo ($vo["name"]); ?></a>
										<?php else: ?>
										<a target="_blank" href="index.php?m=product&a=view&product_id=<?php echo ($vo['product_id']); ?>&verify=<?php echo ($vo['verify']); ?>"><?php echo ($vo["name"]); ?></a><?php endif; ?>
									</td>
									<td><?php echo (msubstr($vo["description"],0,50)); ?></td>
									<td><?php echo ($vo["hits"]); ?></td>
									<td><?php if($vo['create_time'] > 0): echo (date("Y-m-d H:i",$vo["create_time"])); endif; ?></td>
									<td><?php if($vo['update_time'] > 0): echo (date("Y-m-d H:i",$vo["update_time"])); endif; ?></td>
									<td><?php if($vo['last_view_time'] > 0): echo (date("Y-m-d H:i",$vo["last_view_time"])); endif; ?></td>
									<?php if(!$_GET['content']): ?><td>
											<a href="javascript:void(0)" class="member_info" rel="<?php echo ($vo["member"]["member_id"]); ?>"><?php if($vo['member']['short_name']): echo ($vo["member"]["short_name"]); else: echo ($vo["member"]["email"]); endif; ?></a>
										</td><?php endif; ?>
									<td>
										<?php if($_GET['content'] != 'free'): ?><a target="_blank" href="<?php echo U('member/helplogin','act=showproduct&member_id='.$vo['member_id'].'&product_id='.$vo['product_id']);?>">查看/编辑</a>
										<?php else: ?>
										<a target="_blank" href="index.php?m=product&a=view&product_id=<?php echo ($vo['product_id']); ?>&verify=<?php echo ($vo['verify']); ?>">查看/编辑</a><?php endif; ?>
										<?php if($vo['status'] == 1): ?><a id="disable<?php echo ($vo['product_id']); ?>" class="disable" href="javascript:void(0)" rel="<?php echo ($vo['product_id']); ?>">屏蔽</a>
										<?php else: ?>
											<a id="disable<?php echo ($vo['product_id']); ?>" class="disable" href="javascript:void(0)" rel="<?php echo ($vo['product_id']); ?>">恢复</a><?php endif; ?>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
					
				</table>
			</form>
		</div>
	</div>
</div>
<div class="hide" id="dialog-role-info" title="商家信息">loading...</div>
<script type="text/javascript">
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: 650,
	maxHeight: 800,
	position: ["center",100]
});
$(function(){
<?php if($_GET['field']!= null): ?>$("#field option[value='<?php echo ($_GET['field']); ?>']").prop("selected", true);changeCondition();
	$("#condition option[value='<?php echo ($_GET['condition']); ?>']").prop("selected", true);changeSearch();
	$("#search").prop('value', '<?php echo ($_GET['search']); ?>');<?php endif; ?>
	$("#check_all").click(function(){
		$("input[class='check_list']").prop('checked', $(this).prop("checked"));
	});
	$(".disable").click(
		function(){
			var product_id = $(this).attr('rel');
			$.get('<?php echo U("product/disableproduct");?>' + '&product_id=' +product_id,function(data){
				if (data.status == '1') {
					$("#disable"+product_id).html('<font color="red">屏蔽</font>');
				} else if (data.status == '2') {
					$("#disable"+product_id).html('<font color="red">恢复</font>');
				} else if (data.status == '3') {
					location.reload();
				} else {
					alert(data.info);
				}
			});
		}
	);
	$('#delete').click(function(){
		
		<?php if($_SESSION['admin']== 1 and $_GET['by']== 'deleted'): ?>if(confirm('你确定要删除,此操作将不可恢复!')){
				$("#form1").attr('action', '<?php echo U("product/completedelete");?>');
				$("#form1").submit();
			}
		<?php else: ?>
			if(confirm('你确定要删除,删除后将进入回收站!')){
				$("#form1").attr('action', '<?php echo U("product/delete");?>');
				$("#form1").submit();
			}<?php endif; ?>
	});
	
	$(".member_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("member/dialoginfo","id=");?>'+$role_id);
	});
});
</script>

</body>
</html>