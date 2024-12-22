<?php
$conn = mysqli_connect('localhost','root','','user-db');

$id = $_GET['edit'];

if(isset($_POST['update_dishwasher'])){

    $dishwasher_name = $_POST['dishwasher_name'];
    $dishwasher_price = $_POST['dishwasher_price'];
    $dishwasher_image = $_FILES['dishwasher_image']['name'];
    $dishwasher_quantity = $_POST['dishwasher_quantity'];
    $dishwasher_image_tmp_name = $_FILES['dishwasher_image']['tmp_name'];
    $dishwasher_image_folder = 'imgs'.$dishwasher_image;

    if(empty($dishwasher_name) || empty($dishwasher_price) || empty($dishwasher_image)  || empty($dishwasher_quantity)){
        $message[] = 'please fill out all!';
    }else{

        $update_data = "UPDATE dishwasher SET name='$dishwasher_name', price='$dishwasher_price', image='$dishwasher_image' , quantity='$dishwasher_quantity' WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if($upload){
            move_uploaded_file($dishwasher_image_tmp_name, $dishwasher_image_folder);
            header('location:add_dishwasher.php');
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
    <title>Dishwasher Update</title>
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

        $select = mysqli_query($conn, "SELECT * FROM dishwasher WHERE id = '$id'");
        while($row = mysqli_fetch_assoc($select)){

            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <h3 class="title">update the product</h3>
                <input type="text" class="box" name="dishwasher_name" value="<?php echo $row['name']; ?>" placeholder="enter the dishwasher name">
                <input type="number" min="0" class="box" name="dishwasher_price" value="<?php echo $row['price']; ?>" placeholder="enter the dishwasher price">
                <input type="file" class="box" name="dishwasher_image"  accept="image/png, image/jpeg, image/jpg">
                <input type="number" min="0" class="box" name="dishwasher_quantity" value="<?php echo $row['quantity']; ?>" placeholder="enter the dishwasher quantity">

                <input type="submit" value="update dishwasher" name="update_dishwasher" class="ww">
                <a href="add_dishwasher.php" class="ww">go back!</a>
            </form>



        <?php }; ?>



    </div>

</div>

</body>
</html>