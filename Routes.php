<?php


return [

    // Begin employee Route
        [
            "url" => "/nhan-vien/phieu-kham-benh",
            "name" => "MedicalTicketRoute",
            'controller' => \Controllers\EmployeeControllers\MedicalTicketController::class,
            'method' => 'index'
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
        
        [
            "url" => "/nhan-vien/them-benh-nhan-moi",
            "name" => "CreateNewPatientRoute",
            'controller' => \Controllers\EmployeeControllers\PatientRecordController::class,
            'method' => 'createNewPatient'
        ],
        [
            "url" => "/nhan-vien/ho-so-benh-nhan",
            "name" => "PatientRecordsRoute",
            'controller' => \Controllers\EmployeeControllers\PatientRecordController::class,
            'method' => 'index'
        ],
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
    // End employee Route
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
    // Begin queue Route
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
    // End queue Route

];