<?php

namespace Controllers\UserControllers;

use Models\UserModels\UserLoginModel;

class userLoginController extends \Core\BaseController
{
	protected string $Model = "UserModels\UserLoginModel";
	public function FormUserLogin()
	{
		if (isset($_POST['userLogin']) && $_POST['userLogin']) {

			$userName = $_POST['userName'];
			$pass = $_POST['password'];
			$logUser = $this->Database->FormLogin($userName, $pass);


			if ($logUser) {
				$_SESSION['userLogin'] = $logUser;
				redirect('/');
			}
		}
		view('UserViews/UserLoginView');
	}
}
