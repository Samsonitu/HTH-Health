<?php

namespace Controllers\UserControllers;

use Models\UserModels\AppointmentModel;

class AppointmentController extends \Core\BaseController
{
	protected string $Model = "UserModels\AppointmentModel";
	public function Appointment()
	{
		if (isset($_POST['btnRegisterExamination']) && $_POST['btnRegisterExamination']) {

			$apptCode = $_POST['apptCode'];
			$patientName = $_POST['patientName'];
			$birthday = $_POST['patientBirthday'];
			$gender = $_POST['patientGender'];
			$manifest = $_POST['manifest'];
			$guardianName = $_POST['guardianName'];
			$phoneNumber = $_POST['phoneNumber'];
			$apptDate = $_POST['apptDate'];
			$apptTime = $_POST['apptTime'];
			$getApptModel = new AppointmentModel();
			$checkApptCode = $getApptModel->checkAppt();
			$insertAppt = $getApptModel->getAppt($apptCode, $manifest, $apptDate, $apptTime);
			$insertPnt = $getApptModel->getPnt($patientName, $birthday, $gender);
			$insertGrd = $getApptModel->getGrd($guardianName, $phoneNumber);
			$updateAppt = $getApptModel->updateAppt($manifest, $apptDate, $apptTime);

			if (!empty($checkApptCode)) {
				if ($apptCode == $apptCode) {
					if ($updateAppt) {
						$_SESSION['updateAppt'] = $updateAppt;
					}
				}
			} else {
				if ($insertAppt) {
					$_SESSION['apptInsert'] = $insertAppt;
				}
				if ($insertPnt) {
					$_SESSION['pntInsert'] = $insertPnt;
				}
				if ($insertGrd) {
					$_SESSION['grdInsert'] = $insertGrd;
				}
			}


			$flag = 1;
			view('UserViews/AppointmentView', compact('flag'));
		} else {
			view('UserViews/AppointmentView');
		}
	}
}
