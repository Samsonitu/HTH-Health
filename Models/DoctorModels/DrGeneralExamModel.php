<?php

namespace Models\DoctorModels;

use Core\Model;

class DrGeneralExamModel extends Model
{
	// hiển thị thông tin bệnh nhân
	public function renderInforPatient($patientID)
	{
		$query = "SELECT `patien`.*, `medicalform`.*
							FROM `patien`
							LEFT JOIN `medicalform` ON `patien`.`ID` = `medicalform`.`patienID`
							WHERE `patien`.`ID` = ?;
							";
		return $this->SelectRow($query, [$patientID]);
	}

	// insert thông tin khám bệnh
	public function insertForm($patientID, $height, $weight, $bmi, $chestMeasurement, $waistMeasurement, $thighMeasurement, $bloodPressure, $heartRate, $temperature, $respiratoryFunction, $cholesterolLevel, $bloodSugarLevel, $generalConclusion, $doctorInstructions, $followUpAppointmentDate)
	{
		// Chỉnh sửa câu truy vấn SQL
		$query = "INSERT INTO `generalmedicalexamination`( `patientID`, `height`, `weight`, `bmi`, `chestMeasurement`, `waistMeasurement`, `thighMeasurement`, `bloodPressure`, `heartRate`, `temperature`, `respiratoryFunction`, `cholesterolLevel`, `bloodSugarLevel`, `generalConclusion`, `doctorInstructions`, `followUpAppointmentDate`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		// Xử lý followUpAppointmentDate
		$followUpAppointmentDate = !empty($followUpAppointmentDate) ? $followUpAppointmentDate : null;

		// Mảng giá trị truyền vào câu truy vấn
		$value = [$patientID, $height, $weight, $bmi, $chestMeasurement, $waistMeasurement, $thighMeasurement, $bloodPressure, $heartRate, $temperature, $respiratoryFunction, $cholesterolLevel, $bloodSugarLevel, $generalConclusion, $doctorInstructions, $followUpAppointmentDate];


		return $this->InsertRow($query, $value, true);
	}

	public function updatePatientStatus($medicalID)
	{
		$query = "UPDATE `medicalform` SET `status` = 2 WHERE `ID` = ?";
		return $this->UpdateRow($query, [$medicalID]);
	}

	public function getDataInsert($insertedID)
	{
		$query = "SELECT `patien`.*, `generalmedicalexamination`.*, `medicalForm`.`symptoms`
							FROM `patien`
							JOIN `generalmedicalexamination` ON `patien`.`ID` = `generalmedicalexamination`.`patientID`
							LEFT JOIN `medicalform` ON `patien`.`ID` = `medicalform`.`patienID`
							WHERE `generalmedicalexamination`.`ID` = ?";
		return $this->SelectRow($query, [$insertedID]);
	}

	// public function getListHistory($patientID)
	// {
	// 	$query = "SELECT `patien`.*, `generalmedicalexamination`.*, `medicalForm`.`date`
	// 						FROM `patien`
	// 						JOIN `generalmedicalexamination` ON `patien`.`ID` = `generalmedicalexamination`.`patientID`
	// 						LEFT JOIN `medicalform` ON `patien`.`ID` = `medicalform`.`patienID`
	// 						LEFT JOIN `medicaldetailform` ON `medicalform`.`ID` = `medicaldetailform`.`formID`
	// 						WHERE `medicaldetailform`.`serviceID` = 1 AND `patien`.`ID` = ?
	// 						ORDER BY `medicalform`.`date` DESC;
	// 	";
	// 	return $this->SelectRow($query, [$patientID]);
	// }
}
