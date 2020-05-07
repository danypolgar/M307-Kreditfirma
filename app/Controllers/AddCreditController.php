<?php
include_once('app/Models/Credit.php');
$creditModel = new Credit();
$creditPackages = $creditModel->getAllCreditPackages();

include('app/Views/addcredit.view.php');