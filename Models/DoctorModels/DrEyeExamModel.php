<?php

namespace Models\DoctorModels;

use Core\Model;

class DrEyeExamModel extends Model
{
	public function renderInforPatient($patientID)
	{
		$query = "SELECT `patien`.*, `medicalform`.*
							FROM `patien`
							LEFT JOIN `medicalform` ON `patien`.`ID` = `medicalform`.`patienID`
							WHERE `patien`.`ID` = ?;
							";
		return $this->SelectRow($query, [$patientID]);
	}
}
