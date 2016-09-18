<?php
require_once('controller/authenticationController.php');
session_start();
$authenticationController = new AuthenticationController();
$authenticationController->media();
?>