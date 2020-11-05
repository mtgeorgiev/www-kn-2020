<?php

spl_autoload_register(function($className) {
    require_once("./libs/$className.php");
});

$userCtrl = new UserController();

switch ($_SERVER['REQUEST_METHOD']) {
    
    case 'GET': {
        echo json_encode($userCtrl->getAllResidents(), JSON_UNESCAPED_UNICODE);
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
