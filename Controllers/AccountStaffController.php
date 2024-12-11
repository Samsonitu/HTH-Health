<?php

namespace Controllers;

use Models\AccountStaffModel;

class AccountStaffController extends \Core\BaseController
{
	protected string $Model = "AccountStaffModel";
	public function AccountStaff()
	{
		$this->Database->checkLogin();
		view('AccountStaff');
	}
}
