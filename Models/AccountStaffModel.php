<?php

namespace Models;

use Core\Model;

class AccountStaffModel extends Model
{
	public function checkLogin($username, $password)
	{
		$Query = "SELECT * 
		FROM account WHERE username = '$username' AND password = '$password';
		";
		return $this->SelectRow($Query);
	}

	public function getStaffInfo($accountInfo) {
		$role = $accountInfo['role'] == '1' ? 'employee' : 'doctor';
		$Query = "SELECT * 
		FROM $role WHERE accID = ".$accountInfo['accID']."";
		return $this->SelectRow($Query);
	}

}
