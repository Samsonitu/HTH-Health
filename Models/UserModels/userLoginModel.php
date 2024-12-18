<?php

namespace Models\UserModels;

use Core\Model;

class userLoginModel extends Model
{
	public function FormLogin($userName, $pass)
	{
		$Query = "SELECT * FROM `user` WHERE `userName` = '$userName' AND `pass` = '$pass'";
		return $this->SelectRow($Query);
	}
}
