<?php

require_once '../utils/autoloader.php';

$validator = new ValidatorService();

$validator->checkMethods("POST");

session_start();

session_destroy();

header("Location: ../index.php");