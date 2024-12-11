<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\PatientRecordModel;

class PatientRecordController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\PatientRecordModel";
    public function index()
    {
      $this->checkAuthEmployee();

      $listPatientGuardianInfo = $this->Database->getPatientGuardianInfo();
      view('EmployeeViews/PatientRecordView', compact('listPatientGuardianInfo'));
    }

    public function createNewPatient() {
      $this->checkAuthEmployee();

      if(isset($_POST['createNewPatient']) && $_POST['createNewPatient']) {
        $patient = $_POST['patient']; 
        $guardian = $_POST['guardian']; 
        $empCode = $_POST['empCode'];

        $insertResult = $this->Database->insertNewPatientAndGuardian($patient, $guardian, $empCode);

        $_SESSION['message'] = $insertResult['message'];
        $_SESSION['message_type'] = $insertResult['message_type'];

      }else {
        $_SESSION['message'] = "Có lỗi khi gửi dữ liệu đi";
        $_SESSION['message_type'] = 'error';
      }
      redirect('PatientRecordsRoute');
    }
 
    public function checkAuthEmployee()
    {
        if(!isset($_SESSION['employeeInfo']) && empty($_SESSION['employeeInfo'])) redirect('AccountStaffLoginRoute');
    }
}