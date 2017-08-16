
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


<title>论坛<?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/index.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/listcenter.css">
<?php $this->_block('link'); ?><?php $this->_endblock(); ?>
	<script type="text/javascript">
		function showsub(li){ 
		 var submenu=li.getElementsByTagName("ul")[0]; 
			 submenu.style.display="block"; 
			} 
		function hidesub(li){ 
			 var submenu=li.getElementsByTagName("ul")[0]; 
			 submenu.style.display="none"; 
			}
	</script>
	<!-- 根据需求动态添加的css样式 -->
	<?php  $this->_block("layoutcss"); ?>
	<?php $this->_endblock(); ?>

</head>
<body>
<div class="header">
	<div class="header-center">
		<div class="leftmenu">
			<div class="imglog">
				<a href="<?php echo url('default/index') ?>">
					<img src="<?php echo $_BASE_DIR; ?>img/dog.jpg" style="width:50px;height: 90%; ">
				</a>
			</div>
			<div class="contextlog"><a href="<?php echo url('file/filestylesave') ?>">log</a></div>
		</div>
		<div class="rightmenu">
			<div class="usermenu">
				<ul>
					<li  onmouseover="showsub(this)" onmouseout="hidesub(this)">
						<a href="#">
							<?php  echo isset($_SESSION["acl_forum_userdata"]["username"]) ?  $_SESSION["acl_forum_userdata"]["username"]:'用户';?>
						</a>	
							<ul>
							<li style="display:<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? "none" :' block';?>">
								<a href="<?php echo url('user/login') ?>">登录</a>
							</li>
							<li style="display:<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? "block" :' none';?>">
								<a href="<?php echo url('essay/index') ?>">写博客</a>
							</li>
							<li style="display:<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? "none" :' block';?>">
								<a href="<?php echo url('user/register') ?>">注册</a>
							</li>
							<li style="display:<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? "block" :' none';?>">
								<a href="<?php echo url('fileupload/upload') ?>">上传</a>
							</li>
							<li><a href="<?php echo url('user/logout') ?>">退出</a></li>
						</ul>
					</li>
				</ul>				
			</div>
			<div class="search">
				<form class="serch-form">
					<input class="forminput" type="text" name="serch-content" placeholder="请输入搜索内容">
					<button type="submit" value="搜索">搜索</button>
				</form>
			</div>			
		</div>	
	</div>
</div>
<div class="photocenter" style="display:<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? "none" :' block';?>">	
</div >
	<div class="divCentre">
		<?php $this->_block('content'); ?><?php $this->_endblock();?>
	</div>
</body>
</html>
