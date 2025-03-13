<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\Doctor;

class DrIndexController extends \Core\BaseController
{
	protected string $Model = "DoctorModels\Doctor";
	public function DrIndex()
	{
		view('DoctorViews/DrIndex');
	}
}
