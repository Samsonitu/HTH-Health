<?php

namespace Models\DoctorModels;

use Core\Model;

class ReceptionPatientModel extends Model
{
	public function getReceptionPatient()
	{
		$query = "SELECT
									p.name AS patientName,
									p.ID AS patientID,
									GROUP_CONCAT(s.serviceName) AS serviceNames,
									m.date AS medicalDate,
									m.ID AS medicalID
							FROM
									patien p
							JOIN
									medicalform m ON p.ID = m.patienID
							JOIN
									medicaldetailform md ON m.ID = md.formID
							JOIN
									service s ON md.serviceID = s.serviceID
							WHERE
									m.status = 0
							GROUP BY
									p.ID, m.date, m.ID
							LIMIT 0, 10;

							";
		return $this->SelectRow($query);
	}
}
