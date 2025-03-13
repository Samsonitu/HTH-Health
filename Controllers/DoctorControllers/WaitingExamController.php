<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\WaitingExamModel;

class WaitingExamController extends \Core\BaseController
{
	protected string $Model = "DoctorModels\WaitingExamModel";

	public function getWaitingExamList()
	{
		header('Content-Type: application/json');
		$resultWaitingExamList = $this->Database->getWaitingExamList();
		if (!$resultWaitingExamList) {
			echo '<script>console.log(' . $resultWaitingExamList . ')</script>';
			echo json_encode([
				'success' => false,
				'message' => 'Lỗi khi lấy danh sách hàng chờ'
			]);
			exit;
		}
		echo json_encode([
			'success' => true,
			'message' => 'Không có bệnh nhân nào chờ khám',
			'data' => $resultWaitingExamList
		]);
		exit;
	}

	public function receptionPatient()
	{
		if (isset($_POST['btnReceptionPatient']) && ($_POST['btnReceptionPatient'])) {
			$resultReceptionPatient = $this->Database->receptionPatient($_POST);
			$resultGetServiceName = $this->Database->getServiceName($_POST['formID']);

			$_SESSION['patientCode'] = $_POST['patientCode'];
			$_SESSION['formID'] = $_POST['formID'];
			if (!$resultReceptionPatient && !$resultGetServiceName) {
				$_SESSION['message'] = 'Tiếp nhận bệnh nhân không thành công!';
				$_SESSION['message_type'] = false;
			} else {
				$_SESSION['resultReceptionPatient'] = $resultReceptionPatient;
				$_SESSION['serviceName'] = $resultGetServiceName;
				$_SESSION['message'] = 'Tiếp nhận bệnh nhân thành công!';
				$_SESSION['message_type'] = true;
			}
			redirect('DrGeneralMedical');
		}
	}
}
