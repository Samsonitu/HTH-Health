<?php

namespace Controllers\DoctorControllers;

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

use Models\DoctorModels\DrGeneralExamModel;

class DrGeneralMedical extends \Core\BaseController
{
	protected string $Model = "DoctorModels\DrGeneralExamModel";
	public function DrGeneralMedical()
	{
		if (isset($_SESSION['getPatientID'])) {
			// $checkHistory = $this->Database->getListHistory($_SESSION['getPatientID']);
			// if ($checkHistory) {
			// 	$_SESSION['listHistory'] = $checkHistory;
			// }
			$patientID = $_SESSION['getPatientID'];
			$checkData = $this->Database->renderInforPatient($patientID);
			if (isset($_SESSION['getDataPatient'])) {
				$_SESSION['getDataPatient'] = $checkData;
				view('DoctorViews/DrGeneralMedical');
			} else {
				$_SESSION['getDataPatient'] = $checkData;
				view('DoctorViews/DrGeneralMedical');
			}
		} else {
			unset($_SESSION['listHistory']);
			unset($_SESSION['getDataPatient']);
			view('DoctorViews/DrGeneralMedical');
		}


		if (isset($_POST['submitForm']) && ($_POST['submitForm'])) {
			$patientID = $_POST['patientID'];
			$height = $_POST['height'];
			$weight = $_POST['weight'];
			$bmi = $_POST['bmi'];
			$chestMeasurement = $_POST['chestMeasurement'];
			$waistMeasurement = $_POST['waistMeasurement'];
			$thighMeasurement = $_POST['thighMeasurement'];
			$bloodPressure = $_POST['bloodPressure'];
			$heartRate = $_POST['heartRate'];
			$temperature = $_POST['temperature'];
			$respiratoryFunction = $_POST['respiratoryFunction'];
			$cholesterolLevel = $_POST['cholesterolLevel'];
			$bloodSugarLevel = $_POST['bloodSugarLevel'];
			$generalConclusion = $_POST['generalConclusion'];
			$doctorInstructions = $_POST['doctorInstructions'];
			$followUpAppointmentDate = $_POST['followUpAppointmentDate'];

			$result = $this->Database->insertForm($patientID, $height, $weight, $bmi, $chestMeasurement, $waistMeasurement, $thighMeasurement, $bloodPressure, $heartRate, $temperature, $respiratoryFunction, $cholesterolLevel, $bloodSugarLevel, $generalConclusion, $doctorInstructions, $followUpAppointmentDate);

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
			view('DoctorViews/DrGeneralMedical');
		}
	}
}
