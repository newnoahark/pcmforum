<?php
// $Id$

/**
 * Controller_Essay 控制器
 */
class Controller_Essay extends Controller_Abstract
{

	function actionIndex()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
	}

	//创建文章
	function actionwrite() {
		if($this->_context->isPOST()) {
			

		}
	}

}


