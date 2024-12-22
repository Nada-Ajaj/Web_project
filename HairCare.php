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

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'AND user_id = '$user_id'") or die('query failed');

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
    <title>Hair Care</title>
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
    <img src="imgs/71.jpg">
</div>

<div class="h1clas">
    <h1>Available Devices</h1>
</div>

<div class="dis">
</div>
<div class="main" >

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="28.jpg">
            <input type="hidden" name="product_name" value="Trust hair curler 32 mm, black color.">
            <input type="hidden" class="priceValue" name="product_price" value="99">
            <figure class="image">
                <img src="imgs/28.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="hair1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust hair curler 32 mm, black color.</p>
            </div>


            <h3 class="priceValue"> 99 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="29.jpg">
            <input type="hidden" name="product_name" value="Chi hair straightener, temperature of 220 degrees Celsius, black">
            <input type="hidden" class="priceValue" name="product_price" value="459">
            <figure class="image">
                <img src="imgs/29.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="hair2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Chi hair straightener, temperature of 220 degrees Celsius, black color.</p>
            </div>


            <h3 class="priceValue"> 459 </h3>
            <h3>₪</h3>

        </div>
    </form>


    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="30.jpg">
            <input type="hidden" name="product_name" value="Hair straightener with thin ceramic plates, black color">
            <input type="hidden" class="priceValue" name="product_price" value="89">
            <figure class="image">
                <img src="imgs/30.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="hair3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Hair straightener with thin ceramic plates, black color.</p>
            </div>


            <h3 class="priceValue"> 89 </h3>
            <h3>₪</h3>

        </div>

    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="31.jpg">
            <input type="hidden" name="product_name" value="Daphne (Allure) Cordless Hair Straightener Brush 185°, Black">
            <input type="hidden" class="priceValue" name="product_price" value="639">
            <figure class="image">
                <img src="imgs/31.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="hair4.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>Daphne (Allure) Cordless Hair Straightener Brush 185°, Black.</p>
            </div>


            <h3 class="priceValue"> 639 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="32.jpg">
            <input type="hidden" name="product_name" value="Daphne (Classic) Hair Straightener Brush 185°, Black">
            <input type="hidden" class="priceValue" name="product_price" value="519">
            <figure class="image">
                <img src="imgs/32.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Daphne (Classic) Hair Straightener Brush 185°, Black.</p>
            </div>


            <h3 class="priceValue"> 519 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="33.jpg">
            <input type="hidden" name="product_name" value="Dyson Cordless Hair Straightener 210°C, Black Nickel/Fuchsia.">
            <input type="hidden" class="priceValue" name="product_price" value="2180">
            <figure class="image">
                <img src="imgs/33.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Dyson Cordless Hair Straightener 210°C, Black Nickel/Fuchsia.</p>
            </div>


            <h3 class="priceValue"> 2180 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="34.jpg">
            <input type="hidden" name="product_name" value="Remington Hair Straightener with Thin Ceramic Plates, 220°C, Black">
            <input type="hidden" class="priceValue" name="product_price" value="99">
            <figure class="image">
                <img src="imgs/34.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Remington Hair Straightener with Thin Ceramic Plates, 220°C, Black.</p>
            </div>


            <h3 class="priceValue"> 99 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="36.jpg">
            <input type="hidden" name="product_name" value="Remington Hair Dryer 2100 Watts, 2 Speed ​​Settings, Black">
            <input type="hidden" class="priceValue" name="product_price" value="219">
            <figure class="image">
                <img src="imgs/36.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>Remington Hair Dryer 2100 Watts, 2 Speed ​​Settings, Black/Gold.</p>
            </div>


            <h3 class="priceValue"> 219 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="36.jpg">
            <input type="hidden" name="product_name" value="TRemington Curly Hair Curler 25mm, 220°C, Grey.">
            <input type="hidden" class="priceValue" name="product_price" value="199">
            <figure class="image">
                <img src="imgs/36.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>TRemington Curly Hair Curler 25mm, 220°C, Grey.</p>
            </div>


            <h3 class="priceValue"> 199 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="40.jpg">
            <input type="hidden" name="product_name" value="Carrera Curly Hair Curler 3 Sizes, 210°C, Grey/Rose Gold.">
            <input type="hidden" class="priceValue" name="product_price" value="239">
            <figure class="image">
                <img src="imgs/40.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Carrera Curly Hair Curler 3 Sizes, 210°C, Grey/Rose Gold.</p>
            </div>


            <h3 class="priceValue"> 239 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--- card -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="38.jpg">
            <input type="hidden" name="product_name" value="Grundig Ionic Hair Straightener, 130-230°C, Grey/Rose Gold">
            <input type="hidden" class="priceValue" name="product_price" value="219">
            <figure class="image">
                <img src="imgs/38.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Grundig Ionic Hair Straightener, 130-230°C, Grey/Rose Gold.<br><br></p>
            </div>


            <h3 class="priceValue"> 219 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="39.jpg">
            <input type="hidden" name="product_name" value="Carrera Hair Curler 210°C Grey/Rose Gold.">
            <input type="hidden" class="priceValue" name="product_price" value="249">
            <figure class="image">
                <img src="imgs/39.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Carrera Hair Curler 210°C Grey/Rose Gold.<br><br></p>
            </div>


            <h3 class="priceValue"> 249 </h3> <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="37.jpg">
            <input type="hidden" name="product_name" value="Grundig Hair Dryer 2100W with Ionic Technology, 2 Speed, Black">
            <input type="hidden" class="priceValue" name="product_price" value="210">
            <figure class="image">
                <img src="imgs/37.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Grundig Hair Dryer 2100W with Ionic Technology, 2 Speed, Black/Rose Gold.</p>
            </div>

            <h3 class="priceValue"> 210 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--cards -->


</div>
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
<script src="script.js"></script>
</body>
</html>