<?php

namespace Controllers\DoctorControllers;

use Models\DoctorModels\Users;

class DoctorDashBoard extends \Core\BaseController
{
    protected string $Model = "DoctorModels\Users";
    public function index()
    {
      view('DoctorViews/DoctorIndex');
            
    }
 
}