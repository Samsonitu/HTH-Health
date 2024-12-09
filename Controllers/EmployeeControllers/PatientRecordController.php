<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\PatientRecordModel;

class PatientRecordController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\PatientRecordModel";
    public function index()
    {
      $listPatientGuardianInfo = $this->Database->getPatientGuardianInfo();
      view('EmployeeViews/PatientRecordView', compact('listPatientGuardianInfo'));
    }

    public function createNewPatient() {
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
 
}