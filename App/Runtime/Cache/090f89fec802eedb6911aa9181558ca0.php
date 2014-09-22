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

<link rel="stylesheet" href="./css/font-awesome/css/font-awesome.min.css" />

<script type="text/javascript" src="./js/nicescroll/jquery.nicescroll.min.js	"></script>

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
    <div class="left-pane">
    	<a href="<?php echo U('product/add');?>" class="add-sms-btn btn btn-primary"><span>新建说明书</span></a>
    	<ul class="left-category">
    		<li class="active">
    			<a href="<?php echo U('member/index');?>">
    				全部分类<span class="category-num">10</span>
    			</a>
    		</li>
			<?php if(is_array($categorylist)): $i = 0; $__LIST__ = $categorylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><li>
    				<a href="<?php echo U('member/index','categoryid='.$category['category_id']);?>" title="<?php echo ($category["name"]); ?>"><?php echo ($category["name"]); ?><span class="category-num">4</span></a>
    				<span class="edit-box">
                			<span data-category="<?php echo ($category["category_id"]); ?>" title="修改分类名称" class="category-edit"><i class="glyphicon glyphicon-pencil"></i></span>
                			<span data-category="<?php echo ($category["category_id"]); ?>" title="删除分类" class="category-delete"><i class="glyphicon glyphicon-remove"></i></span>
                	</span>
                	
    			</li><?php endforeach; endif; else: echo "" ;endif; ?>
    	</ul>
    	<a href="javascript:void(0)" id="add_product_category" class="add add-category">新建分类<i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="category-wrapper">
    	<div class="category-inner">
	    	<div class="category-head">
	    		<div class="clearfix">
		    		<div class="category-head-title">
		    			<h3>我的说明书 - 全部</h3>
		    		</div>
		    		<div class="category-search">
		    			<form>
		    				<input name="search" type="text" placeholder="搜索说明书">
		    				<button type="submit"><i class="fa fa-search"></i></button>
		    			</form>
		    		</div>
	    		</div>
	    	</div>
	    	<div class="category-content">
		    	<div class="category-content-inner">
		    	<table class="table">
				  	<thead> 
						<tr>
							<th>
								<input type="checkbox" id="check_all">
							</th>
							<th width="15%">标题</th>
							<th width="25%">描述</th>
							<th>分类</th>
							<th>
								<div class="th-dropdown">浏览次数<b class="caret"></b>
									<ul>
										<li><a title="升序" href="<?php echo U('member/index','order=hits_up&'.$parameter);?>">升序排列<i <?php if($_GET['order'] == 'hits_up'): ?>style="color:#FF780F;"<?php endif; ?> class="fa fa-arrow-up"></i></a></li> 
										<li><a title="降序" href="<?php echo U('member/index','order=hits_down&'.$parameter);?>">降序排列<i <?php if($_GET['order'] == 'hits_down'): ?>style="color:#FF780F;"<?php endif; ?> class="fa fa-arrow-down"></i></a></li>
									</ul>
								</div>
							</th>
							<th>
								<div class="th-dropdown">
								更新时间<b class="caret"></b>
								<ul>
									<li><a title="升序" href="<?php echo U('product/index','order=ut_up&'.$parameter);?>">升序排列<i <?php if($_GET['order'] == 'ut_up'): ?>style="color:#FF780F;"<?php endif; ?> class="fa fa-arrow-up"></i></a></li> 
									<li><a title="降序" href="<?php echo U('product/index','order=ut_down&'.$parameter);?>">降序排列<i <?php if($_GET['order'] == 'ut_down'): ?>style="color:#FF780F;"<?php endif; ?> class="fa fa-arrow-down"></i></a></li>
								</ul>
								</div>
							</th> 
							<th>
								<div class="th-dropdown">
								创建时间<b class="caret"></b>
								<ul>
									<li><a title="升序" href="<?php echo U('member/index','order=ct_up&'.$parameter);?>">升序排列<i class="fa fa-arrow-up ".<?php if($_GET['order'] == 'ct_up'): ?>active<?php endif; ?>"></i></a></li>
									<li><a title="降序" href="<?php echo U('member/index','order=ct_down&'.$parameter);?>">降序排列<i <?php if($_GET['order'] == 'ct_down'): ?>style="color:#FF780F;"<?php endif; ?> class="fa fa-arrow-down"></i></a></li>
								</ul>
								</div>
							</th> 
							<th>
								<div class="th-dropdown">最近浏览<b class="caret"></b>
									<ul>
										<li><a title="升序" href="<?php echo U('member/index','order=lt_up&'.$parameter);?>">升序排列<i <?php if($_GET['order'] == 'lt_up'): ?>style="color:#FF780F;"<?php endif; ?> class="fa fa-arrow-up"></i></a></li>
										<li><a title="降序" href="<?php echo U('member/index','order=lt_down&'.$parameter);?>">降序排列<i <?php if($_GET['order'] == 'lt_down'): ?>style="color:#FF780F;"<?php endif; ?> class="fa fa-arrow-down"></i></a></li>
									</ul>
								</div>
							</th>
							<th>操作</th>
						</tr>
				    </thead>
					<tbody>
						<?php if($productlist == null): ?><tr>
								<?php if(!$_GET['content']): ?><td colspan="9">----暂无数据！----</td>
								<?php else: ?>
									<td colspan="8">----暂无数据！----</td><?php endif; ?>
							</tr>
						<?php else: ?>
							<?php if(is_array($productlist)): $i = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td>
										<input name="product_id[]" class="check_list" type="checkbox" value="<?php echo ($vo["product_id"]); ?>"/>
									</td>
									<td>
										<a target="_blank" href="index.php?m=product&a=view&product_id=<?php echo ($vo['product_id']); ?>"><?php echo ($vo["name"]); ?></a>
									</td>
									<td><?php echo (msubstr($vo["description"],0,50)); ?></td>
									<td><?php echo ($vo["category"]["name"]); ?></td>
									<td><?php echo ($vo["hits"]); ?></td>
									<td><?php if($vo['update_time'] > 0): echo (date("Y-m-d H:i",$vo["update_time"])); endif; ?></td>
									<td><?php if($vo['create_time'] > 0): echo (date("Y-m-d H:i",$vo["create_time"])); endif; ?></td>
									<td><?php if($vo['last_view_time'] > 0): echo (date("Y-m-d H:i",$vo["last_view_time"])); endif; ?></td>
									<td>
										<a href="<?php echo U('product/edit', 'product_id='.$product['product_id']);?>">
											编辑
										</a>
			                            <a id="category_name<?php echo ($product['product_id']); ?>" data-toggle="dropdown" >
										<span><?php if(empty($product['category'])): ?>分类
										<?php else: ?>
											<?php echo ($product["category"]["name"]); endif; ?></span>
										<!-- <span class="caret"></span>
										<ul class="dropdown-menu">
											<?php if(is_array($categorylist)): $i = 0; $__LIST__ = $categorylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><li><a class="category" rel="<?php echo ($category["category_id"]); ?>" rev="<?php echo ($product['product_id']); ?>" href="#"><?php echo ($category["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	                            		</ul> -->
			                            </a>

										<a href="<?php echo U('product/view', 'product_id='.$vo['product_id']);?>">查看
										</a>
										<a data-product="<?php echo ($vo["product_id"]); ?>" class="input_botton del_product">删除</a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
				</table>
				<div class="category-paginition"> 
					<ul class="pagination">
				      <li class="disabled"><a href="#">首页</a></li>
				      <li class="active"><a href="#">上一页</a></li>
				      <li><a href="#">1<span class="sr-only">(current)</span></a></li>
				      <li><a href="#">2</a></li>
				      <li><a href="#">3</a></li>
				      <li><a href="#">4</a></li>
				      <li><a href="#">5</a></li>
				      <li><a href="#">下一页</a></li>
				      <li><a href="#">末页</a></li>
				   </ul>
				</div>
			</div>

	<script type="text/javascript">
		// @variable temp :used in edit_category input
		var add_temp = '';
		// @variable temp :used in add_category input 
		var temp = '';
		var cataHtml = function(id,val){
				return '<li><a href="<?php echo U("member/index","categoryid=");?>' + id + '" title="'+val+'">'+val+'<span class="category-num">0</span></a><span class="edit-box"><span data-category="'+id+'" title="修改分类名称" class="category-edit"><i class="glyphicon glyphicon-pencil"></i></span><span data-category="'+id+'" title="删除分类" class="category-delete"><i class="glyphicon glyphicon-remove"></i></span></span></li>';
			}

		function ajax_add_category(obj){
			if($(obj).val() != ''){
				temp = $(obj).val();
				$.post(
					'<?php echo U("category/add");?>',
					{name:$(obj).val()},
					function(data){
					if(data.status == '1'){
						console.log(data);
						$(obj).prev().prev().append(cataHtml(data.data,$(obj).val()));
						$(obj).remove();
					}else{
						console.log(data);
						alert(data.info +' 保存失败，请稍候尝试');
						$(obj).remove();
					}
				});
			}else if($(obj).val() == ''){
				$(obj).remove();
			}else if($(obj).val() == '请输入名称'){
				$(obj).remove();
			}
			return true;
		}
		//edit category @param obj input element
		function ajax_edit_category(obj){
			var cat_name = $.trim($(obj).val());
			//if changed
			if(cat_name != '' && cat_name != add_temp){
				$.post('<?php echo U("category/edit");?>',
					{id:$(obj).attr('data-category'),name:cat_name},
					function(data){
					if(data.status == 1){
						$(obj).before(cataHtml(data.data,cat_name));
						$(obj).remove();
						//alert(data.info);
					}else{
						$(obj).before(cataHtml(data.data,add_temp));
						$(obj).remove();
						alert(data.info,-1);
					}
				});
			//input == ''
			}else if(cat_name == ''){
				$(obj).before(cataHtml($(obj).attr('data-category'),add_temp));
				$(obj).remove();
				alert('分类名不能为空:-)',-1);
			}
			//no changes in inputs
			else{
				$(obj).before(cataHtml($(obj).attr('data-category'),add_temp));
				$(obj).remove();
			}
			return true;
		}
		
		function pressEnter(obj,event){
			if(event.keyCode==13) {
				$(obj).blur();
				return false; 
			}  
		}
		
		function pressEditEnter(obj,event){
			if(event.keyCode==13) {
				$(obj).blur();
				return false; 
			}  
		}
		
		$(function(){

			$("#check_all").click(function(){
				$("input[class='check_list']").prop('checked', $(this).prop("checked"));
			});
	/* start category-controls */
			$("#add_product_category").click(function(){
				if($('#add_category').length != 0){
					$('#add_category').focus();
				}else{
					$(this).after('<input type="text" id="add_category" maxlength="12" placeholder="请输入名称"  onkeypress="pressEnter(this,event)" onblur="ajax_add_category(this)" />');
					$('#add_category').focus().select();
				}
			});
			//what is this doing
			/*
			$('.main_table_right').on('propertychange','#add_category', function(){
				var str = $('#add_category').val();
				var new_str = str.replace('请输入名称','');
				$('#add_category').val(new_str);
				$('#add_category').unbind('propertychange');
			});
			*/
			//category-delete 
			$('.left-category').on('click','.category-delete',function(){
				var obj = this;
				if(confirm('确定要删除此分类？')){
						$.get(
							'<?php echo U("category/delete","id=");?>' + $(obj).attr('data-category'),
							function(data){
							if(data.status == '1'){
								$(obj).parent().parent().remove();
							}else{
								alert(data.info+'请稍候重试');
							}
						});
				}
			});
			//category-edit
			$('.left-category').on('click','.category-edit',function(){
				
				//remove the num of span element in $(this)
				var num = $(this).parent().prev().find('span').text().length;
				add_temp = $(this).parent().prev().text().slice(0,-num);
				
				var $html = '<input type="text" style="padding-left:30px;" maxlength="12" data-category="'+ $(this).attr('data-category') +'" value="'+ add_temp +'" id="edit_category" onkeypress="pressEditEnter(this,event)" onblur="ajax_edit_category(this)">';
				
				$(this).parent().parent().before($html);
				$(this).parent().parent().remove();
				
				$('#edit_category').focus();
			});

			//category-click
			/*$('.category').click(function(){
				var product_id = $(this).attr('rev');
				var category_id = $(this).attr('data-category');
				var content = $(this).text()+' <span class="caret"></span>';
				$.get('<?php echo U("product/changecategory");?>' + '&category_id=' + category_id + '&product_id=' +product_id,function(data){
					if(data.status == '1'){
						var category_name = 'category_name'+product_id;
						$('#'+category_name).html(content);
					}else{
						layer.alert(data.info,-1);
					}
				});
			});*/
	/* end category-controls */	
	/* start product-controls */
			//delete product
			$('.del_product').click(function(){
				var obj = this
				var product_id = $(this).attr('data-product');
				if(confirm('该说明书将不可恢复，确认要删除吗？')){
					$.get('<?php echo U("product/delete");?>' + '&product_id=' +product_id,
						function(data){
						if(data.status == 1){
							$(obj).parent().parent().remove();
							alert('删除成功',1,1);
						}else{console.log(data);
							alert(data.info,-1);
						}
					});
				}
			});
			
			$('#sele_del').click(function(){
				var product_ids = '';
				var product_id_array = new Array();
				$('.check_list').each(function(){ 
					if($(this).prop("checked")){
						product_ids += $(this).val();
						product_ids += ',';
						product_id_array.push($(this).val());
					}
				}); 
				if(product_ids){
					if(confirm('说明书将不可恢复，确认要删除吗？')){
						$.get('<?php echo U("product/delete");?>' + '&product_ids=' +product_ids,function(data){
							if(data.status == '1'){
								//var product_id_array = product_ids.split(',');  
								for(var temp in product_id_array){
									var category_name = 'product'+product_id_array[temp];
									$('#'+category_name).remove();
								}
								alert('删除成功',1,1);
							}else{
								alert(data.info,-1);
							}
						});
					}
				}else{
					alert('请选择要删除的项:-)',-1);
				}
				
			});
		});
	</script>
</body>
</html>