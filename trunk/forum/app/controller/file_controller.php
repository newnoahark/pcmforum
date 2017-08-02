<?php
// $Id$

/**
 * Controller_File 控制器
 */
class Controller_File extends Controller_Abstract
{

	function actionIndex()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
	}
	function actionfilestylesave()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
		//新建一个表单对象
		$a = new Form_filetype();
		if($this->_context->isPOST()&&$a->validate($_POST)) {
			//创建一个filetype对象，并将表单内容存储至数据库中
			try {	

			   $file = new Filetype($a->values());	
			    $file->save();	
			
			 //重定向路由
			 //   return $this->_redirect(url("default/index"));
				}	
			 catch (Exception $e) {
					echo "<script type='text/javascript'>alert('存储异常');</script>";
				}

		}
		
	}
}
?>

