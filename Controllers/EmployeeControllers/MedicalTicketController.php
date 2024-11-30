<?php

namespace Controllers\EmployeeControllers;

use Models\EmployeeModels\Users;

class MedicalTicketController extends \Core\BaseController
{
    protected string $Model = "EmployeeModels\Users";
    public function index()
    {
      view('EmployeeViews/MedicalTicketView');
            
    }

    public function SendDataMedicalFormRoute() {
     
    }
  
}