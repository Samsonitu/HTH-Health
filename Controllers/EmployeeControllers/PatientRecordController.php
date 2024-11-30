<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\Users;

class PatientRecordController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\Users";
    public function index()
    {
      view('EmployeeViews/PatientRecordView');
            
    }
 
}