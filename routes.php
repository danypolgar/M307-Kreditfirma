<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/OverviewController.php',
    'erfassen' => 'app/Controllers/AddCreditController.php',
    'add' => 'app/Controllers/AddController.php',
    'bearbeiten' => 'app/Controllers/UpdateCreditController.php',
    'update' => 'app/Controllers/UpdateController.php',
    'change-status' => 'app/Controllers/ChangeStatusController.php',
    '404' => 'app/Controllers/404Controller.php'
]);