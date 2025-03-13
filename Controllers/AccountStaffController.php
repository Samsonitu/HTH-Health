<?php

namespace Controllers;

use Models\AccountStaffModel;

class AccountStaffController extends \Core\BaseController
{
	protected string $Model = "AccountStaffModel";
	public function accountStaffLogin()
	{
		if(isset($_POST['btnLogin']) && $_POST['btnLogin']) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$resultLogin = $this->Database->checkLogin($username, $password);
			if(!$resultLogin) redirect('AccountStaffLoginRoute');

			$staffInfo = $this->Database->getStaffInfo($resultLogin[0]);
			if(!$staffInfo) redirect('AccountStaffLoginRoute');


			if($resultLogin[0]['role'] == 1) {
				$_SESSION['employeeInfo'] = $staffInfo[0];
				redirect('MedicalTicketRoute');
			}

			if($resultLogin[0]['role'] == 2) {
				$_SESSION['doctorInfo'] = $staffInfo[0];
				redirect('DrIndexRoute');
			}
			
		}else {
			view('AccountStaff');
		}
	}

	public function accountStaffLogout() {
		unset($_SESSION);
		session_destroy();
		redirect('AccountStaffLoginRoute');
	}
}
