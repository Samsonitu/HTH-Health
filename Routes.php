<?php


return [

	/* Begin User Routes */
	[
		"url" => "/",
		"name" => "Trang-chu",
		'controller' => \Controllers\UserControllers\HomeController::class,
		'method' => 'index'
	],
	/* End User Routes */

	[
		"url" => "/Dat-lich-kham",
		"name" => "AppointmentRoute",
		'controller' => \Controllers\UserControllers\AppointmentController::class,
		'method' => 'Appointment'
	],

	[
		"url" => "/Dang-nhap",
		"name" => "UserLoginRoute",
		'controller' => \Controllers\UserControllers\UserLoginController::class,
		'method' => 'FormUserLogin'
	],

	[
		"url" => "/Dang-ky",
		"name" => "UserRegisterRoute",
		'controller' => \Controllers\UserControllers\userRegisterController::class,
		'method' => 'FormUserRegister'
	],

];
