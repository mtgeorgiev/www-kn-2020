<?php

class UserController {

    public function store(User $user) {

        try {
            $db->insert($user);
        } catch (Exception $e) {
            // handle
        }

    }

    public function getAllResidents(): array {

        // $users = $db->getUsers();

        $users = [];

        $users[] = new Resident(1, "Ivan Petrov", "+359 12313 1423442", "42A", "owner");
        $users[] = new Resident(2, "Zjumbula Petrova", "+359 23234 564564", "42A", "owner");

        $users[] = new Resident(3, "Petar Ivanov", "+359 323423 66456", "45A", "owner");
        
        return $users;

    }

}