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
    <title>REFRIGERATOR</title>
    <link rel="stylesheet" href="cards.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="cart.css">
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

<div class="header_imge">
  <img src="imgs/90.jpg">
</div>

<div class="h1clas">
  <h1>Available Devices</h1>
</div>

<div class="dis">

</div>

<div class="main">
    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref1.jpg">
            <input type="hidden" name="product_name" value="Beko Refrigerator 4 Door Capacity Black.">
            <input type="hidden" class="priceValue" name="product_price" value="8500">
            <figure class="image">
                <img src="imgs/ref1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Refrigerator 4 Door Capacity 580 Ltr, Inverter Compressor Save Energy, Black.</p>
            </div>

            <h3 class="priceValue"> 8500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref2.jpg">
            <input type="hidden" name="product_name" value="Beko Refrigerator 4 Door Capacity White.">
            <input type="hidden" class="priceValue" name="product_price" value="8000">
            <figure class="image">
                <img src="imgs/ref2.png">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Refrigerator 4 Door Capacity 580 Ltr, Inverter Compressor Save Energy, White.</p>
            </div>

            <h3 class="priceValue"> 8000 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref3.jpg">
            <input type="hidden" name="product_name" value="Beko Refrigerator 4 Door Capacity 624 Ltr ​Silver">
            <input type="hidden" class="priceValue" name="product_price" value="7700">
            <figure class="image">
                <img src="imgs/ref3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Refrigerator 4 Door Capacity 624 Ltr, Inverter Compressor Save Energy, ​Silver</p>
            </div>

            <h3 class="priceValue"> 7700 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref4.jpg">
            <input type="hidden" name="product_name" value="Beko Refrigerator 4 Door Capacity 626 Ltr Silver">
            <input type="hidden" class="priceValue" name="product_price" value="6800">
            <figure class="image">
                <img src="imgs/ref4.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Refrigerator 4 Door Capacity 626 Ltr, Inverter Compressor Save Energy, Silver</p>
            </div>

            <h3 class="priceValue"> 6800 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref5.jpg">
            <input type="hidden" name="product_name" value="EVA Refrigerator 4 Door Capacity 509 Ltr Black">
            <input type="hidden" class="priceValue" name="product_price" value="5500">
            <figure class="image">
                <img src="imgs/ref5.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>EVA Refrigerator 4 Door Capacity 509 Ltr, Inverter Compressor Save Energy, Black</p>
            </div>

            <h3 class="priceValue"> 5500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref9.jpg">
            <input type="hidden" name="product_name" value="FG Refrigerator White Color.">
            <input type="hidden" class="priceValue" name="product_price" value="6500">
            <figure class="image">
                <img src="imgs/ref9.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>FG Refrigerator Built-in Bottom Mount Capacity 247 Ltr, Right Hand Opening, White Color.</p>
            </div>

            <h3 class="priceValue"> 6500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref7.jpg">
            <input type="hidden" name="product_name" value="EVA Refrigerator Bottom Mount Capacity 553 Ltr, Stainless Steel.">
            <input type="hidden" class="priceValue" name="product_price" value="4400">
            <figure class="image">
                <img src="imgs/ref7.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>EVA Refrigerator Bottom Mount Capacity 553 Ltr, Stainless Steel.</p>
            </div>

            <h3 class="priceValue"> 4400 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref8.jpg">
            <input type="hidden" name="product_name" value="EVA Refrigerator  Capacity 582 Ltr Black Stainless.">
            <input type="hidden" class="priceValue" name="product_price" value="5500">
            <figure class="image">
                <img src="imgs/ref8.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>EVA Refrigerator Bottom Mount Capacity 582 Ltr, Dual Cooling, Black Stainless.</p>
            </div>

            <h3 class="priceValue"> 5500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref10.jpg">
            <input type="hidden" name="product_name" value="Landers Outdoor Refrigerator  68 Ltr, Black Color.">
            <input type="hidden" class="priceValue" name="product_price" value="1500">
            <figure class="image">
                <img src="imgs/ref10.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Landers Outdoor Refrigerator Single Door Capacity 68 Ltr, Black Color.</p>
            </div>

            <h3 class="priceValue"> 1500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref11.jpg">
            <input type="hidden" name="product_name" value="Landers Outdoor Refrigerator  98 Ltr, Black Color.">
            <input type="hidden" class="priceValue" name="product_price" value="2000">
            <figure class="image">
                <img src="imgs/ref11.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="R4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Landers Outdoor Refrigerator Single Door Capacity 98 Ltr, Black Color.</p>
            </div>

            <h3 class="priceValue"> 2000 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


</div>
<!--footer-->
<footer class="footer-distributed">

  <div class="footer-left">
    <h3>SHAMOUT</h3>

    <p class="footer-links">
      <a href="#">Home</a>
      |
      <a href="#">About</a>
      |
      <a href="#">Contact</a>
      |
      <a href="#">Blog</a>
    </p>

    <p class="footer-company-name">Copyright © 2021 <strong>SHAMOUT</strong> All rights reserved</p>
  </div>

  <div class="footer-center">
    <div>
      <i class="fa fa-map-marker"></i>
      <p><span>Palestine</span>
        Nablus</p>
    </div>

    <div>
      <i class="fa fa-phone"></i>
      <p>09 238 0106</p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="mailto:sagar00001.co@gmail.com">m.b.shammout@hotmail.com</a></p>
    </div>
  </div>
  <div class="footer-right">
    <p class="footer-company-about">
      <span>About the company</span>
      One of the leading Palestinian companies in the field of trading
      electrical appliances and their accessories.
    </p>
    <div class="footer-icons">
      <a href="https://www.facebook.com/shammoutt"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="https://www.instagram.com/shammout_electronics/?igshid=YmMyMTA2M2Y%3D&fbclid=IwAR22oeecFtWU9tI5TpuArRyhO8lUnQweViBZQ4B8V5VCcVwnLq08TX-nW4s"><i class="fab fa-instagram"></i></a>

    </div>
  </div>
</footer>

</div>
<script src="script.js"></script>
</body>
</html>