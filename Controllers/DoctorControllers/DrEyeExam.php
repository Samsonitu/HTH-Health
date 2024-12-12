<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\DrEyeExamModel;

class DrEyeExam extends \Core\BaseController
{
	protected string $Model = "DoctorModels\DrEyeExamModel";
	public function DrEyeExam()
	{
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
}
