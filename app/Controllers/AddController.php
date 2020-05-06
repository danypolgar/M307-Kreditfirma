<?php

require('app/Models/Credit.php');


$errors = [];
$creditModel = new Credit();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nickname = htmlspecialchars(trim($_POST['name']));
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $rates = (int) $_POST['rates'];
    $creditPackages = $_POST['credit-packages'];
    var_dump($rates);



    if ($creditModel->validateName($nickname)) {
        $errors[] = $nickname;
    }

    if ($creditModel->validateEmail($email)) {
        $errors[] = $email;
    }


    if ($creditModel->validatePhoneNumber($phoneNumber)) {
        $errors[] = $phoneNumber;
    }

    if (!is_numeric($rates) && $rates >= 10 && $rates < 0) {
        $errors[] = $rates;
    }


    if ($creditPackages < 0 && $creditPackages > 40) {
        $errors[] = $creditPackages;
    }

    if (count($errors) != 0) {
        include('app/Controllers/AddCreditController.php');
        foreach ($errors as $error) {
            echo "<div class='col-md-6 offset-3 alert alert-danger'>" . "$error" . "</div>";
        }
    } else {
        $creditModel->nickname = 'Philip';
        $creditModel->email = 'philip.baumann@sluz.ch';
        $creditModel->phonenumber = '654654654';
        $creditModel->amountRates = 5;
        $creditModel->creditPack = 1;
        $creditModel->addCredit($nickname, $email, $phoneNumber, $rates, $creditPackages);
        header('Location: overview');
    }
} else {
    $errors[] = 'error has occured';
}




