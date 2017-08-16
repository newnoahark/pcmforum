<?php $this->_extends('_layouts/default_layout'); ?>
<?php $this->_block('user')?>
<?php echo isset($_SESSION["acl_forum_userdata"]["username"]) ? $_SESSION["acl_forum_userdata"]["username"] :'用户'; ?>
<?php $this->_endblock(); ?>




<!-- 载入注册表单 -->
<?php $this->_block('content')?>
<?php $this->_element('register'); ?>
<?php $this->_endblock(); ?>


