<?php
include_once('app/Models/Credit.php');
$creditModel = new Credit();
$creditList = $creditModel->getAllCurrentlyRunningRents();


function evaluateState ($date, $rates) {
    $date = calculateDeadline($date, $rates);
    $dateTime = new DateTime();
    $dateTime->format('Y-m-d H:i:s');
    if ($dateTime < $date) {
        return '&#9728';
    } else {
        return '&#9889';
    }
}

function calculateDeadline($date, $rates) {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
    $calculatedInterval = $rates * 15;
    $dateInterval = new DateInterval('P' . $calculatedInterval . 'D');
    $date->add($dateInterval);
    return $date;
}

include("app/Views/overview.view.php");