<?php
// $Id$

/**
 * Controller_Fileupload 控制器
 */
class Controller_Fileupload extends Controller_Abstract
{

	function actionIndex()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
	}

	function actionupload() {
		if($this->_context->isPOST()){
			
			$fileupload = new Form_fileupload();
			$fileupload->import($_FILES["file"]);
			// dump($fileupload->values());
			$a = new Filetype();
		
			//dump($a->judefiletype($fileupload->values()));

		}

	}
}


