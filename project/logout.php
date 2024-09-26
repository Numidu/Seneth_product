<?php
include('connection/connection.php');
session_start();
session_destroy();
header('Location: Logingpage.php');
exit(); 
?>
