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
        "url" => "/nhan-vien/gui-thong-tin-phieu-kham",
        "name" => "SendDataMedicalFormRoute",
        'controller' => \Controllers\EmployeeControllers\MedicalTicketController::class,
        'method' => 'SendDataMedicalFormRoute'
    ],

    [
        "url" => "/nhan-vien/ho-so-benh-nhan",
        "name" => "PatientRecordsRoute",
        'controller' => \Controllers\EmployeeControllers\PatientRecordController::class,
        'method' => 'index'
    ],
    // End employee Route

    [
        "url" => "/lay-so-thu-tu",
        "name" => "QueueRoute",
        'controller' => \Controllers\QueueController::class,
        'method' => 'index'
    ],

    

];