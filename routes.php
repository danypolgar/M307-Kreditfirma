<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/OverviewController.php',
    'erfassen' => 'app/Controllers/AddCreditController.php',
    'add' => 'app/Controllers/AddController.php',
    'bearbeiten' => 'app/Controllers/UpdateController.php'
]);