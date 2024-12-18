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
      $listExaminationHistory = $this->Database->getExaminationHistory();
      view('EmployeeViews/PatientRecordView', compact('listPatientGuardianInfo', 'listExaminationHistory'));
    }

    public function createNewPatient() 
    {
      $this->checkAuthEmployee();

      if(isset($_POST['createNewPatient']) && $_POST['createNewPatient']) {
        $patient = $_POST['patient']; 
        $guardian = $_POST['guardian']; 

        $insertResult = $this->Database->insertNewPatientAndGuardian($patient, $guardian, $_SESSION['employeeInfo']['empCode']);

        $_SESSION['message'] = $insertResult['message'];
        $_SESSION['message_type'] = $insertResult['message_type'];

      }else {
        $_SESSION['message'] = "Có lỗi khi gửi dữ liệu đi";
        $_SESSION['message_type'] = 'error';
      }
      redirect('PatientRecordsRoute');
    }

    public function updatePatientGuardianInfo()
    {
      $this->checkAuthEmployee();
      if(isset($_POST['updatePatientInfo']) && $_POST['updatePatientInfo']) {
        $patient = $_POST['patient'];
        $guardian = $_POST['guardian'];
        $updateResult = $this->Database->updatePatientGuardianInfo($patient, $guardian, $_SESSION['employeeInfo']['empCode']);

        $_SESSION['message'] = $updateResult['message'];
        $_SESSION['message_type'] = $updateResult['message_type'];
      }else {
        $_SESSION['message'] = "Có lỗi khi gửi dữ liệu đi";
        $_SESSION['message_type'] = 'error';
      }
      redirect('PatientRecordsRoute');
    }

    public function deletePatientRecord() 
    {
      $this->checkAuthEmployee();
      if(isset($_POST['confirmDeletePatientRecord']) && $_POST['confirmDeletePatientRecord']) {
        $deleteRessult = $this->Database->deletePatientRecord($_POST);
        $_SESSION['message'] = $deleteRessult['message'];
        $_SESSION['message_type'] = $deleteRessult['message_type'];
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