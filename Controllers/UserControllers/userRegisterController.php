<?php

namespace Controllers\UserControllers;

use Models\UserModels\userRegisterModel;

class userRegisterController extends \Core\BaseController
{
	protected string $Model = "UserModels\userRegisterModel";
	public function FormUserRegister()
	{
		if (isset($_POST['register']) && $_POST['register']) {

			$userName = $_POST['userName'];
			$email = $_POST['email'];
			$phone = $_POST['phoneNumber'];
			$pass = $_POST['password'];
			$getUser = new userRegisterModel();
			$insertUser = $getUser->userReg($userName, $email, $phone, $pass);


			if ($insertUser) {
				$_SESSION['userRegister'] = $insertUser;
			}
		}
		view('UserViews/userRegisterView');
	}
}
