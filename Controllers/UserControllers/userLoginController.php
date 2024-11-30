<?php

namespace Controllers\UserControllers;

use Models\UserModels\userLoginModel;

class userLoginController extends \Core\BaseController
{
	protected string $Model = "UserModels\userLoginModel";
	public function FormUserLogin()
	{
		view('UserViews/UserLoginView');
	}
}
