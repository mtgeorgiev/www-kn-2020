<?php

session_start();

// validate request is optional

// check if user is valid with valid password
// $loginSuccessful = $checkLoginController->check($_POST);

$loginSuccessful = true;

if ($loginSuccessful) {
    $_SESSION['user_id'] = 16;
}

echo json_encode(['success' => $loginSuccessful]);
