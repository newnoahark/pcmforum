<?php $this->_extends('_layouts/default_layout'); ?>
<?php $this->_block('layoutcss')?>
<!-- 独立的内敛框架css -->
	<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/editessay.css">
<?php $this->_endblock(); ?>
<?php $this->_block('content')?>
	<div class="article-title">
		<p>标题</p>
		<form>
			<input class = "form-title" type="text" name="title" placeholder = "输入标题" ></input>	
			<div class="edit"  contenteditable="true"></div>
		</form>
	</div>	

<?php $this->_endblock(); ?>