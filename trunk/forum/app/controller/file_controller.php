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
	function actionupload()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
		if($this->_context->isPOST()){
			$file = new File();
			dump($file);
			try {
				if($file->error_code>0){
					throw new Exception("error_code:".$file->error_code);	
				}	
			} catch (Exception $e) {
				echo $e->getMessage();				
			}
			if($file->error_code>0){
				return ;
			}
			else {
				$file->save();
			}
		}
	}
}

