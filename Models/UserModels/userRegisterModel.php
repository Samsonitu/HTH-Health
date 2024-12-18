<?php

namespace Models\UserModels;

use Core\Model;

class userRegisterModel extends Model
{
	public function userReg($userName, $email, $phone, $pass)
	{
		$Query = "INSERT INTO `user`(`userName`, `email`, `phone`, `pass`)
		VALUES(?, ?, ?, ?)";
		$value = [$userName, $email, $phone, $pass];
		return $this->InsertRow($Query, $value);
	}
}
