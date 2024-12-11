<?php

namespace Controllers\UserControllers;

use Models\UserModels\Users;

class HomeController extends \Core\BaseController
{
    protected string $Model = "UserModels\HomeModel";
    public function index()
    {
      view('UserViews/UserHome');
            
    }
 
}