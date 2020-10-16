<?php

spl_autoload_register(function($className) {
    require_once("./libs/$className.php");
});

$userCtrl = new UserController();

$residents = $userCtrl->getAllResidents();

echo json_encode($residents);

// echo json_encode([
//     [
//         'id' => 1,
//         'name' => "Ivan Petrov",
//         'phoneNumber' => "+359 12313 1423442",
//         'apartmentNumber' => "42A",
//         'status' => "owner",
//     ]
// ]);
