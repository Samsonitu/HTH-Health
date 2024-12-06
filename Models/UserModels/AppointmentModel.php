<?php

namespace Models\UserModels;

use Core\Model;

class AppointmentModel extends Model
{
	public function getAppt($apptCode, $manifest, $apptDate, $apptTime)
	{
		$Query = "INSERT INTO `appointment`(`apptCode`, `manifest`, `apptDate`, `apptTime`)
		VALUES(?, ?, ?, ?)";
		$value = [$apptCode, $manifest, $apptDate, $apptTime];
		return $this->InsertRow($Query, $value);
	}

	public function updateAppt($manifest, $apptDate, $apptTime)
	{
		$Query = "INSERT INTO `appointment`(`manifest`, `apptDate`, `apptTime`)
		VALUES(?, ?, ?)";
		$value = [$manifest, $apptDate, $apptTime];
		return $this->InsertRow($Query, $value);
	}
	public function checkAppt()
	{
		$Query = "SELECT `apptCode` FROM `appointment`";
		return $this->SelectRow($Query);
	}
	public function getPnt($patientName, $birthday, $gender)
	{
		$Query = "INSERT INTO `patient`(`patientName`, `birthday`, `gender`)
		VALUES(?, ?, ?)";
		$value = [$patientName, $birthday, $gender];
		return $this->InsertRow($Query, $value);
	}
	public function getGrd($guardianName, $phoneNumber)
	{
		$Query = "INSERT INTO `guardian`(`guardianName`, `phoneNumber`)
		VALUES(?, ?)";
		$value = [$guardianName, $phoneNumber];
		return $this->InsertRow($Query, $value);
	}
}
