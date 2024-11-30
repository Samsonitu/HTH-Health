<?php

namespace Controllers\UserControllers;

use Models\UserModels\UserLoginModel;

class userLoginController extends \Core\BaseController
{
	protected string $Model = "UserModels\UserLoginModel";
	public function FormUserLogin()
	{
		view('UserViews/UserLoginView');
	}
}
