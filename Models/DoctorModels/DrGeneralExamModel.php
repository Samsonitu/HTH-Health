<?php

namespace Models\DoctorModels;

use Core\Model;

class DrGeneralExamModel extends Model
{
	// hiển thị thông tin bệnh nhân
	public function renderInforPatient($patientCode, $formID)
	{
		$query = "SELECT `patient`.*, `medical_form`.*
								FROM `patient`
								LEFT JOIN `medical_form` ON `patient`.`patientCode` = `medical_form`.`patientCode`
								WHERE `patient`.`patientCode` = '$patientCode' AND `medical_form`.`formID` = '$formID';
							";
		return $this->SelectRow($query);
	}

	//check dịch vụ khám
	public function checkService($formID)
	{
		$query = "SELECT s.resultTableName
							FROM services s
							JOIN medical_form_details mfd ON s.serviceID = mfd.serviceID
							JOIN medical_form mf ON mfd.formID = mf.formID
							WHERE mf.formID = ? AND s.resultTableName = 'general_medical_examination';
		";

		return $this->SelectRow($query, [$formID]);
	}

	// insert thông tin khám bệnh
	public function insertForm($info)
	{
		// Chỉnh sửa câu truy vấn SQL
		$query = "INSERT INTO `general_examination`( `patientCode`, `bloodPressure`, `heartRate`, `temperature`, `respiratoryFunction`, `cholesterol`, `bloodSugar`, `height`, `weight`, `bmi`, `chestMeasurement`, `waistMeasurement`, `thighMeasurement`, `followUpAppointmentDate`, `generalConclusion`, `doctorInstructions`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		// Xử lý followUpAppointmentDate
		$followUpAppointmentDate = !empty($followUpAppointmentDate) ? $followUpAppointmentDate : null;

		// Mảng giá trị truyền vào câu truy vấn
		$value = [$info['patientCode'], $info['bloodPressure'], $info['heartRate'], $info['temperature'], $info['respiratoryFunction'], $info['cholesterol'], $info['bloodSugar'], $info['height'], $info['weight'], $info['bmi'], $info['chestMeasurement'], $info['waistMeasurement'], $info['thighMeasurement'], $info['followUpAppointmentDate'], $info['generalConclusion'], $info['doctorInstructions']];


		return $this->InsertRow($query, $value, true);
	}

	// cập nhật trạng thái khám
	public function updateMedicalFormStatus($formID)
	{
		$query = "UPDATE `medical_form` SET `status` = 2 WHERE `formID` = ?";
		return $this->UpdateRow($query, [$formID]);
	}

	public function getDataInsert($insertedID)
	{
		$query = "SELECT DISTINCT
							patient.*,
							general_examination.*,
							medical_form.*,
							guardian.*,
							doctor.*
							FROM patient
							JOIN general_examination
									ON patient.patientCode = general_examination.patientCode
							LEFT JOIN medical_form
									ON patient.patientCode = medical_form.patientCode
							LEFT JOIN guardian
									ON patient.patientCode = guardian.guardianCode
							LEFT JOIN doctor
									ON medical_form.doctorCode = doctor.doctorCode
							WHERE general_examination.ID = ?;
							";
		return $this->SelectRow($query, [$insertedID]);
	}
}
