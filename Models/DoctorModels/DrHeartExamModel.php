<?php

namespace Models\DoctorModels;

use Core\Model;

class DrHeartExamModel extends Model
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

	public function insertForm($patientID, $heartRate, $heartSound, $breathingRate, $bloodPressure, $oxygenSaturation, $temperature, $followUpAppointmentDate, $doctorInstructions, $generalConclusion)
	{
		// Chỉnh sửa câu truy vấn SQL
		$query = "INSERT INTO `hearexamination`(`patienID`, `heartRate`, `heartSound`, `breathingRate`, `bloodPressure`, `oxygenSaturation`, `temperature`, `followUpAppointmentDate`, `doctorInstructions`, `generalConclusion`)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		// Xử lý followUpAppointmentDate
		$followUpAppointmentDate = !empty($followUpAppointmentDate) ? $followUpAppointmentDate : null;

		// Mảng giá trị truyền vào câu truy vấn
		$value = [$patientID, $heartRate, $heartSound, $breathingRate, $bloodPressure, $oxygenSaturation, $temperature, $followUpAppointmentDate, $doctorInstructions, $generalConclusion];

		return $this->InsertRow($query, $value, true);
	}


	public function updatePatientStatus($medicalID)
	{
		$query = "UPDATE `medicalform` SET `status` = 2 WHERE `ID` = ?";
		return $this->UpdateRow($query, [$medicalID]);
	}


	public function getDataInsert($insertedID)
	{
		$query = "SELECT `patien`.*, `hearexamination`.*, `medicalform`.`symptoms`
              FROM `patien`
              JOIN `hearexamination` ON `patien`.`ID` = `hearexamination`.`patienID`
              LEFT JOIN `medicalform` ON `patien`.`ID` = `medicalform`.`patienID`
              WHERE `hearexamination`.`ID` = ?";
		return $this->SelectRow($query, [$insertedID]);
	}


	// public function getListHistory($patientID)
	// {
	// 	$query = "SELECT `patien`.*, `hearexamination`.*, `medicalform`.`date`
	//             FROM `patien`
	//             JOIN `hearexamination` ON `patien`.`ID` = `hearexamination`.`patienID`
	//             LEFT JOIN `medicalform` ON `patien`.`ID` = `medicalform`.`patienID`
	//             LEFT JOIN `medicaldetailform` ON `medicalform`.`ID` = `medicaldetailform`.`formID`
	//             WHERE `medicaldetailform`.`serviceID` = 1 AND `patien`.`ID` = ?
	//             ORDER BY `medicalform`.`date` DESC;";
	// 	return $this->SelectRow($query, [$patientID]);
	// }
}
