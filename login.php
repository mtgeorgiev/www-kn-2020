<?php

session_start();

$postData = json_decode(file_get_contents('php://input'), true);

spl_autoload_register(function($className) {
    require_once("./libs/$className.php");
});

// request validation is optional

// check if user is valid with valid password
$loggedUser = CheckLoginController::check($postData);

$loginSuccessful = $loggedUser !== null;

var_dump($_SESSION);
if ($loginSuccessful) {
    $_SESSION['user_id'] = $loggedUser['id'];
}

echo json_encode(['success' => $loginSuccessful]);
