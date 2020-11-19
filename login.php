<?php

session_start();

spl_autoload_register(function($className) {
    require_once("./libs/$className.php");
});


// request validation is optional

// check if user is valid with valid password
$loggedUser = CheckLoginController::check($_POST);

$loginSuccessful = $loggedUser !== null;

if ($loginSuccessful) {
    $_SESSION['user_id'] = $loggedUser['id'];
}

echo json_encode(['success' => $loginSuccessful]);
