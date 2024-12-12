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
      if(!$resultWaitingExamList) {
        echo json_encode([
          'success' => false,
          'message' => 'Lỗi khi lấy danh sách hàng chờ'
        ]);
        exit;
      }
      echo json_encode([
        'success' => true,
        'message' => 'Không có bệnh nhân nào chờ khá',
        'data' => $resultWaitingExamList
      ]);
      exit;
	}

  public function receptionPatient(){
    if (isset($_POST['btnReceptionPatient']) && ($_POST['btnReceptionPatient'])) {
      $resultReceptionPatient = $this->Database->receptionPatient($_POST);
      if(!$resultReceptionPatient) {
        $_SESSION['message'] = 'Tiếp nhận bệnh nhân thành công!';
        $_SESSION['message_type'] = false;
      }else {
        $_SESSION['message'] = 'Tiếp nhận bệnh nhân thành công!';
        $_SESSION['message_type'] = true;
      }
      view('DoctorViews/DrGeneralMedical', compact('resultReceptionPatient'));
		}
  }
}
/* 
header('Content-Type: application/json');
      $listQueueResult = $this->Database->getTheQueueListByCounterID($_SESSION['employeeInfo']['counterID']);
      if(!$listQueueResult) {
        echo json_encode([
          'success' => false,
          'message' => 'Lỗi khi lấy danh sách hàng chờ'
        ]);
        exit;
      }
      echo json_encode([
        'success' => true,
        'message' => 'Lấy danh sách hàng chờ thành công',
        'data' => $listQueueResult
      ]);
      exit; */