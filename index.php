<?php
require_once("controller/authenticationController.php");
$authentication = new AuthenticationController();
$authentication->action();
?>