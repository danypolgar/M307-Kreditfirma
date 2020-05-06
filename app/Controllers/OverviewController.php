<?php
include_once('app/Models/Credit.php');
$creditModel = new Credit();
$creditList = $creditModel->getAllCurrentlyRunningRents();

include("app/Views/overview.view.php");