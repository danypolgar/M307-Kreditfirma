<?php

class Credit {
    public $id;
    public $firstname;
    public $email;
    public $phonenumber;
    public $amountRates;
    public $creditPack;

    public function __construct()
    {
        $this->pdo = connectToDatabase();
    }


    public function addCredit() {
        var_dump($this->firstname);
        var_dump($this->email);
        var_dump($this->phonenumber);
        var_dump($this->amountRates);
        var_dump($this->creditPack);
        $statement = $this->pdo->prepare('INSERT INTO credit_administration (firstname, email, phonenumber, amount_rates, fk_credit_pack) 
                                                    VALUES (:firstname, :email, :phonenumber, :amount_rates, fk_credit_pack)');
        $statement->bindParam(':firstname', $this->firstname);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phonenumber', $this->phonenumber);
        $statement->bindParam(':amount_rates', $this->amountRates);
        $statement->bindParam(':fk_credit_pack', $this->creditPack);
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
        SET firstname = :firstname, 
            email = :email, 
            phonenumber = :phonenumber, 
            rent_status = :rent_status, 
            fk_credit_pack = :fk_credit_pack 
            WHERE id = :id');
        $statement->bindParam(':firstname', $this->firstname);
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
}