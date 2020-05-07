<?php

include_once('app/Models/Credit.php');
$creditModel = new Credit();
$creditPackages = $creditModel->getAllCreditPackages();
$credit = null;
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = htmlspecialchars($_GET["id"]);
    $credit = $creditModel->getUserById($id);
    
}

include('app/Views/updatecredit.view.php');