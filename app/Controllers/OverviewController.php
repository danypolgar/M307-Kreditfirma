<?php
include_once('app/Models/Credit.php');
include('app/Controllers/Calculations.php');
$creditModel = new Credit();
$creditList = $creditModel->getAllCurrentlyRunningRents();


function evaluateState ($rates) {

    $today = new DateTime();
    $today = $today->format('Y-m-d');
    $date = date('Y-m-d', strtotime($today. ' + ' . Calculations::calculateDays($rates) . ' days'));
    if ($today < $date) {
        return '&#9728';
    } else {
        return '&#9889';
    }
}



include("app/Views/overview.view.php");