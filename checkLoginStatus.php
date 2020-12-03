<?php

session_start();

$logged = isset($_SESSION['user_id']);

echo json_encode(['logged' => $logged]);