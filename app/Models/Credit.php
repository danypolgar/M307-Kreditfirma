<?php

class Credit {
    public $id;
    public $firstname;
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


    public function addCredit($firstname, $email, $phonenumber, $amount_rates, $fk_credit_pack) {

            $statement = $this->pdo->prepare('INSERT INTO `credit_administration` (firstname, email, phonenumber, amount_rates, fk_credit_pack) 
        VALUES (:firstname, :email, :phonenumber, :amount_rates, :fk_credit_pack)');
            $statement->bindparam(':firstname', $firstname, PDO::PARAM_STR);
            $statement->bindparam(':email', $email, PDO::PARAM_STR);
            $statement->bindparam(':phonenumber', $phonenumber, PDO::PARAM_STR);
            $statement->bindparam(':amount_rates', $amount_rates, PDO::PARAM_INT);
            $statement->bindparam(':fk_credit_pack', $fk_credit_pack, PDO::PARAM_INT);
            $statement->execute();

    }

    public function updateTask() {

        $statement = $this->pdo->prepare('UPDATE `credit_administration` SET firstname = :firstname, email = :email, phonenumber = :phonenumber, rent_status = :rent_status, fk_credit_pack = :fk_credit_pack WHERE id = :id');
        $statement->bindParam(':firstname', $_POST['firstname']);
        $statement->bindParam(':email', $_POST['email']);
        $statement->bindParam(':phonenumber', $_POST['phonenumber']);
        $statement->bindParam(':rent_status', $_POST['rent_status']);
        $statement->bindParam(':fk_credit_pack', $_POST['fk_credit_pack']);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
}