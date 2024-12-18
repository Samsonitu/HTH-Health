<?php

namespace Models\DoctorModels;

use Core\Model;

class DrGetPatientIDModel extends Model
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

	

	public function getPatientPresent($medicalID)
	{
		$query = "SELECT
									p.*, m.*, GROUP_CONCAT(s.serviceName) AS serviceNames
							FROM
									patien p
							JOIN
									medicalform m ON p.ID = m.patienID
							JOIN
									medicaldetailform md ON m.ID = md.formID
							JOIN
									service s ON md.serviceID = s.serviceID
							WHERE
									m.ID = ? AND m.status = 1
							GROUP BY
									p.ID, m.ID
							LIMIT 0, 1;
							";  // Lấy 1 bệnh nhân đang tiếp nhận

		return $this->SelectRow($query, [$medicalID]);
	}
}
