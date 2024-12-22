
<?php

$conn = mysqli_connect('localhost','root','','user-db');

session_start();
session_unset();
session_destroy();

header('location:login-form.php');

?>