<?php

namespace Models\DoctorModels;

use Core\Model;

class WaitingExamModel extends Model
{
	public function getWaitingExamList()
	{
		$query = "SELECT m.formID, p.patientCode, p.patientName, GROUP_CONCAT(s.serviceName SEPARATOR ' - ') AS serviceNames, m.createAt, m.status
			FROM medical_form as m

			INNER JOIN patient as p ON p.patientCode = m.patientCode
			INNER JOIN medical_form_details as md ON md.formID = m.formID
			INNER JOIN services as s ON md.serviceID = s.serviceID

			WHERE DATE(m.createAt) = CURRENT_DATE() AND m.status !=2
		
			GROUP BY m.formID, p.patientCode, p.patientName, m.createAt, m.status;";
		return $this->SelectRow($query);
	}

	public function receptionPatient($medicalPatientForm)
	{
		$query1 = "UPDATE `medical_form` 
		SET `status` = 1 
		WHERE `formID` = ? AND patientCode = ?";
		$result1 = $this->UpdateRow($query1, [$medicalPatientForm['formID'], $medicalPatientForm['patientCode']], true);
		if(!$result1) return false;
		return $medicalPatientForm['formID'];
	}
}