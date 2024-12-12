<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\Doctor;

class DrGeneralMedicalPrint extends \Core\BaseController
{
	protected string $Model = "DoctorModels\Doctor";
	public function DrGeneralMedicalPrint()
	{
		$this->Database->getDoctor();
		view('DoctorViews/DrGeneralMedicalPrint');
	}
}
