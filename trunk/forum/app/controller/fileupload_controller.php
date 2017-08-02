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
			//dump($_FILES["file"]);
			$filetype = new Filetype();
			$str1 = "";
			preg_match("/\S+\/(\S+)/",$_FILES["file"]["type"],$_all);
			dump($_all[1]);
			$filetyperesult = $filetype->find("limit_format like ? ","%".$_all[1]."%")->getOne();
			dump ($filetyperesult->file_name);
		}

	}
}


