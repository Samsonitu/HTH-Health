<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\DrEyeExamModel;

class DrEyeExam extends \Core\BaseController
{
	protected string $Model = "DoctorModels\DrEyeExamModel";
	public function DrEyeExam()
	{
		$this->checkAuthDoctor();
		if (isset($_SESSION['getPatientID'])) {
			$patientID = $_SESSION['getPatientID'];
			$checkData = $this->Database->renderInforPatient($patientID);
			if (!isset($_SESSION['getDataPatient'])) {
				$_SESSION['getDataPatient'] = $checkData;
				view('DoctorViews/DrENTExam');
			} else {
				unset($_SESSION['getDataPatient']);
				$_SESSION['getDataPatient'] = $checkData;
				view('DoctorViews/DrENTExam');
			}
		} else {
			view('DoctorViews/DrEyeExam');
		}
	}
	public function checkAuthDoctor()
    {
        if(!isset($_SESSION['doctorInfo']) && empty($_SESSION['doctorInfo'])) redirect('AccountStaffLoginRoute');
    }
}
