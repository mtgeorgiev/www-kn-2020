<?php
declare(strict_types=1);

spl_autoload_register(function($className) {
    require_once("./libs/$className.php");
});

$user = new User("Misho", 33);

echo $user->toString();
