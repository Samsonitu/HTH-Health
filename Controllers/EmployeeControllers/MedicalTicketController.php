<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\MedicalTicketModel;

class MedicalTicketController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\MedicalTicketModel";
    public function index()
    {
      $this->checkAuthEmployee();

      $listServices = $this->Database->getListServices();
      $listPatientGuardianInfo = $this->Database->getlistPatientGuardianInfo();
      $listAppointment = $this->getListAppointment();
      $listDoctorInfo = $this->Database->getDoctorInfo();
      $countPatientWaitExamined = $this->Database->countPatientWaitExamined();
      view('EmployeeViews/MedicalTicketView', compact('listServices', 'listPatientGuardianInfo' ,'listAppointment', 'listDoctorInfo', 'countPatientWaitExamined'));
    }
    public function getTheQueueList() 
    {
      $this->checkAuthEmployee();

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
      $this->checkAuthEmployee();

        // Kiểm tra nếu nút Tiếp nhận được nhấn
        if (isset($_POST['receiveQueue'])) {
          $queueID = $_POST['queueID'];
          $queueNo = $_POST['queueNo'];
          $resultReceiveQueue = $this->Database->receiveQueue($queueID, $queueNo);
        }

        if (isset($_POST['cancelQueueReception'])) {
          $queueID = $_POST['queueID'];
          $queueNo = $_POST['queueNo'];
          $resultcancelQueueReception = $this->Database->cancelQueueReception($queueID, $queueNo);
        }
        redirect('MedicalTicketRoute');
    }

    public function getListAppointment() 
    {
      $this->checkAuthEmployee();

      $result = $this->Database->getListAppointment();
      $appointments = [];

      foreach ($result as $row) {
          $apptID = $row['apptID'];
          
          // If this appointment isn't in our collection yet, add it
          if (!isset($appointments[$apptID])) {
              $appointments[$apptID] = $row;
              $appointments[$apptID]['services'] = [$row['serviceID']];
              
              // Remove the original serviceID key to avoid confusion
              unset($appointments[$apptID]['serviceID']);
          } else {
              // If the appointment already exists, just add the new serviceID
              $appointments[$apptID]['services'][] = $row['serviceID'];
          }
      }

      // Convert to indexed array if needed
      $appointments = array_values($appointments);  

      return $appointments;
    }

    public function medicalTicketUnscheduledCreate() 
    {
      $this->checkAuthEmployee();

      $empCode = $_SESSION['employeeInfo']['empCode'];
      $resultCreateMedicalTicket = $this->Database->createMedicalTicket($_POST, $empCode);

      if(!$resultCreateMedicalTicket) {
        $_SESSION['message'] = 'Thêm phiếu khám mới thất bại!';
        $_SESSION['message_type'] = false;
      }else {
        $_SESSION['message'] = 'Thêm phiếu khám mới thành công!';
        $_SESSION['message_type'] = true;
      }
      redirect('MedicalTicketRoute');
    }

    public function medicalTicketScheduledCreate()
    {
      $this->checkAuthEmployee();
      $empCode = $_SESSION['employeeInfo']['empCode'];
      $resultCreateMedicalTicketScheduled = $this->Database->createMedicalTicketScheduled($_POST, $empCode);

      if(!$resultCreateMedicalTicketScheduled) {
        $_SESSION['message'] = 'Thêm phiếu khám mới thất bại!';
        $_SESSION['message_type'] = false;
      }else {
        $_SESSION['message'] = 'Thêm phiếu khám mới thành công!';
        $_SESSION['message_type'] = true;
      }
      redirect('MedicalTicketRoute');
    }

    public function checkAuthEmployee()
    {
        if(!isset($_SESSION['employeeInfo']) && empty($_SESSION['employeeInfo'])) redirect('AccountStaffLoginRoute');
    }
}