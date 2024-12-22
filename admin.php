<?php

$conn = mysqli_connect('localhost','root','','user-db');

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login-form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="loginn.css">

</head>
<body>

<div class="container">

    <div class="content">
        <h3>hi, <span>admin</span></h3>
        <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
        <p>this is an admin page</p>
        <a href="add-by-admin.php" class="btn">login</a>
        <a href="register-form.php" class="btn">register</a>
        <a href="logout.php" class="btn">logout</a>
    </div>

</div>

</body>
</html>