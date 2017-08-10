<?php $this->_extends('_layouts/default_layout'); ?>
<?php $this->_block('user')?>
<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? $_SESSION["acl_forum_userdata"]["username"] :'用户'; ?>
<?php $this->_endblock(); ?>

<?php //登陆后  登陆选择的标签不可见 ?>
<?php $this->_block('logindisplay')?>
<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? "none" :' block'; ?>
<?php $this->_endblock(); ?>

<!-- 登录后 注册标签不可见 -->
<?php $this->_block('registerdisplay')?>
<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? "none" :' block'; ?>
<?php $this->_endblock(); ?>

<?php //图片不可见 ?>
<?php $this->_block('photocenter')?>
<?php echo "inline";?>
<?php $this->_endblock(); ?>
<?php $this->_block('content')?>
<?php if(1==1): ?>
	<?php //显示文章?>
	<!-- 定义中心表的标签 -->

	 </style>
	<div class="list-center">
		<ul>
		<?php for ($i=0; $i <10 ; $i++) :?>
			<li>
				<div class="author">
					<?php echo  date("m-d h:i:s"); ?>
				</div>
				<p class="article-title">
					<?php echo $i."标题"; ?>
				</p>
				<p class="atricle-centent">
					<?php echo $i."内容"; ?>
				</p>
				
			</li>
		<?php endfor; ?>
		</ul>
	</div>
<?php endif; ?>
<?php $this->_endblock(); 
?>



