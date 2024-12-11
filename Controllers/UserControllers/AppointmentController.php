<?php

namespace Controllers\UserControllers;

use Core\Model;
use Models\UserModels\AppointmentModel;

class AppointmentController extends \Core\BaseController
{
	protected string $Model = "UserModels\AppointmentModel";
	public function Appointment()
	{
		if (isset($_POST['btnRegisterExamination']) && $_POST['btnRegisterExamination']) {

			$patientCode = $_POST['patientCode'];
			if($patientCode != "") {
				$resultCheckPatientCode = $this->Database->checkPatientCode($patientCode);
				if(!$resultCheckPatientCode) {
					$_SESSION['message'] = 'Mã bệnh nhân không tồn tại!';
					$_SESSION['message_type'] = false;
					redirect('UserAppointmentRoute');
				}
			}

			$resultInsertAppointentTemporary = $this->Database->insertAppointentTemporary($_POST);
			if(!$resultInsertAppointentTemporary) {
				$_SESSION['message'] = 'Lỗi thêm thông tin tạm thời cho lịch hẹn!';
				$_SESSION['message_type'] = false;
			}else {
				$_SESSION['message'] = 'Thêm thông tin tạm thời cho lịch hẹn thành công!!!<br> Chờ nhân viên liên hệ để xác nhận!!!!';
				$_SESSION['message_type'] = false;
			}
			redirect('UserAppointmentRoute');
		} else {
			view('UserViews/AppointmentView');
		}
	}
}
