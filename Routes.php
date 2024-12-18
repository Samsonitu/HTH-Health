<?php


return [
    /* Begin Employee Routes */
        // Medical Ticket Controller
            [
                "url" => "/nhan-vien/phieu-kham-benh",
                "name" => "MedicalTicketRoute",
                'controller' => \Controllers\EmployeeControllers\MedicalTicketController::class,
                'method' => 'index'
            ],
            [
                "url" => "/nhan-vien/them-phieu-kham-benh/chua-dat-lich",
                "name" => "MedicalTicketUnscheduledCreateRoute",
                'controller' => \Controllers\EmployeeControllers\MedicalTicketController::class,
                'method' => 'medicalTicketUnscheduledCreate'
            ],
            [
                "url" => "/nhan-vien/them-phieu-kham-benh/da-dat-lich",
                "name" => "MedicalTicketScheduledCreateRoute",
                'controller' => \Controllers\EmployeeControllers\MedicalTicketController::class,
                'method' => 'medicalTicketScheduledCreate'
            ],
            [
                "url" => "/nhan-vien/lay-danh-sach-hang-cho",
                "name" => "getTheQueueListRoute",
                'controller' => \Controllers\EmployeeControllers\MedicalTicketController::class,
                'method' => 'getTheQueueList'
            ],
            [
                "url" => "/xu-ly-hang-cho",
                "name" => "HandleQueueRoute",
                'controller' => \Controllers\EmployeeControllers\MedicalTicketController::class,
                'method' => 'handleQueue'
            ],

        // Patient Record Controller
            [
                "url" => "/nhan-vien/ho-so-benh-nhan",
                "name" => "PatientRecordsRoute",
                'controller' => \Controllers\EmployeeControllers\PatientRecordController::class,
                'method' => 'index'
            ],
            [
                "url" => "/nhan-vien/them-benh-nhan-moi",
                "name" => "CreateNewPatientRoute",
                'controller' => \Controllers\EmployeeControllers\PatientRecordController::class,
                'method' => 'createNewPatient'
            ],
            [
                "url" => "/nhan-vien/cap-nhat-thong-tin-benh-nhan",
                "name" => "UpdatePatientGuardianInfoRoute",
                'controller' => \Controllers\EmployeeControllers\PatientRecordController::class,
                'method' => 'updatePatientGuardianInfo'
            ],
            [
                "url" => "/nhan-vien/xoa-thong-tin-benh-nhan",
                "name" => "DeletePatientRecordRoute",
                'controller' => \Controllers\EmployeeControllers\PatientRecordController::class,
                'method' => 'deletePatientRecord'
            ],
        // Appointment Controller
            [
                "url" => "/nhan-vien/lich-hen",
                "name" => "AppointmentRoute",
                'controller' => \Controllers\EmployeeControllers\AppointmentController::class,
                'method' => 'index'
            ],
            [
                "url" => "/nhan-vien/lich-hen/cap-nhat-ma-benh-nhan",
                "name" => "AdditionPatientCodeAppointmentRoute",
                'controller' => \Controllers\EmployeeControllers\AppointmentController::class,
                'method' => 'additionPatientCodeAppointment'
            ],
            [
                "url" => "/nhan-vien/lich-hen/tao-ma-lich-hen",
                "name" => "CreateAppointmentCodeRoute",
                'controller' => \Controllers\EmployeeControllers\AppointmentController::class,
                'method' => 'createAppointmentCode'
            ],
    /* End employee Routes */

    /* Begin Staff Routes */
        [
            "url" => "/dang-nhap-he-thong",
            "name" => "AccountStaffLoginRoute",
            'controller' => \Controllers\AccountStaffController::class,
            'method' => 'accountStaffLogin'
        ],
        [
            "url" => "/dang-xuat-he-thong",
            "name" => "AccountStaffLogoutRoute",
            'controller' => \Controllers\AccountStaffController::class,
            'method' => 'accountStaffLogout'
        ],
    /* End Staff Routes */
    
    /* Begin Queue Routes */
        [
            "url" => "/lay-so-thu-tu",
            "name" => "QueueRoute",
            'controller' => \Controllers\QueueController::class,
            'method' => 'index'
        ],
        [
            "url" => "/them-hang-cho",
            "name" => "InsertQueueRoute",
            'controller' => \Controllers\QueueController::class,
            'method' => 'insertQueue'
        ],
        [
            "url" => "/kiem-tra-ma-lich-hen",
            "name" => "FindAppointmentCodeRoute",
            'controller' => \Controllers\QueueController::class,
            'method' => 'findAppointmentCode'
        ],
        [
            "url" => "/luu-lich-hen-va-hang-doi",
            "name" => "InsertAndUpdateAppointmentRoute",
            'controller' => \Controllers\QueueController::class,
            'method' => 'insertAndUpdateAppointment'
        ],
    /* End Queue Routes */
	
    /* Begin User Routes */
        [
            "url" => "/",
            "name" => "HomeRoute",
            'controller' => \Controllers\UserControllers\HomeController::class,
            'method' => 'index'
        ],
        [
            "url" => "/dat-lich-kham",
            "name" => "UserAppointmentRoute",
            'controller' => \Controllers\UserControllers\AppointmentController::class,
            'method' => 'Appointment'
        ],

        [
            "url" => "/dang-nhap",
            "name" => "UserLoginRoute",
            'controller' => \Controllers\UserControllers\UserLoginController::class,
            'method' => 'FormUserLogin'
	    ],
        [
            "url" => "/dang-ky",
            "name" => "UserRegisterRoute",
            'controller' => \Controllers\UserControllers\userRegisterController::class,
            'method' => 'FormUserRegister'
        ],
    /* End User Routes */

];
