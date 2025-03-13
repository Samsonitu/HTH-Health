<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\DrGeneralExamModel;

class DrGeneralMedical extends \Core\BaseController
{
	protected string $Model = "DoctorModels\DrGeneralExamModel";
	public function DrGeneralMedical()
	{
		$this->checkAuthDoctor();
		if (isset($_SESSION['patientCode']) && $_SESSION['patientCode'] && isset($_SESSION['formID']) && $_SESSION['formID']) {
			$patientCode = $_SESSION['patientCode'];
			$formID = $_SESSION['formID'];
			$_SESSION['resultDataPatient'] = $this->Database->renderInforPatient($patientCode, $formID);
			if ($_SESSION['resultDataPatient']) {
				view('DoctorViews/DrGeneralMedical');

				// insert data
				if (isset($_POST['btnInsertData']) && $_POST['btnInsertData']) {
					// check service
					$resultCheckService = $this->Database->checkService($formID);

					// insert data
					if ($resultCheckService) {
						$ressultInsertData = $this->Database->insertForm($_POST);
						if ($ressultInsertData) {
							$resultUpdateMedicalForm = $this->Database->updateMedicalFormStatus($formID);
							if ($resultUpdateMedicalForm) {
								unset($_SESSION['patientCode']);
								unset($_SESSION['formID']);
								unset($_SESSION['resultDataPatient']);
								unset($_SESSION['serviceName']);
								echo '<script>alert("Đã lưu dữ liệu khám")</script>';

								// in phiếu
								$resultPrintData = $this->Database->getDataInsert($ressultInsertData);
								if ($resultPrintData) {
									$_SESSION['resultPrintData'] = $resultPrintData;
									echo '<script>window.location.href = "' . route('DrGeneralMedicalPrint') . '"</script>';
								}
							}
						} else {
							echo '<script>alert("Lỗi khi lập dữ liệu khám")</script>';
						}
					} else {
						echo '<script>alert("Vui lòng chọn đúng dịch vụ khám")</script>';
					}
				}
			} else {
				\dd($_SESSION['resultDataPatient']);
			}
		} else {
			view('DoctorViews/DrGeneralMedical');
		}
	}

	public function DrGeneralMedicalPrint()
	{
		$this->checkAuthDoctor();
		$data = $_SESSION['resultPrintData'];
		view('DoctorViews/Print/DrGeneralMedical', compact('data'));
	}
	public function checkAuthDoctor()
    {
        if(!isset($_SESSION['doctorInfo']) && empty($_SESSION['doctorInfo'])) redirect('AccountStaffLoginRoute');
    }
}
