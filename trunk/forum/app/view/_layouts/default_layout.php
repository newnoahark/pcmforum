
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


<title>论坛<?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/index.css">
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
</head>
<body>
<div class="header">
	<div class="header-center">
		<div class="leftmenu">
			<div class="imglog"><a href="<?php echo url('default/index') ?>">img</a></div>
			<div class="contextlog">log</div>
		</div>
		<div class="rightmenu">
			<div class="usermenu">
				<ul>
					<li  onmouseover="showsub(this)" onmouseout="hidesub(this)"><a href="#">用户</a>
						<ul>
							<li><a href="<?php echo url('user/login') ?>">登录</a></li>
							<li><a href="<?php echo url('user/register') ?>">注册</a></li>
							<li><a href="#">退出</a></li>
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
<div class="photocenter" style="display:<?php $this->_block('photocenter'); ?><?php $this->_endblock(); ?>">	
</div>
<?php $this->_block('content'); ?><?php $this->_endblock();?>
</body>
</html>