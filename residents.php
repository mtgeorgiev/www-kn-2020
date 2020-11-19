<?php

session_start();

spl_autoload_register(function($className) {
    require_once("./libs/$className.php");
});

$userCtrl = new UserController();

switch ($_SERVER['REQUEST_METHOD']) {
    
    case 'GET': {

        $logged = isset($_SESSION['user_id']);

        if ($logged) {
            echo json_encode($userCtrl->getAllResidents(), JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['error' => 'За да видите този ресурс трябва да сте влезли в системата.'], JSON_UNESCAPED_UNICODE);
        }
        break;
    }

    case 'POST': {

        $residentRequest = new NewResidentRequest($_POST);

        try {
            $residentRequest->validate();
        } catch (RequestValidationException $ex) {
            die(json_encode($ex->getErrors()));
        }

        $added = $userCtrl->addNewResident($residentRequest);

        echo json_encode(['success' => $added]);

        break;
    }
}
