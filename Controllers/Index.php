<?php

namespace Controllers;

use Models\Users;

class Index extends \Core\BaseController
{
    protected string $Model = "Users";
    public function index()
    {
      view('index');
            
    }
 
}