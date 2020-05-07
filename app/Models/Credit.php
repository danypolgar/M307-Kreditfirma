<?php

class Credit {
    public $id;
    public $nickname;
    public $email;
    public $phonenumber;
    public $amount_rates;
    public $rent_status;
    public $rent_date;
    public $fk_credit_pack;

    public function __construct()
    {

        $this->pdo = connectToDatabase();
    }


    public function addCredit($nickname, $email, $phonenumber, $amount_rates, $fk_credit_pack) {

            $statement = $this->pdo->prepare('INSERT INTO `credit_administration` (nickname, email, phonenumber, amount_rates, fk_credit_pack) 
        VALUES (:nickname, :email, :phonenumber, :amount_rates, :fk_credit_pack)');
            $statement->bindparam(':nickname', $nickname, PDO::PARAM_STR);
            $statement->bindparam(':email', $email, PDO::PARAM_STR);
            $statement->bindparam(':phonenumber', $phonenumber, PDO::PARAM_STR);
            $statement->bindparam(':amount_rates', $amount_rates, PDO::PARAM_INT);
            $statement->bindparam(':fk_credit_pack', $fk_credit_pack, PDO::PARAM_INT);
            $statement->execute();

    }

    public function getAllCurrentlyRunningRents()
    {
        $statement = $this->pdo->prepare('SELECT * FROM credit_administration as credits INNER JOIN creditpackages as packages ON packages.id = credits.fk_credit_pack ORDER BY DATE_ADD(credits.rent_date, INTERVAL credits.amount_rates * 15 DAY)');
        $statement->execute();
        $results = $statement->fetchAll();
        $activeCredits = [];
        foreach ($results as $result) {
            if ($result["rent_status"] == 0) {
                $activeCredits[] = $result;
            }
        }
        return $activeCredits;
    }

    public function getUserById($id) {
        $statement = $this->pdo->prepare('SELECT * FROM credit_administration as credit INNER JOIN creditpackages as packages ON packages.id = credit.fk_credit_pack WHERE credit.id = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function updateCredit($id, $nickname, $email, $phonenumber, $fk_credit_pack, $rent_status) {

        $statement = $this->pdo->prepare('UPDATE `credit_administration` 
        SET nickname = :nickname, 
            email = :email, 
            phonenumber = :phonenumber, 
            rent_status = :rent_status, 
            fk_credit_pack = :fk_credit_pack 
            WHERE id = :id');
        $statement->bindParam(':nickname', $nickname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phonenumber', $phonenumber);
        $statement->bindParam(':fk_credit_pack', $fk_credit_pack);
        $statement->bindParam(':rent_status', $rent_status);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public function updateCreditStatus($id) {
        $status = 1;
        $statement = $this->pdo->prepare('UPDATE `credit_administration` SET rent_status = :status WHERE id = :id');
        $statement->bindParam(':status', $status);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public function getAllCreditPackages() {
        $statement = $this->pdo->prepare('SELECT * FROM `creditpackages`');
        $statement->execute();
        $statement = $statement->fetchAll();
        return $statement;
    }
    public function validateName($nickname) {
        if (!preg_match('/^[a-zA-Z]{1,50}$/', $nickname)) {
            return true;
        }
    }

    public function validateEmail($email) {
        if (!(stripos($email, '@') && strlen($email) <= 70 && $email != '')) {
            return true;
        }
    }

    public function validatePhoneNumber($phoneNumber) {
        if (!preg_match('/^[0-9\-\(\)\/\+\s]{0,15}$/', $phoneNumber)) {
            return true;
        }
    }

    public function validateRates($rates) {
        if (!is_numeric($rates) && $rates >= 10 && $rates < 0) {
            return true;
        }
    }

    public function validateCreditPackages($creditPackages) {
        if ($creditPackages < 0 && $creditPackages > 40) {
            return true;
        }
    }
}