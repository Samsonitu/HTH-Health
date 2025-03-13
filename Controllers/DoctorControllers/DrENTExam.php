<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\DrENTExamModel;

class DrENTExam extends \Core\BaseController
{
	protected string $Model = "DoctorModels\DrENTExamModel";
	public function DrENTExam()
	{
		$this->checkAuthDoctor();
		if (isset($_SESSION['getPatientID'])) {
			$patientID = $_SESSION['getPatientID'];
			$checkData = $this->Database->renderInforPatient($patientID);
			if ($checkData) {
				if (!isset($_SESSION['getDataPatient'])) {
					$_SESSION['getDataPatient'] = $checkData;
					view('DoctorViews/DrENTExam');
				} else {
					unset($_SESSION['getDataPatient']);
					$_SESSION['getDataPatient'] = $checkData;
					view('DoctorViews/DrENTExam');
				}
			}
		} else {
			view('DoctorViews/DrENTExam');
		}
	}
	public function checkAuthDoctor()
    {
        if(!isset($_SESSION['doctorInfo']) && empty($_SESSION['doctorInfo'])) redirect('AccountStaffLoginRoute');
    }
}
