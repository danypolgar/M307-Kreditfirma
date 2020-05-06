<?php

require('app/Models/Credit.php');


$errors = [];
$creditModel = new Credit();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $rates = $_POST['rates'];
    $creditPackages = $_POST['credit-packages'];


    if (!(!preg_match('/^[a-zA-Z]$/', $name) && strlen($name) <= 50 && $name != '')) {
        $errors[] = $name;
    }

    if (!(stripos($email, '@') && strlen($email) <= 70 && $email != '')) {
        $errors[] = $email;
    }

    // TODO: telefonnummer regex
    if (!(strlen($phoneNumber) <= 15) && !preg_match('/^([+]?[0-9]*)$/', $phoneNumber)) {
        $errors[] = $phoneNumber;
    }

    if (!is_numeric($rates) && $rates >= 10 && $rates < 0) {
        $errors[] = $rates;
    }


    if (!in_array($creditPackages, $creditModel->getAllCreditPackages())) {
        $errors[] = $creditPackages;
    }

    if (count($errors) != 0) {
        include('app/Controllers/AddCreditController.php');
        foreach ($errors as $error) {
            echo "<div class='col-md-6 offset-3 alert alert-danger'>" . "$error" . "</div>";
        }
    } else {
        $creditModel->firstname = 'Philip';
        $creditModel->email = 'philip.baumann@sluz.ch';
        $creditModel->phonenumber = '654654654';
        $creditModel->amountRates = 5;
        $creditModel->creditPack = 1;
        $creditModel->addCredit($name, $email, $phoneNumber, $rates, $creditPackages);
        header('Location: overview');
    }
} else {
    $errors[] = 'error has occured';
}




