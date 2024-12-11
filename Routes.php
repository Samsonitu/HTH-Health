<?php


return [
	[
		"url" => "/nhan-vien-dang-nhap",
		"name" => "AccountStaff",
		'controller' => \Controllers\AccountStaffController::class,
		'method' => 'AccountStaff'
	],
	[
		"url" => "/",
		"name" => "DrGetPatientID",
		"controller" => Controllers\DoctorControllers\DrGetPatientID::class,
		"method" => 'DrGetPatientID'
	],
	[
		"url" => "/receptionPatient",
		"name" => "ReceptionPatient",
		"controller" => Controllers\DoctorControllers\ReceptionPatient::class,
		"method" => 'ReceptionPatient'
	],
	[
		"url" => "/kham-tong-quat",
		"name" => "DrGeneralMedical",
		'controller' => \Controllers\DoctorControllers\DrGeneralMedical::class,
		'method' => 'DrGeneralMedical'
	],
	[
		"url" => "/in-tong-quat",
		"name" => "DrGeneralMedicalPrint",
		'controller' => \Controllers\DoctorControllers\DrGeneralMedicalPrint::class,
		'method' => 'DrGeneralMedicalPrint'
	],
	[
		"url" => "/kham-thi-luc",
		"name" => "DrEyeExam",
		'controller' => \Controllers\DoctorControllers\DrEyeExam::class,
		'method' => 'DrEyeExam'
	],
	[
		"url" => "/kham-tai-mui-hong",
		"name" => "DrENTExam",
		'controller' => \Controllers\DoctorControllers\DrENTExam::class,
		'method' => 'DrENTExam'
	],
	[
		"url" => "/kham-tim",
		"name" => "DrHeartExam",
		'controller' => \Controllers\DoctorControllers\DrHeartExam::class,
		'method' => 'DrHeartExam'
	],
];
