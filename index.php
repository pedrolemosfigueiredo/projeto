<?php
session_save_path('sessions');
ini_set('session.gc_probability', 1);
session_start();
require_once("controller/authenticationController.php");
$authentication = new AuthenticationController();
$authentication->action();
?>