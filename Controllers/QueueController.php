<?php

namespace Controllers;

use Models\QueueModel;

class QueueController extends \Core\BaseController
{
    protected string $Model = "QueueModel";
    public function index()
    {
      view('QueueViews');
    }
 
}