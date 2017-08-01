<?php
// $Id$

/**
 * Controller_User 控制器
 */
class Controller_User extends Controller_Abstract {
	function actionIndex() {
		// 为 $this->_view 指定的值将会传递数据到视图中
		// $this->_view['text'] = 'Hello!';
	}
	function actionlogin() {
		// 为 $this->_view 指定的值将会传递数据到视图中
		// $this->_view['text'] = 'Hello!';
	}
	function actionregister() {
		// 为 $this->_view 指定的值将会传递数据到视图中
		$form_error = User::meta()->validate($_POST);
		$form = new Form_userLogin();
		
		if ($this->_context->isPOST()&&empty($form_error))
		{
			try {				
				$user = new User ( $this->_context->post () );
				$user->save();
				dump($user->id());

			} catch ( AclUser_DuplicateUsernameException $ex ) {
				$form ['username']->invalidate ( "您要注册用户名 {$user->username} 已经存在了" );
			}
		}
		
		if ($this->_context->isPOST())$this->_view ["forminfo"] = $form_error;
	}
}


