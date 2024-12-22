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
    <title>STREEM</title>

    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="itempage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
            crossorigin="anonymous"
    />
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
                    <li><a href="cofee.html">Coffee & Espresso</a></li>
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
    </ul>

    <!--    <div class="search">-->
    <!--        <input class="srch" type="search" name="se" placeholder="Serch here">-->
    <!--        <a href="#"><button class="btn">Search <i class="fa-solid fa-magnifying-glass"></i></button></a>-->
    <!---->
    <!--    </div>-->
    <div>
        <label class="logo" style="position: absolute; bottom:0px; right: 5px; ">SHAMOUT.com</label>
    </div>

    <div>
        <!--Shopping cart-->
        <?php

        $select_rows = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);

        ?>
        <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>
    </div>
</div><!-- End-->
<form action="" method="post">
    <div class="card">
        <input type="hidden" name="product_image" value="53.jpg">
        <input type="hidden" name="product_name" value="Beko Steamer With Water Tank Black Color.">
        <input type="hidden" class="priceValue" name="product_price" value="269">

  <div class="des">
    <h4>Beko Steamer 1600W, With Water Tank 230ml, Black Color.</h4>
  </div>


  <div class="image">
    <img src="imgs/sm3.jpg">
  </div>

  <div class="quantity">
    <table class="tab" style=" margin-left: 600px;">
      <tr>
        <td><h5> Price: &nbsp;<span class="priceValue">269 </span>₪</h5></td>
          <td>  <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart"> </td>

      </tr>
    </table>
  </div>
  <div class="detail">
    <h2 style="text-shadow: blue 0px 0px 3px;"> More details:</h2>
    <p>230ml removable water tank for uninterrupted steaming

      The rate of steam output is 25g/min<br>

      Heating power 1600 watts<br>

      Ceramic coated hot plate<br>

      LCD screen to show the settings<br>

      Fast heat up in 35 seconds<br>

      Drip stop feature: to protect against dripping water spots<br>

      It can be used for vertical and horizontal ironing<br>

      The length of the wire is 2.5 meters<br>

      Warranty: one year</p>
    <br>

  </div>


</div>
</form>
<script src="script.js"></script>
</body>
</html>