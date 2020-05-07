<?php
include('app/Models/Credit.php');

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $creditModel = new Credit();

    $checkList = $_POST['checklist'];
    foreach ($checkList as $key => $value) {
        $user = $creditModel->getUserById($value);
        $creditModel->updateCreditStatus($user[0]);
    }
    header('Location: overview');
}
