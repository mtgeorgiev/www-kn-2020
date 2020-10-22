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

}