<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\AppointmentModel;

class AppointmentController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\AppointmentModel";
    public function index()
    {
        $this->checkAuthEmployee();

        $listPatientGuardianInfo = $this->Database->getlistPatientGuardianInfo();
        $listAppointmentInfo = $this->Database->getListAppointMentInfo();
        $listServices = $this->Database->getSerivces();
        $listDoctorInfo = $this->Database->getlistDoctorInfo();
        view('EmployeeViews/AppointmentView', compact('listPatientGuardianInfo', 'listAppointmentInfo', 'listServices', 'listDoctorInfo'));
    }

    public function additionPatientCodeAppointment()  
    {
        $this->checkAuthEmployee();
        
        if(isset($_POST['currentApptID']) && isset($_POST['patientCode'])) {
            $apptID = $_POST['currentApptID'];
            $patientCode = $_POST['patientCode'];
            $resultAdditionPatientCode = $this->Database->additionPatientCodeAppointment($apptID, $patientCode);

            if(!$resultAdditionPatientCode) {
                $_SESSION['message'] = 'Bổ sung mã bệnh nhân thất bại!';
                $_SESSION['message_type'] = false;
            }else {
                $_SESSION['message'] = "Bô sung mã bệnh nhân thành công!";
                $_SESSION['message_type'] = true;
            }
            redirect('AppointmentRoute');
        }
    }

    public function createAppointmentCode() 
    {
        $this->checkAuthEmployee();

        if(isset($_POST['serviceIDs']) && ($_POST['symptom'])) {
            $resultCreateApptCode = $this->Database->createAppointmentCode($_POST,$_SESSION['employeeInfo']['empCode']);
            if(!$resultCreateApptCode) {
                $_SESSION['message'] = "Tạo mã lịch hẹn thất bại!";
                $_SESSION['message_type'] = false;
            }else {
                $_SESSION['message'] = "Tạo mã lịch hẹn thành công!";
                $_SESSION['message_type'] = true;
            }
            redirect('AppointmentRoute');
        }
    }

    public function checkAuthEmployee()
    {
        if(!isset($_SESSION['employeeInfo']) && empty($_SESSION['employeeInfo'])) redirect('AccountStaffLoginRoute');
    }
    
}