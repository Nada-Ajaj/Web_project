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
    <title>OFFERS</title>
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
    <img src="imgs/70.jpg">
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
            <input type="hidden" name="product_image" value="cof1.jpg">
            <input type="hidden" name="product_name" value="Beko Arabic Coffee Machine 1100W">
            <input type="hidden" class="priceValue" name="product_price" value="665">
            <figure class="image">

                <img src="imgs/cof1.jpg" >

                <div class="product-over">

                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">

                    <a href="cofee1.php" class="more-inf">More Info</a>
                </div>
            </figure>
            <div class="des" name="product_name">
                <p>Beko Arabic Coffee Machine 1100W, Prepare Up to 6 Cups, Black/Rose Gold Color.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>950₪ </del><h3>

                    <h3 class="priceValue"> 665 </h3>
                    <h3>₪</h3>


        </div>
    </form>


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof2.jpg">
            <input type="hidden" name="product_name" value="Beko Espresso Coffee Machine 1200W">
            <input type="hidden" class="priceValue" name="product_price" value="350">

            <!--<a href="cof2.html" class="text">-->
            <figure class="image">
                <img src="imgs/cof2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="cofee2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Espresso Coffee Machine 1200W, Stainless Steel, Black Color.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>500₪ </del><h3>

                    <h3 class="priceValue"> 350 </h3>
                    <h3>₪</h3>
        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof4.jpg">
            <input type="hidden" name="product_name" value="Beko Espresso Coffee Machine 1350W">
            <input type="hidden" class="priceValue" name="product_price" value="1400">
            <figure class="image">
                <img src="imgs/cof4.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="cofee3.php" class="more-inf">More Info</a
                    >
                </div>
            </figure>

            <div class="des">
                <p>Beko Espresso Coffee Machine 1350W, Stainless Steel, Black Color.</p>
            </div>
            <h3 class="discount"  name="product_price"><del>2000₪ </del><h3>

                    <h3 class="priceValue"> 1400 </h3>
                    <h3>₪</h3>
        </div>
    </form>
    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof5.jpg">
            <input type="hidden" name="product_name" value="Korkmaz Turkish Coffee Machine 400W">
            <input type="hidden" class="priceValue" name="product_price" value="189">

            <figure class="image">
                <img src="imgs/cof5.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="cofee4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Korkmaz Turkish Coffee Machine 400W ,Prepare up to 4 Cups, Red/Chrome Color.</p>
            </div>
            <h3 class="discount"  name="product_price"><del>270₪ </del><h3>

                    <h3 class="priceValue"> 189 </h3>
                    <h3>₪</h3>
        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="2.jpg">
            <input type="hidden" name="product_name" value="Trust vegetable silver color.">
            <input type="hidden" class="priceValue" name="product_price" value="70">
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

            <h3 class="discount"  name="product_price"><del>99₪ </del><h3>

                    <h3 class="priceValue"> 70 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="3.jpg">
            <input type="hidden" name="product_name" value="Breville fruit and vegetable.">
            <input type="hidden" class="priceValue" name="product_price" value="770">
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
            <h3 class="discount"  name="product_price"><del>1100₪ </del><h3>

                    <h3 class="priceValue"> 770 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="4.jpg">
            <input type="hidden" name="product_name" value="Trust juicer with slow juice technology.">
            <input type="hidden" class="priceValue" name="product_price" value="175">
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
            <h3 class="discount"  name="product_price"><del>249₪ </del><h3>

                    <h3 class="priceValue"> 175 </h3>
                    <h3>₪</h3>
        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="7.jpg">
            <input type="hidden" name="product_name" value="LG Microwave 25 Liter Capacity.">
            <input type="hidden" class="priceValue" name="product_price" value="665">
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

            <h3 class="discount"  name="product_price"><del>950₪ </del><h3>

                    <h3 class="priceValue"> 665 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->




    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="8.jpg">
            <input type="hidden" name="product_name" value="LG Microwave with Grill, 42 Liter Capacity, 1100 Watt.">
            <input type="hidden" class="priceValue" name="product_price" value="840">
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

            <h3 class="discount"  name="product_price"><del>1200₪ </del><h3>

                    <h3 class="priceValue"> 840 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="9.jpg">
            <input type="hidden" name="product_name" value="Built-in Microwave Sauter, 34 L, 1500 W 10 Programs">
            <input type="hidden" class="priceValue" name="product_price" value="1040">
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

            <h3 class="discount"  name="product_price"><del>1490₪ </del><h3>

                    <h3 class="priceValue"> 1043 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="fan1.jpg">
            <input type="hidden" name="product_name" value="Star Fan 2 in One, 120W, 18 Inch, Black Color.">
            <input type="hidden" class="priceValue" name="product_price" value="210">
            <figure class="image">
                <img src="imgs/fan1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="fan1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Star Fan 2 in One, 120W, 18 Inch, Black Color.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>300₪ </del><h3>

                    <h3 class="priceValue"> 210 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="fan3.jpg">
            <input type="hidden" name="product_name" value="BlueStar USB Fan 4W Wooden.">
            <input type="hidden" class="priceValue" name="product_price" value="49">
            <figure class="image">
                <img src="imgs/fan3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="fan2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>BlueStar USB Fan 4W Wooden.<br><br></p>
            </div>

            <h3 class="discount"  name="product_price"><del>70₪ </del><h3>

                    <h3 class="priceValue"> 49 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="fan2.jpg">
            <input type="hidden" name="product_name" value="Midea Cooler Fan Stand 16 inch, White Color.">
            <input type="hidden" class="priceValue" name="product_price" value="105">
            <figure class="image">
                <img src="imgs/fan2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="fan3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Midea Cooler Fan Stand 16 inch, White Color.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>150₪ </del><h3>

                    <h3 class="priceValue"> 105 </h3>
                    <h3>₪</h3>
        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="32.jpg">
            <input type="hidden" name="product_name" value="Daphne (Classic) Hair Straightener Brush 185°, Black">
            <input type="hidden" class="priceValue" name="product_price" value="364">
            <figure class="image">
                <img src="imgs/32.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Daphne (Classic) Hair Straightener Brush 185°, Black.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>519₪ </del><h3>

                    <h3 class="priceValue"> 364 </h3>
                    <h3>₪</h3>

        </div>
    </form>

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="33.jpg">
            <input type="hidden" name="product_name" value="Dyson Cordless Hair Straightener 210°C, Black Nickel/Fuchsia.">
            <input type="hidden" class="priceValue" name="product_price" value="1526">
            <figure class="image">
                <img src="imgs/33.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Dyson Cordless Hair Straightener 210°C, Black Nickel/Fuchsia.</p>
            </div>


            <h3 class="discount"  name="product_price"><del>2180₪ </del><h3>

                    <h3 class="priceValue"> 1562 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="34.jpg">
            <input type="hidden" name="product_name" value="Remington Hair Straightener with Thin Ceramic Plates, 220°C, Black">
            <input type="hidden" class="priceValue" name="product_price" value="70">
            <figure class="image">
                <img src="imgs/34.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Remington Hair Straightener with Thin Ceramic Plates, 220°C, Black.</p>
            </div>


            <h3 class="discount"  name="product_price"><del>99₪ </del><h3>

                    <h3 class="priceValue"> 70 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="36.jpg">
            <input type="hidden" name="product_name" value="Remington Hair Dryer 2100 Watts, 2 Speed ​​Settings, Black">
            <input type="hidden" class="priceValue" name="product_price" value="154">
            <figure class="image">
                <img src="imgs/36.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>Remington Hair Dryer 2100 Watts, 2 Speed ​​Settings, Black/Gold.</p>
            </div>


            <h3 class="discount"  name="product_price"><del>219₪ </del><h3>

                    <h3 class="priceValue"> 154 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="41.jpg">
            <input type="hidden" name="product_name" value="Philips IPL Hair Removal Device 250,000 Flashes">
            <input type="hidden" class="priceValue" name="product_price" value="1792">
            <figure class="image">
                <img src="imgs/41.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="laser1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Philips IPL Hair Removal Device 250,000 Flashes With SenseIQ echnology Corded/Cordless Use White.</p>
            </div>

             <h3 class="discount"  name="product_price"><del>2560₪ </del><h3>

                    <h3 class="priceValue"> 1792 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->
    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="44.jpg">
            <input type="hidden" name="product_name" value=" Philips Electric Shaver Wet and Dry Gray Dark Color.">
            <input type="hidden" class="priceValue" name="product_price" value="357">
            <figure class="image">
                <img src="imgs/44.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="man1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>  Philips Electric Shaver Wet and Dry, Runtime 60 minutes, Gray Dark Color.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>509₪ </del><h3>

                    <h3 class="priceValue"> 357 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="45.jpg">
            <input type="hidden" name="product_name" value="Remington Cordless Beard Trimmer">
            <input type="hidden" class="priceValue" name="product_price" value="203">
            <figure class="image">
                <img src="imgs/45.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="man2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>  Philips Electric Shaver Wet and Dry, Runtime 60 minutes, Gray Dark Color.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>290₪ </del><h3>

                    <h3 class="priceValue"> 203 </h3>
                    <h3>₪</h3>

        </div>
    </form>
</div>


<div class="header_imge">
    <img src="imgs/70.jpg">
</div>

<div class="h1clas">
    <h1>Offers Devices</h1>
</div>

<div class="dis">
</div>

<div class="main" >

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref2.jpg">
            <input type="hidden" name="product_name" value="Beko Refrigerator 4 Door Capacity White.">
            <input type="hidden" class="priceValue" name="product_price" value="7200">
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

            <h3 class="discount"  name="product_price"><del>8000₪ </del><h3>

                    <h3 class="priceValue"> 7200 </h3>
                    <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref3.jpg">
            <input type="hidden" name="product_name" value="Beko Refrigerator 4 Door Capacity 624 Ltr ​Silver">
            <input type="hidden" class="priceValue" name="product_price" value="6930">
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

            <h3 class="discount"  name="product_price"><del>7700₪ </del><h3>

                    <h3 class="priceValue"> 6930 </h3>
                    <h3>₪</h3>


        </div>
    </form>
    <!--cards -->

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ref4.jpg">
            <input type="hidden" name="product_name" value="Beko Refrigerator 4 Door Capacity 626 Ltr Silver">
            <input type="hidden" class="priceValue" name="product_price" value="6120">
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

            <h3 class="discount"  name="product_price"><del>6800₪ </del><h3>

                    <h3 class="priceValue"> 6120 </h3>
                    <h3>₪</h3>


        </div>
    </form>
    <!--cards -->



    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="tv1.jpg">
            <input type="hidden" name="product_name" value="LG Television NanoCell, NANO84 Series, Size 50 Inch 4K UHD">
            <input type="hidden" class="priceValue" name="product_price" value="2520">
            <figure class="image">
                <img src="imgs/tv1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="tv1.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>LG Television NanoCell, NANO84 Series, Size 50 Inch 4K UHD, Smart WebOS TV.</p>
            </div>
            <h3 class="discount"  name="product_price"><del>2800₪ </del><h3>

                    <h3 class="priceValue"> 2520 </h3>
                    <h3>₪</h3>
        </div>
    </form>


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="tv2.jpg">
            <input type="hidden" name="product_name" value="LG Television UHD UQ80 Series Size 70 Inch 4K UHD Smart WebOS TV">
            <input type="hidden" class="priceValue" name="product_price" value="4500">
            <figure class="image">
                <img src="imgs/tv2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">                <a href="tv2.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>LG Television UHD UQ80 Series Size 70 Inch 4K UHD Smart WebOS TV.</p>
            </div>
            <h3 class="discount"  name="product_price"><del>5000₪ </del><h3>

                    <h3 class="priceValue"> 4500 </h3>
                    <h3>₪</h3>
        </div>
    </form>



    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="tv3.jpg">
            <input type="hidden" name="product_name" value="Skyworth Television QLED SUE Series Size 55 Inch 4K UHD">
            <input type="hidden" class="priceValue" name="product_price" value="2160">
            <figure class="image">
                <img src="imgs/tv3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="tv3.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <div class="des">
                <p>Skyworth Television QLED SUE Series Size 55 Inch 4K UHD Smart Google TV.</p>
            </div>
            <h3 class="discount"  name="product_price"><del>2400₪ </del><h3>

                    <h3 class="priceValue"> 2160 </h3>
                    <h3>₪</h3>
        </div>
    </form>

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash1.jpg">
            <input type="hidden" name="product_name" value="Beko Washer Capacity 10 kg 14 Programs Dark.">
            <input type="hidden" class="priceValue" name="product_price" value="3150">
            <figure class="image">
                <img src="imgs/wash1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="WASHER1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Washer Capacity 10 kg, 14 Programs, Inverter Brushless Motor Save Energy, Dark.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>3500₪ </del><h3>

                    <h3 class="priceValue"> 3150 </h3>
                    <h3>₪</h3>
        </div>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash2.jpg">
            <input type="hidden" name="product_name" value="Beko Washer Capacity 8 kg 14 Programs Dark.">
            <input type="hidden" class="priceValue" name="product_price" value="2700">
            <figure class="image">
                <img src="imgs/wash2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="WASHER2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Washer Capacity 8 Kg, 14 Programs, Inverter Brushless Motor Save Energy, Dark.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>3000₪ </del><h3>

                    <h3 class="priceValue"> 2700 </h3>
                    <h3>₪</h3>
        </div>
        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash3.jpg">
            <input type="hidden" name="product_name" value="EVA Washer Capacity 10 kg, 15 Program Black Color">
            <input type="hidden" class="priceValue" name="product_price" value="2430">
            <figure class="image">
                <img src="imgs/wash3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="WASHER3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>EVA Washer Capacity 10 kg, 15 Program, Inverter Brushless Motor Save Energy, Black Color.</p>
            </div>

            <h3 class="discount"  name="product_price"><del>2700₪ </del><h3>

                    <h3 class="priceValue"> 2430 </h3>
                    <h3>₪</h3>
        </div>

        </div>
    </form>
    <!--cards -->

<!--cards -->
<form action="" method="post">
    <div class="card">
        <input type="hidden" name="product_image" value="ov1.jpg">
        <input type="hidden" name="product_name" value="Amica Built-In Electric Oven 12 Programs Stainless">
        <input type="hidden" class="priceValue" name="product_price" value="3060">
        <figure class="image">
            <img src="imgs/ov1.jpg">
            <div class="product-over">
                <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                <a href="O1.php" class="more-inf">More Info</a>
            </div>
        </figure>

        <div class="des">
            <p>Amica Built-In Electric Oven 60 Cm, 65 Liter Capacity, 12 Programs, 3100 Watts, Stainless</p>
        </div>

        <h3 class="discount"  name="product_price"><del>3400₪ </del><h3>

                <h3 class="priceValue"> 3060 </h3>
                <h3>₪</h3>

    </div>
</form>
<!--cards -->

<!--cards -->
<form action="" method="post">
    <div class="card">
        <input type="hidden" name="product_image" value="ov2.jpg">
        <input type="hidden" name="product_name" value="Amica Built-In Electric Oven 60 Cm, 65 Liter Capacity 12 Programs Stainless">
        <input type="hidden" class="priceValue" name="product_price" value="2700">
        <figure class="image">
            <img src="imgs/ov2.jpg">
            <div class="product-over">
                <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                <a href="O2.php" class="more-inf">More Info</a>
            </div>
        </figure>

        <div class="des">
            <p>Amica Built-In Electric Oven 60 Cm, 65 Liter Capacity, 12 Programs, 3100 Watts, Stainless</p>
        </div>

        <h3 class="discount"  name="product_price"><del>3000₪ </del><h3>

                <h3 class="priceValue"> 2700 </h3>
                <h3>₪</h3>

    </div>
</form>
<!--cards -->


<!--cards -->
<form action="" method="post">
    <div class="card">
        <input type="hidden" name="product_image" value="ov3.jpg">
        <input type="hidden" name="product_name" value="Beko Built-In Electric Oven 13 Programs Black.">
        <input type="hidden" class="priceValue" name="product_price" value="2700">
        <figure class="image">
            <img src="imgs/ov3.jpg">
            <div class="product-over">
                <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                <a href="O3.php" class="more-inf">More Info</a>
            </div>
        </figure>

        <div class="des">
            <p>Beko Built-In Electric Oven, 60 Cm, 72 Liter Capacity, 13 Programs, 3400 Watts, Black.</p>
        </div>

        <h3 class="discount"  name="product_price"><del>3000₪ </del><h3>

                <h3 class="priceValue"> 2700 </h3>
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

