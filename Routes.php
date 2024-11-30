<?php


return [

	/* Begin User Routes */
	[
		"url" => "/",
		"name" => "HomeRoute",
		'controller' => \Controllers\UserControllers\HomeController::class,
		'method' => 'index'
	],
	/* End User Routes */

	[
		"url" => "/Appointment",
		"name" => "AppointmentRoute",
		'controller' => \Controllers\UserControllers\AppointmentController::class,
		'method' => 'Appointment'
	],

	[
		"url" => "/UserLogin",
		"name" => "UserLoginRoute",
		'controller' => \Controllers\UserControllers\userLoginController::class,
		'method' => 'FormUserLogin'
	],

];
