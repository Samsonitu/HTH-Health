<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\MedicalTicketModel;

class MedicalTicketController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\MedicalTicketModel";
    public function index()
    {
      $listServices = $this->Database->getListServices();
      $listPatientGuardianInfo = $this->Database->getlistPatientGuardianInfo();
      $listAppointment = $this->Database->getListAppointment();
      view('EmployeeViews/MedicalTicketView', compact('listServices', 'listPatientGuardianInfo' ,'listAppointment'));
    }

    public function getTheQueueList() 
    {
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
      exit;
    }

    public function handleQueue()
    {
        // Kiểm tra nếu nút Tiếp nhận được nhấn
        if (isset($_POST['receiveQueue'])) {
          $queueID = $_POST['queueID'];
          $queueNo = $_POST['queueNo'];
          $resultReceiveQueue = $this->Database->resultReceiveQueue($queueID, $queueNo);
        }

        if (isset($_POST['cancelQueueReception'])) {
          $queueID = $_POST['queueID'];
          $queueNo = $_POST['queueNo'];
          $resultcancelQueueReception = $this->Database->cancelQueueReception($queueID, $queueNo);
        }
        redirect('MedicalTicketRoute');
    }

}