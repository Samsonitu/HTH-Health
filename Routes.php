<?php


return [

    /* Begin User Routes */
    [
        "url" => "/",
        "name" => "index",
        'controller' => \Controllers\UserControllers\HomeController::class,
        'method' => 'index'
    ],
    /* End User Routes */

];