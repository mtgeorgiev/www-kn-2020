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

        $resident = new NewResidentRequest($_POST);

        $resident->validate(); // will throw exception if not valid

        $added = $userCtrl->addNewResident($resident);

        echo json_encode(['success' => $added]);

        break;
    }
}
