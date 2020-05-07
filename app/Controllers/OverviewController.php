<?php
include_once('app/Models/Credit.php');
include('app/Controllers/Calculations.php');
$creditModel = new Credit();
$creditList = $creditModel->getAllCurrentlyRunningRents();


function evaluateState ($date, $rates) {
    $date = Calculations::calculateDeadline($date, $rates);
    $dateTime = new DateTime();
    $dateTime->format('Y-m-d H:i:s');
    if ($dateTime < $date) {
        return '&#9728';
    } else {
        return '&#9889';
    }
}



include("app/Views/overview.view.php");