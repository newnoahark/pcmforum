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
	//用户登录
	function actionlogin() {
		// 为 $this->_view 指定的值将会传递数据到视图中
		// $this->_view['text'] = 'Hello!';
		if($this->_context->isPOST()){
			$userdata =  new User();
			$userpost = $this->_context->post();
			//将表单转化为对象
			$userpost = is_array($userpost) ? (object)$userpost :$userpost;

			try {

				$temp = $userdata->find("account = ?",$userpost->login)->query();
				
				//qeephp框架设计的验证密码账号登陆的，但是封装得太厉害，数据库中只能用username存储用户名,
				// 用别的变量命名就会找不到。
				//$user = User::meta()->validateLogin($userpost->login,$userpost->password);
				if($temp->account!=$userpost->login){
					throw new Exception("用户名不存在");
				}
	
				if($temp->password!=md5($userpost->password)) {

					throw new Exception("密码错误");
				}

				$this->_app->changeCurrentUser($temp->aclData(), 'MEMBER');
				$this->_view ["userinfo"]  = $this->_app->currentUser();
				return $this->_redirect(url('default/index'));
	
			} catch (Exception  $e) {
				$this->_view ["forminfo"] = array("loginmsg"=>$e->getMessage());
			}
		}
	}
	//用户注销
	function actionlogout() {
		$this->_app->cleanCurrentUser();
		return $this->_redirect(url('default/index'));

	}	
	//用户注册
	function actionregister() {
		// 为 $this->_view 指定的值将会传递数据到视图中
		$form_error = User::meta()->validate($_POST);
		$form = new Form_userLogin();
		
		if ($this->_context->isPOST()&&empty($form_error))
		{
			try {				
				$user = new User ( $this->_context->post());
				$user->save();
				//dump($user->id());

			} catch ( AclUser_DuplicateUsernameException $ex ) {
				$form ['username']->invalidate ( "您要注册用户名 {$user->username} 已经存在了" );
			}
		}
		
		if ($this->_context->isPOST())$this->_view ["forminfo"] = $form_error;
	}
}


