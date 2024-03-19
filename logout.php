<?php
session_start();
unset($_SESSION['auth_user_id']);
unset($_SESSION['auth_name']);

$_SESSION['status'] = 'Logged Out Successfully';
header("Location: index.php");
exit();