<?php
declare(strict_types=1);

class UserController {

    public function store(User $user) {

        try {
            $db->insert($user);
        } catch (Exception $e) {
            // handle
        }

    }

    public function getAllResidents(): array {

        $residents = [];

        $query = (new Db())->getConnection()->query("SELECT * FROM `residents`") or die("failed!");

        while ($residentDbRow = $query->fetch()) {
            $residents[] = Resident::createFromArray($residentDbRow);
        }
        
        return $residents;

    }

    public function addNewResident(NewResidentRequest $residentRequest): bool {
        
        try {
            $connection = (new Db())->getConnection();

            $insertStatement = $connection->prepare("
                INSERT INTO `residents` (name, phoneNumber, email, password, status, appartmentNumber)
                    VALUES (:name, :phoneNumber, :email, :password, :status, :appartmentNumber)
            ");

            $result = $insertStatement->execute($residentRequest->toArray());
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }

        if ($result === false) {
            // var_dump($insertStatement->errorInfo());
        }

        return $result;

    }

}