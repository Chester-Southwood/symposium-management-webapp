<?php
session_start();
$_SESSION["user"] = "admin";
session_write_close();

require_once "../loginAPI/logoutFunctions.php";
?>