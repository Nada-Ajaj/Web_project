<?php
$conn = mysqli_connect('localhost','root','','user-db');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login-form.php');
};

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login-form.php');
};

if(isset($_POST['add_to_cart'])){


    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name'AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'product already added to cart';
    }else{
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(user_id,name, price, image, quantity) VALUES('$user_id','$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'product added to cart succesfully';
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cofee</title>

    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="itempage.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php

if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
};

?>
<div class="menu" >
    <ul>
        <li><a href="Shamout.php"><i class="fa-solid fa-house-chimney"></i> Home</a></li>

        <li><a href="#">Home Appliances <i class="fas fa-caret-down"></i></a>
            <div class="dropdown_menu">
                <ul>
                    <li><a href="Refrigerator.php">Refrigarator</a></li>
                    <li><a href="Oven.php">Oven</a></li>
                    <li><a href="Hob.php">Hob</a></li>
                    <li><a href="Hood.php">Hood</a></li>
                    <li><a href="washer.php">Washer</a></li>
                    <li><a href="dishwasher.php">Dishwasher</a></li>
                    <li><a href="Dryer.php">Dryer</a></li>
                </ul>
            </div>
        </li>

        <li><a href="#">Small Appliances <i class="fas fa-caret-down"></i></a>
            <div class="dropdown_menu">
                <ul>
                    <li><a href="Floor-care.php">Floor Care</a></li>
                    <li><a href="streem.php">Garment Care</a></li>
                    <li><a href="coffee.php">Coffee & Espresso</a></li>
                    <li><a href="Electric-Kitchen.php">Electric Kitchen</a></li>

                </ul>
            </div>
        </li>
        <li><a href="#">Personal & BeautyCare <i class="fas fa-caret-down"></i></a>
            <div class="dropdown_menu">
                <ul>
                    <li><a href="leser.php">Hair Removal</a></li>
                    <li><a href="men.php">Men's razors</a></li>
                    <li><a href="HairCare.php">Hair Straightener & Dryer</a></li>

                </ul>
            </div>
        </li>

        <li><a href="#">Heating & Cooling <i class="fas fa-caret-down"></i></a>
            <div class="dropdown_menu">
                <ul>
                    <li><a href="Fan.php">Fan</a></li>
                    <li><a href="Conditioner.php">Air Conditiner</a></li>
                    <li><a href="Heater.php">Heater</a></li>
                </ul>
            </div>
        </li>
        <li><a href="TV.php">TV </a>
        </li>

        <li>
            <!-- for space-->
        </li>

        <li class="no"><a href="login-form.php"><i class="fa-solid fa-circle-user fa-flip fa-2xl" style="color: #ffffff;"></i> </a>
        </li>

        <?php

        $select_rows = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);

        ?>
        <li class="no"> <a href="cart.php" class="cartt">
                <i class="fa-solid fa-cart-shopping fa-flip fa-xl" style="color: #ffffff;"></i> <span><?php echo $row_count; ?></span> </a></li>
    </ul>


    <div>
        <label class="logo">SHAMOUT.com</label>
    </div>


</div><!-- End-->
<form action="" method="post">
    <div class="card">
        <input type="hidden" name="product_image" value="11.jpg">
        <input type="hidden" name="product_name" value="Breville food processor 1000 watts silver color.">
        <input type="hidden" class="priceValue" name="product_price" value="1240">

        <div class="des">
    <h4>Breville food processor 1000 watts, capacity 1.5 / 2.6 liters, silver color.</h4>
  </div>


  <div class="image">
    <img src="imgs/aa1.jpg">
  </div>

  <div class="quantity">
    <table class="tab" style=" margin-left: 600px;">
      <tr>
        <td><h5> Price: &nbsp;<span class="priceValue">1240 </span>₪</h5></td>
        <td> <input type="submit" class="addToCart" value="add to cart" name="add_to_cart"></td>

      </tr>
    </table>
  </div>
  <div class="detail">
    <h2 style="text-shadow: blue 0px 0px 3px;"> More details:</h2>
    <p>Blade System: Quad® Blade System - Four razor-sharp cutting blades improve chopping<br> when preparing larger amounts of meat and vegetables.<br>

      cutting discs

      Variable cutting disc: 24 settings from 0.3mm thin to 8mm thick<br>

      Potato Peeling Disc: It peels potatoes in large quantities from 6-7 grains in 30 seconds.<br>

      Quad Blades: 4 blades reduce preparation time by cutting in separate steps.<br>

      Dough Blade: The kneading process begins as the sharp edge of the blade aids in kneading<br>
      For reverse chopping: coarse or fine chopping using high-performance stainless steel cutting surfaces<br>

      Safety System: It prevents the motor from running unless the bowl and lid are properly locked in place,<br> and an appropriate amount of food is placed<br>
      The capacity of the jug is 1.5 liters<br>

       11-cup bowl capacity for dry ingredients (2.6 liters)<br>

       8 cup capacity for liquid ingredients. (1.8 liters)<br>

      Speed ​​settings: 2 speeds plus pulse<br>

      Voltage: 220-240 volts<br>
    </p>
    <br>

  </div>


</div>
</form>

<script src="script.js"></script>

</body>
</html>