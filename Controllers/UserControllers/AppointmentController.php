<?php

namespace Controllers\UserControllers;

use Models\UserModels\AppointmentModel;

class AppointmentController extends \Core\BaseController
{
	protected string $Model = "UserModels\AppointmentModel";
	public function Appointment()
	{
		if (isset($_POST['btnRegisterExamination']) && ($_POST['btnRegisterExamination'])) {

			$patientCode = $_POST['patientCode'];
			$resultCheckPatientCode = null;
			if($patientCode != "") {
				$resultCheckPatientCode = $this->Database->checkPatientCode($patientCode);
				if (!$resultCheckPatientCode) {
					toastMessage('error', 'Thất bại', 'Mã bệnh nhân không tồn tại!');
					redirect('UserAppointmentRoute');
				}
			}

			$resultInsertAppointmentTemporary = $this->Database->insertAppointmentTemporary($_POST, $resultCheckPatientCode);
			if (!$resultInsertAppointmentTemporary) {
				toastMessage('error', 'Thất bại', 'Lỗi thêm thông tin tạm thời cho lịch hẹn!');
			} else {
				toastMessage('success', 'Thành công', 'Thêm thông tin tạm thời cho lịch hẹn thành công!!!Chờ nhân viên liên hệ để xác nhận!!!!');
			}
			redirect('UserAppointmentRoute');
		} else {
			view('UserViews/AppointmentView');
		}
	}
}
