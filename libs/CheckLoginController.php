<?php

class CheckLoginController {

    public static function check(array $loginData): ?array {

        try {
            $connection = (new Db())->getConnection();

            $selectStatement = $connection->prepare("
                SELECT * 
                FROM `residents`
                WHERE email=:email
            ");

            $result = $selectStatement->execute(['email' => $loginData['email']]);
            if (!$result) {
                // log error
                return null;
            }

            $user = $selectStatement->fetch();

            if (password_verify($loginData['password'], $user['password'])) {
                return $user;
            }
            
            return null;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }

        return null;
    }
}
