<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\DrHeartExamModel;

class DrHeartExam extends \Core\BaseController
{
	protected string $Model = "DoctorModels\DrHeartExamModel";
	public function DrHeartExam()
	{
		if (isset($_SESSION['getPatientID'])) {
			$checkHistory = $this->Database->getListHistory($_SESSION['getPatientID']);
			if ($checkHistory) {
				$_SESSION['listHistory'] = $checkHistory;
			}
			$patientID = $_SESSION['getPatientID'];
			$checkData = $this->Database->renderInforPatient($patientID);
			if (isset($_SESSION['getDataPatient'])) {
				$_SESSION['getDataPatient'] = $checkData;
				view('DoctorViews/DrHeartExam');
			} else {
				$_SESSION['getDataPatient'] = $checkData;
				view('DoctorViews/DrHeartExam');
			}
		} else {
			unset($_SESSION['listHistory']);
			unset($_SESSION['getDataPatient']);
			view('DoctorViews/DrHeartExam');
		}


		if (isset($_POST['submitForm']) && ($_POST['submitForm'])) {
			$patientID = $_POST['patientID'];

			$generalConclusion = $_POST['generalConclusion'];
			$doctorInstructions = $_POST['doctorInstructions'];
			$followUpAppointmentDate = $_POST['followUpAppointmentDate'];

			$result = $this->Database->insertForm();

			if ($result) {
				// Lấy ID bản ghi vừa chèn
				$insertedID = $result;

				// Gọi hàm lấy dữ liệu từ Model
				$insertedData = $this->Database->getDataInsert($insertedID);

				// Đưa dữ liệu vào session hoặc view
				$_SESSION['lastInsertedData'] = $insertedData;

				echo '<script>window.location.href = "' . route('DrGeneralMedicalPrint') . '"</script>';
			}


			if (isset($_SESSION['medicalID'])) {
				$medicalID = $_SESSION['medicalID'];
				$this->Database->updatePatientStatus($medicalID);
			} else {
				echo '<script>alert("Ngu")</script>';
			}
		} else {
			view('DoctorViews/DrHeartExam');
		}
	}
}
