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
    <title>Electric-Kitchen</title>
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
    <img src="imgs/97.jpg">
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
            <input type="hidden" name="product_image" value="11.jpg">
            <input type="hidden" name="product_name" value="Breville food processor 1000 watts silver color.">
            <input type="hidden" class="priceValue" name="product_price" value="1240">
            <figure class="image">
                <img src="imgs/11.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Breville food processor 1000 watts, capacity 1.5 / 2.6 liters, silver color.</p>
            </div>

            <h3 class="priceValue"> 1240 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="2.jpg">
            <input type="hidden" name="product_name" value="Trust vegetable silver color.">
            <input type="hidden" class="priceValue" name="product_price" value="99">
            <figure class="image">
                <img src="imgs/2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust vegetable chopper 300 watts, 2 liter capacity, silver color.</p>
            </div>

            <h3 class="priceValue"> 99 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="3.jpg">
            <input type="hidden" name="product_name" value="Breville fruit and vegetable.">
            <input type="hidden" class="priceValue" name="product_price" value="1100">
            <figure class="image">
                <img src="imgs/3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Breville fruit and vegetable juicer 1250 watts, silver color.</p>
            </div>

            <h3 class="priceValue"> 1100 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="4.jpg">
            <input type="hidden" name="product_name" value="Trust juicer with slow juice technology.">
            <input type="hidden" class="priceValue" name="product_price" value="249">
            <figure class="image">
                <img src="imgs/4.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust juicer with slow juice technology 120 watts, <br>bowl capacity 1.2 liters, black color.</p>
            </div>

            <h3 class="priceValue"> 249 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="5.jpg">
            <input type="hidden" name="product_name" value="Trust Electric Citrus Juicer Stainless Steel.">
            <input type="hidden" class="priceValue" name="product_price" value="99">
            <figure class="image">
                <img src="imgs/5.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust Electric Citrus Juicer 40W, 1.2L Bowl, Stainless Steel.</p>
            </div>

            <h3 class="priceValue"> 99 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="6.jpg">
            <input type="hidden" name="product_name" value="Breville fruit and vegetable juicer 1300 watts, silver color.">
            <input type="hidden" class="priceValue" name="product_price" value="1090">
            <figure class="image">
                <img src="imgs/6.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Breville fruit and vegetable juicer 1300 watts, silver color.</p>
            </div>

            <h3 class="priceValue"> 1090 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->



    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="7.jpg">
            <input type="hidden" name="product_name" value="LG Microwave 25 Liter Capacity.">
            <input type="hidden" class="priceValue" name="product_price" value="950">
            <figure class="image">
                <img src="imgs/7.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Microwave 25 Liter Capacity, 1150 Watt, Smart Inverter Technology, Even Heating and Easy Cleaning, Black.</p>
            </div>

            <h3 class="priceValue"> 950 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->




    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="8.jpg">
            <input type="hidden" name="product_name" value="LG Microwave with Grill, 42 Liter Capacity, 1100 Watt.">
            <input type="hidden" class="priceValue" name="product_price" value="1200">
            <figure class="image">
                <img src="imgs/8.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Microwave with Grill, 42 Liter Capacity, 1100 Watt, <br>Smart Inverter Technology, Even Heating and Easy Cleaning,<br> Silver Color.</p>
            </div>

            <h3 class="priceValue"> 1200 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="9.jpg">
            <input type="hidden" name="product_name" value="Built-in Microwave Sauter, 34 L, 1500 W 10 Programs">
            <input type="hidden" class="priceValue" name="product_price" value="1490">
            <figure class="image">
                <img src="imgs/9.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p> Built-in Microwave Sauter, 34 L, 1500 W, 2 in 1, 10 Programs, Silver</p>
            </div>

            <h3 class="priceValue"> 1490 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="10.jpg">
            <input type="hidden" name="product_name" value="Korkmaz Toaster Pressure 1800W, Multi-Cooking, Vanilla Color.">
            <input type="hidden" class="priceValue" name="product_price" value="429">
            <figure class="image">
                <img src="imgs/10.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p> Korkmaz Toaster Pressure 1800W, Multi-Cooking, Vanilla Color.</p>
            </div>

            <h3 class="priceValue"> 429 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->



    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="11.jpg">
            <input type="hidden" name="product_name" value="Breville toaster pressure 2200 watts, silver color.">
            <input type="hidden" class="priceValue" name="product_price" value="629">
            <figure class="image">
                <img src="imgs/11.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p> Breville toaster pressure 2200 watts, silver color.</p>
            </div>

            <h3 class="priceValue"> 629 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="12.jpg">
            <input type="hidden" name="product_name" value="Trust hand mixer 100 watts, 5 speeds, white.">
            <input type="hidden" class="priceValue" name="product_price" value="49">
            <figure class="image">
                <img src="imgs/12.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p> Trust hand mixer 100 watts, 5 speeds, white.</p>
            </div>

            <h3 class="priceValue"> 49 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="18.jpg">
            <input type="hidden" name="product_name" value="Stand mixer 2000 watts 12 liters, silver color.">
            <input type="hidden" class="priceValue" name="product_price" value="799">
            <figure class="image">
                <img src="imgs/18.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p> Stand mixer 2000 watts, with a bowl capacity of 12 liters, silver color.</p>
            </div>

            <h3 class="priceValue"> 799 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="19.jpg">
            <input type="hidden" name="product_name" value="Trust stand mixer 1300 watts, 6.5 liter bowl, black color">
            <input type="hidden" class="priceValue" name="product_price" value="399">
            <figure class="image">
                <img src="imgs/19.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust stand mixer 1300 watts, 6.5 liter bowl, black color</p>
            </div>

            <h3 class="priceValue"> 399 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="20.jpg">
            <input type="hidden" name="product_name" value="Trust stand mixer 1500 watts, with a bowl capacity of 8.5 liters, silver color.">
            <input type="hidden" class="priceValue" name="product_price" value="399">
            <figure class="image">
                <img src="imgs/20.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust stand mixer 1500 watts, with a bowl capacity of 8.5 liters, silver color.</p>
            </div>

            <h3 class="priceValue"> 499 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->



    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="21.jpg">
            <input type="hidden" name="product_name" value="Breville electric kettle 1500 watts, 1.7 liter capacity, stainless steel.">
            <input type="hidden" class="priceValue" name="product_price" value="349">
            <figure class="image">
                <img src="imgs/21.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Breville electric kettle 1500 watts, 1.7 liter capacity, stainless steel.</p>
            </div>

            <h3 class="priceValue"> 349 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->




    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="22.jpg">
            <input type="hidden" name="product_name" value="Trust electric kettle 1800 watts, 1.7 liter capacity, black color.">
            <input type="hidden" class="priceValue" name="product_price" value="69">
            <figure class="image">
                <img src="imgs/22.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="A3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust electric kettle 1800 watts, 1.7 liter capacity, black color.</p>
            </div>

            <h3 class="priceValue"> 69 </h3>
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