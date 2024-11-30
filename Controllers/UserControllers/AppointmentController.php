<?php

namespace Controllers\UserControllers;

use Models\UserModels\AppointmentModel;

class AppointmentController extends \Core\BaseController
{
	protected string $Model = "UserModels\AppointmentModel";
	public function Appointment()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnRegisterExamination'])) {
			var_dump($_POST);
		} else {
			view('UserViews/AppointmentView');
		}
	}
}
