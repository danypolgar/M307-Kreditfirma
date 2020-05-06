<?php
$errors = [];
require 'app/Models/Credit.php';
 $c = new Credit();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $rates = 1;
    $creditPackages = 1;
    $c->addCredit($name, $email, $phoneNumber, $rates, $creditPackages);

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







    var_dump($_POST);
}

include('app/Controllers/AddCreditController.php');
foreach ($errors as $error) {
    echo "<div class='col-md-6 offset-3 alert alert-danger'>" . "$error" . "</div>";
}


