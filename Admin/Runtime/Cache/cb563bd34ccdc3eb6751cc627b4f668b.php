<?php if (!defined('THINK_PATH')) exit();?><div class="nav-collapse collapse">
	<ul class="nav"> 
		<li <?php if(strtolower(MODULE_NAME) == 'member'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('member/index');?>">商家列表
</a></li>
		<li <?php if(strtolower(MODULE_NAME) == 'product'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('product/index');?>">说明书列表
</a></li>
		<li <?php if(strtolower(MODULE_NAME) == 'feedback'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('feedback/index');?>">用户反馈
</a></li>
		<li <?php if(strtolower(MODULE_NAME) == 'video'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('video/index');?>">视频管理
</a></li>
		<li <?php if(strtolower(MODULE_NAME) == 'setting'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('setting/index');?>">系统设置
</a></li>
	</ul>
	<ul class="nav pull-right">
		<li style=" width: auto;margin-right: 5px;"><a href="<?php echo U('user/edit');?>" style="padding: 10px 0px;width: auto;">欢迎你，<?php echo (session('admin_name')); ?></a></li>
		<li style=" width: auto;margin-right: 5px;"><a href="<?php echo U('user/logout');?>">退出</a></li>
	</ul>
</div>