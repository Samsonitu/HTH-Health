<?php

namespace Models\UserModels;

use Core\Model;
use ValueError;

class AppointmentModel extends Model
{
	public function checkPatientCode($patientCode) 
	{	
		$Query = "SELECT patientID, patientCode
		FROM patient
		WHERE patientCode = ?";
		return $this->SelectRow($Query, [$patientCode]);
	}

	public function insertAppointmentTemporary($temporaryInfo, $resultCheckPatientCode = null)
	{
		if($resultCheckPatientCode != null) {
			$apptDateTime = strtotime($temporaryInfo['apptDate'] . ' ' . $temporaryInfo['apptTime']);
			$Query = "INSERT INTO `appointments`
			(`patientID`, `patientCode`, `apptTime`, `symptom`, `createAt`)
			VALUES(?, ?, ?, ?, NOW())";
			return $this->InsertRow($Query, [$resultCheckPatientCode[0]['patientID'], $resultCheckPatientCode[0]['patientCode'] , date('Y-m-d H:i:s', $apptDateTime), $temporaryInfo['symptom']]);
		}else {
			$currentDateTime = date("Y-m-d H:i:s");
			// Insert guardian
				$Query1 = "INSERT INTO `guardian`
				(`guardianName`, `phoneNumber`, `createAt`) 
				VALUES (?, ?, ?)";
				$resultQuery1 = $this->InsertRow($Query1, [$temporaryInfo['guardianName'], $temporaryInfo['phoneNumber'], $currentDateTime] , true);
				if(!$resultQuery1) {
					return ['message_type' => false, 'message' => 'Lỗi khi thêm thông tin tạm của người giám hộ'];
				}

			// Insert patient
				$Query2 = "INSERT INTO `patient`
				(`guardianID`, `patientName`, `patientGender`, `patientBirthday`, `createAt`)
				VALUES(?, ?, ?, ?, ?)";
				$resultQuery2 = $this->InsertRow($Query2, [$resultQuery1, $temporaryInfo['patientName'], $temporaryInfo['patientGender'], $temporaryInfo['patientBirthday'], $currentDateTime], true);
				if(!$resultQuery2) {
					return ['message_type' => false, 'message' => 'Lỗi khi thêm thông tin tạm của bệnh nhân'];
				}

			// Insert appointment
				$apptDateTime = strtotime($temporaryInfo['apptDate'] . ' ' . $temporaryInfo['apptTime']);
				$Query3 = "INSERT INTO `appointments`
				(`patientID`, `apptTime`, `symptom`, `createAt`)
				VALUES(?, ?, ?, NOW())";
				return $this->InsertRow($Query3, [$resultQuery2, date('Y-m-d H:i:s', $apptDateTime), $temporaryInfo['symptom']]);
		}
	}
}
