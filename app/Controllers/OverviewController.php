<?php
include('app/Controllers/Calculations.php');
include_once('app/Models/Credit.php');
$creditModel = new Credit();
$creditList = $creditModel->getAllCurrentlyRunningRents();


function evaluateState ($rates, $rentDate) {


    $date = date('Y-m-d', strtotime($rentDate. ' + ' . Calculations::calculateDays($rates) . ' days'));
    if ($rentDate < $date) {
        return '&#9728';
    } else {
        return '&#9889';
    }
}
include("app/Views/overview.view.php");