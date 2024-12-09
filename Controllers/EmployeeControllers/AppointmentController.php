<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\AppointmentModel;

class AppointmentController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\AppointmentModel";
    public function index()
    {
        $listPatientGuardianInfo = $this->Database->getlistPatientGuardianInfo();
        $listAppointmentInfo = $this->Database->getListAppointMentInfo();
        $listServices = $this->Database->getSerivces();
        $listDoctorInfo = $this->Database->getlistDoctorInfo();
        view('EmployeeViews/AppointmentView', compact('listPatientGuardianInfo', 'listAppointmentInfo', 'listServices', 'listDoctorInfo'));
    }

    public function additionPatientCodeAppointment()  
    {
        if(isset($_POST['currentApptID']) && isset($_POST['patientCode'])) {
            $apptID = $_POST['currentApptID'];
            $patientCode = $_POST['patientCode'];
            $resultAdditionPatientCode = $this->Database->additionPatientCodeAppointment($apptID, $patientCode);

            if(!$resultAdditionPatientCode) {
                $_SESSION['message'] = 'Bổ sung mã bệnh nhân thất bại!';
            }else {
                $_SESSION['message'] = "Bô sung mã bệnh nhân thành công!";
            }
            redirect('AppointmentRoute');

        }
    }

    public function createAppointmentCode() 
    {
        if(isset($_POST['serviceIDs']) && ($_POST['symptom'])) {
            $resultCreateApptCode = $this->Database->createAppointmentCode();
        }
    }
}