<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $rates = $_POST['rates'];
    $creditPackages = $_POST['credit-packages'];

    if (!(!preg_match('/[^a-zA-Z]/', $name) && strlen($name) <= 50 && $name != '')) {
        $errors[] = $name;
    }

    if (!(stripos($email, '@') && strlen($email) <= 70 && $email != '')) {
        $errors[] = $email;
    }

    // TODO: telefonnummer regex
    if (!(strlen($phoneNumber) <= 15)) {
        $errors[] = $phoneNumber;
    }

    if (!is_numeric($rates) && $rates >= 10 && $rates < 0) {
        $errors[] = $rates;
    }

    if ()




    var_dump($_POST);
}

include('app/Controllers/AddCreditController.php');
foreach ($errors as $error) {
    echo "<div class='col-md-6 offset-3 alert alert-danger'>" . "$error" . "</div>";
}


