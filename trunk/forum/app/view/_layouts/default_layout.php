<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>论坛<?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/index.css">
<?php $this->_block('link'); ?><?php $this->_endblock(); ?>
</head>
<body>
<div class="header">
	<div class="header-center">
		<div class="leftmenu">
			<div class="imglog">img</div>
			<div class="contextlog">log</div>
		</div>
		<div class="rightmenu">
			<div class="usermenu">啊啊</div>
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
