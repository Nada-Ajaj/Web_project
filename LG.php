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
    <title>LG</title>

    <link rel="stylesheet" href="cards.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="cart.css">


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
    <img src="imgs/lg2.webp">
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
            <input type="hidden" name="product_image" value="dish9.jpg">
            <input type="hidden" name="product_name" value="LG Dishwasher 10 Programs, 14 Place Setting">
            <input type="hidden" class="priceValue" name="product_price" value="5800">
            <figure class="image">
                <img src="imgs/dish9.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Dishwasher 10 Programs, 14 Place Setting, Inverter Direct Drive Save Energy, 3 Racks,</p>
            </div>

            <h3 class="priceValue"> 5800 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--card-->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dish10.jpg">
            <input type="hidden" name="product_name" value="LG Dishwasher 9 Programs, 14 Place Setting">
            <input type="hidden" class="priceValue" name="product_price" value="3500">
            <figure class="image">
                <img src="imgs/dish10.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Dishwasher 9 Programs, 14 Place Setting, Inverter Direct Drive Save Energy, 2 Racks,</p>
            </div>

            <h3 class="priceValue"> 3500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry5.jpg">
            <input type="hidden" name="product_name" value="LG Dryer 16Kg">
            <input type="hidden" class="priceValue" name="product_price" value="8500">
            <figure class="image">
                <img src="imgs/dry5.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Dryer 16Kg, Heat Pump System Save Energy, 14 Programs, Dark Stainless.</p>
            </div>

            <h3 class="priceValue"> 8500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry6.jpg">
            <input type="hidden" name="product_name" value="LG Dryer 8Kg">
            <input type="hidden" class="priceValue" name="product_price" value="3800">
            <figure class="image">
                <img src="imgs/dry6.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Dryer 8Kg, Heat Pump System Save Energy, 15 Programs, Dark Silver.</p>
            </div>

            <h3 class="priceValue"> 3800 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry7.jpg">
            <input type="hidden" name="product_name" value="LG Dryer 9Kg">
            <input type="hidden" class="priceValue" name="product_price" value="6500">
            <figure class="image">
                <img src="imgs/dry7.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Dryer 9Kg, Heat Pump System Save Energy, 13 Programs, Silver Color.</p>
            </div>

            <h3 class="priceValue"> 6500 </h3>
            <h3>₪</h3>

        </div>
    </form>
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

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="tv1.jpg">
            <input type="hidden" name="product_name" value="LG Television NanoCell, NANO84 Series, Size 50 Inch 4K UHD">
            <input type="hidden" class="priceValue" name="product_price" value="2800">
            <figure class="image">
                <img src="imgs/tv1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="tv1.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>LG Television NanoCell, NANO84 Series, Size 50 Inch 4K UHD, Smart WebOS TV.</p>
            </div>
            <h3 class="priceValue"> 2800 </h3>
            <h3>₪</h3>
        </div>
    </form>


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="tv2.jpg">
            <input type="hidden" name="product_name" value="LG Television UHD UQ80 Series Size 70 Inch 4K UHD Smart WebOS TV">
            <input type="hidden" class="priceValue" name="product_price" value="5000">
            <figure class="image">
                <img src="imgs/tv2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="tv2.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>LG Television UHD UQ80 Series Size 70 Inch 4K UHD Smart WebOS TV.</p>
            </div>
            <h3 class="priceValue"> 5000 </h3>
            <h3>₪</h3>
        </div>
    </form>

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="tv4.jpg">
            <input type="hidden" name="product_name" value="LG Television UHD UQ75 Series Size 55 Inch 4K UHD Smart ">
            <input type="hidden" class="priceValue" name="product_price" value="2500">
            <figure class="image">
                <img src="imgs/tv4.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="tv4.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>LG Television UHD UQ75 Series Size 55 Inch 4K UHD Smart WebOS TV.</p>
            </div>
            <h3 class="priceValue"> 2500 </h3>
            <h3>₪</h3>
        </div>
    </form>

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash6.jpg">
            <input type="hidden" name="product_name" value="LG Washer Capacity 10.5 kg, 14 Programs Dark Stainless.">
            <input type="hidden" class="priceValue" name="product_price" value="4000">
            <figure class="image">
                <img src="imgs/wash6.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="WASHER4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Washer Capacity 10.5 kg, 14 Programs, Inverter Direct Drive AI Motor, Dark Stainless.</p>
            </div>

            <h3 class="priceValue"> 4000 </h3><h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash7.jpg">
            <input type="hidden" name="product_name" value="LG Washer Capacity 10.5 Kg, 14 Programs Black.">
            <input type="hidden" class="priceValue" name="product_price" value="5500">
            <figure class="image">
                <img src="imgs/wash7.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="WASHER4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Washer Capacity 10.5 Kg, 14 Programs, Inverter Direct Drive Motor, Black.</p>
            </div>

            <h3 class="priceValue"> 5500 </h3><h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash8.jpg">
            <input type="hidden" name="product_name" value="LG Washer Capacity 12 kg, 14 Programs Black Stainless.">
            <input type="hidden" class="priceValue" name="product_price" value="5000">
            <figure class="image">
                <img src="imgs/wash8.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="WASHER4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Washer Capacity 12 kg, 14 Programs, Inverter Direct Drive AI Motor, Black Stainless.</p>
            </div>

            <h3 class="priceValue"> 5000 </h3><h3>₪</h3>

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
</body>
</html>
