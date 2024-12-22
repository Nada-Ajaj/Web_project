<?php
$conn = mysqli_connect('localhost','root','','user-db');

$id = $_GET['edit'];

if(isset($_POST['update_oven'])){

    $oven_name = $_POST['oven_name'];
    $oven_price = $_POST['oven_price'];
    $oven_image = $_FILES['oven_image']['name'];
    $oven_quantity = $_POST['oven_quantity'];
    $oven_image_tmp_name = $_FILES['oven_image']['tmp_name'];
    $oven_image_folder = 'imgs'.$oven_image;

    if(empty($oven_name) || empty($oven_price) || empty($oven_image)  || empty($oven_quantity)){
        $message[] = 'please fill out all!';
    }else{

        $update_data = " UPDATE oven SET name='$oven_name', price='$oven_price', image='$oven_image' , quantity='$oven_quantity' WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if($upload){
            move_uploaded_file($oven_image_tmp_name, $oven_image_folder);
            header('location:add_oven.php');
        }else{
            $message[] = 'please fill out all!';
        }

    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-product.css">
    <title>oven Update</title>
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}
?>

<div class="container">


    <div class="admin-product-form-container centered">

        <?php

        $select = mysqli_query($conn, "SELECT * FROM oven WHERE id = '$id'");
        while($row = mysqli_fetch_assoc($select)){

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <h3 class="title">update the product</h3>
                <input type="text" class="box" name=oven_name" value="<?php echo $row['name']; ?>" placeholder="enter the oven name">
                <input type="number" min="0" class="box" name="oven_price" value="<?php echo $row['price']; ?>" placeholder="enter the oven price">
                <input type="file" class="box" name="oven_image"  accept="image/png, image/jpeg, image/jpg">
                <input type="number" min="0" class="box" name="oven_quantity" value="<?php echo $row['quantity']; ?>" placeholder="enter the oven quantity">

                <input type="submit" value="update oven" name="update_oven" class="ww">
                <a href="add_oven.php" class="ww">go back!</a>
            </form>



        <?php }; ?>



    </div>

</div>

</body>
</html>