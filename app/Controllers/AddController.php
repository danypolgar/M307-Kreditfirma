<?php

require('app/Models/Credit.php');
require('app/Controllers/Calculations.php');


$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["cancel"])) {
        header('Location: overview');
    } else {
        $nickname = htmlspecialchars(trim($_POST['name']));
        $email = $_POST['email'];
        $phoneNumber = $_POST['phonenumber'];
        $rates = (int) $_POST['rates'];
        $creditPackages = $_POST['credit-packages'];
        $creditModel = new Credit();

        $errorMessage = " is invalid";

        if ($creditModel->validateName($nickname)) {
            $errors[] = "Nickname" . $errorMessage;
        }

        if ($creditModel->validateEmail($email)) {
            $errors[] = "Email" . $errorMessage;
        }


        if ($creditModel->validatePhoneNumber($phoneNumber)) {
            $errors[] = "Telefonnummer" . $errorMessage;
        }

        if ($creditModel->validateRates($rates)) {
            $errors[] = "Raten" . $errorMessage;
        }

        if ($creditModel->validateCreditPackages($creditPackages)) {
            $errors[] = "Kredit Packet" . $errorMessage;
        }

        if (count($errors) != 0) {
            include('app/Controllers/AddCreditController.php');
            foreach ($errors as $error) {
                echo "<div class='col-md-6 offset-3 alert alert-danger'>" . "$error" . "</div>";
            }
        } else {

            $creditModel->addCredit($nickname, $email, $phoneNumber, $rates, $creditPackages);
            header('Location: overview');
        }
    }


} else {
    $errors[] = 'error has occured';
}




