<?php
require('app/Models/Credit.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST["cancel"])) {
        var_dump($_POST);
        $creditModel = new Credit();
        $id = htmlspecialchars($_POST["id"]);
        $nickname = htmlspecialchars($_POST["nickname"]);
        $email = htmlspecialchars($_POST["email"]);
        $phoneNumber = htmlspecialchars($_POST["phonenumber"]);
        $creditPackages = htmlspecialchars($_POST["credit-packages"]);
        $status = htmlspecialchars($_POST["status"]);

        $creditModel->updateCredit($id, $nickname, $email, $phoneNumber, $creditPackages, $status);
    }
    header('Location: overview');


} else {
    $errors[] = 'error has occured';
}