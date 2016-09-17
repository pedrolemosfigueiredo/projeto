<?php
session_start();
session_destroy();
unset($_SESSION);
session_regenerate_id(true);
session_write_close();
header('Location: ../index.php');
exit;
?>