<?php
session_start();
require_once("authenticationController.php");
$authentication = new AuthenticationController();
$authentication->action();
?>