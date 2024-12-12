<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\DrGetPatientIDModel;

class DrGetPatientID extends \Core\BaseController
{
	protected string $Model = "DoctorModels\DrGetPatientIDModel";
	public function DrGetPatientID()
	{
		if (isset($_POST['submitID'])) {
			$patientID = $_POST['patientID'];
			if (isset($patientID) && $patientID) {
				$_SESSION['getPatientID'] = $patientID;
			}

			$_SESSION['medicalID'] = $_POST['medicalID'];
			$check = $this->Database->updatePatientStatus($_SESSION['medicalID']);

			if ($check) {
				// Lấy dữ liệu bệnh nhân mới nhất

				$getData = $this->Database->getPatientPresent($_SESSION['medicalID']);

				// Cập nhật lại session
				if ($getData) {
					$_SESSION['patientPresent'] = $getData;
				}
			}

			view('DoctorViews/DrIndex');
		} else {
			view('DoctorViews/DrIndex');
		}
	}
}
