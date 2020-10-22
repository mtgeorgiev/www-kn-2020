<?php

spl_autoload_register(function($className) {
    require_once("./libs/$className.php");
});

$userCtrl = new UserController();

$residents = $userCtrl->getAllResidents();

echo json_encode($residents, JSON_UNESCAPED_UNICODE);
