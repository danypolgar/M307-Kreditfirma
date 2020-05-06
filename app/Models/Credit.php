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

    public function getAllCurrentlyRunningRents ()
    {
        $statement = $this->pdo->prepare('SELECT * FROM credit_administration');
        $statement->execute();
        $results = $statement->fetchAll();
        $activeCredits = [];

        foreach ($results as $result) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $result['rent_date']);
            $calculatedInterval = $result['amount_rates'] * 15;
            $dateInterval = new DateInterval('P' . $calculatedInterval . 'D');
            $date->add($dateInterval);
            $dateTime = new DateTime();
            $dateTime->format('Y-m-d H:i:s');
            if ($dateTime < $date) {
                $activeCredits[] = $result;
            }
        }
        return $activeCredits;
    }

    public function updateTask() {

        $statement = $this->pdo->prepare('UPDATE `credit_administration` 
        SET nickname = :nickname, 
            email = :email, 
            phonenumber = :phonenumber, 
            rent_status = :rent_status, 
            fk_credit_pack = :fk_credit_pack 
            WHERE id = :id');
        $statement->bindParam(':firstname', $this->nickname);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phonenumber', $this->phonenumber);
        $statement->bindParam(':fk_credit_pack', $this->creditPack);
        $statement->bindParam(':id', $this->id);
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
        if (!preg_match('/^[0-9\-\(\)\/\+\s]{1,15}$/', $phoneNumber)) {
            return true;
        }
    }
}