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
    <title>Beko</title>

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
    <img src="imgs/beko2.jpg">
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
            <input type="hidden" class="priceValue" name="product_price" value="950">
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

            <h3 class="priceValue" name="product_price"> 950</h3>
            <h3>₪</h3>


        </div>
    </form>


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof2.jpg">
            <input type="hidden" name="product_name" value="Beko Espresso Coffee Machine 1200W">
            <input type="hidden" class="priceValue" name="product_price" value="500">

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


            <h3 class="priceValue" > 500</h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof4.jpg">
            <input type="hidden" name="product_name" value="Beko Espresso Coffee Machine 1350W">
            <input type="hidden" class="priceValue" name="product_price" value="2000">
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
            <h3 class="priceValue"> 2000 </h3>
            <h3>₪</h3>
        </div>
    </form>

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof3.jpg">
            <input type="hidden" name="product_name" value="Beko Filter Coffee Machine 1100W">
            <input type="hidden" class="priceValue" name="product_price" value="180">
            <figure class="image">
                <img src="imgs/cof3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a
                    >
                </div>
            </figure>

            <div class="des">
                <p>Beko Filter Coffee Machine 1100W, Prepare Up to 10 Cups, Black Color.</p>
            </div>

            <h3 class="priceValue"> 180 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="51.jpg">
            <input type="hidden" name="product_name" value="Beko Steam Iron Blue Color.">
            <input type="hidden" class="priceValue" name="product_price" value="199">
            <figure class="image">
                <img src="imgs/51.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="ST1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Steam Iron 2200W, Ceramic Soleplate, Blue/ White Color.</p>
            </div>

            <h3 class="priceValue"> 199</h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="52.jpg">
            <input type="hidden" name="product_name" value="Beko Steam Iron Purple Color.">
            <input type="hidden" class="priceValue" name="product_price" value="259">
            <figure class="image">
                <img src="imgs/52.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="ST2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Steam Iron 2600W, Ceramic Soleplate, Purple/ White Color.</p>
            </div>

            <h3 class="priceValue"> 259</h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="53.jpg">
            <input type="hidden" name="product_name" value="Beko Steamer With Water Tank Black Color.">
            <input type="hidden" class="priceValue" name="product_price" value="269">
            <figure class="image">
                <img src="imgs/53.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="ST3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Steamer 1600W, With Water Tank 230ml, Black Color.</p>
            </div>

            <h3 class="priceValue"> 269</h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->
    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dish1.jpg">
            <input type="hidden" name="product_name" value="Beko Dishwasher 5 Programs, 13 Place Setting">
            <input type="hidden" class="priceValue" name="product_price" value="1700">
            <figure class="image">
                <img src="imgs/dish1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="dishwash1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Dishwasher 5 Programs, 13 Place Setting, 2 Racks, White Color.</p>
            </div>

            <h3 class="priceValue"> 1700 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dish2.jpg">
            <input type="hidden" name="product_name" value="Beko Dishwasher 5 Programs, 14 Place Setting">
            <input type="hidden" class="priceValue" name="product_price" value="2400">
            <figure class="image">
                <img src="imgs/dish2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="dishwash2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Dishwasher 5 Programs, 14 Place Setting, 2 Racks, Stainless Steel.</p>
            </div>

            <h3 class="priceValue"> 2400 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dish3.jpg">
            <input type="hidden" name="product_name" value="Beko Dishwasher 6 Programs, 15 Place Setting">
            <input type="hidden" class="priceValue" name="product_price" value="2700">
            <figure class="image">
                <img src="imgs/dish3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="dishwash3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Dishwasher 6 Programs, 15 Place Setting, 3 Racks, Stainless Steel.</p>
            </div>

            <h3 class="priceValue"> 2700 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dish4.jpg">
            <input type="hidden" name="product_name" value="Beko Dishwasher 6 Programs, 15 Place Setting">
            <input type="hidden" class="priceValue" name="product_price" value="3000">
            <figure class="image">
                <img src="imgs/dish4.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="dishwash4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Dishwasher 6 Programs, 15 Place Setting, Inverter Brushless Motor, 3 Racks, Dark Stainless.</p>
            </div>

            <h3 class="priceValue"> 3000 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dish5.jpg">
            <input type="hidden" name="product_name" value="Beko Dishwasher 8 Programs, 15 Place Setting">
            <input type="hidden" class="priceValue" name="product_price" value="2500">
            <figure class="image">
                <img src="imgs/dish5.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Dishwasher 8 Programs, 15 Place Setting, Inverter Brushless Motor, 3 Racks, Stainless Steel.</p>
            </div>

            <h3 class="priceValue"> 2500 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry1.jpg">
            <input type="hidden" name="product_name" value="Beko Dryer 8Kg">
            <input type="hidden" class="priceValue" name="product_price" value="3000">
            <figure class="image" >

                <img src="imgs/dry1.jpg">

                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="dryer1.php" class="more-inf">More Info</a>
                </div>
            </figure>


            <p class="des" >Beko Dryer 8Kg, Heat Pump System Save Energy, 15 Programs, Dark Stainless.</p>



            <h3 class="priceValue">3000</h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry2.jpg">
            <input type="hidden" name="product_name" value="Beko Dryer 9Kg">
            <input type="hidden" class="priceValue" name="product_price" value="3000">
            <figure class="image">
                <img src="imgs/dry2.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="dryer2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Dryer 9Kg, Condenser System, 15 Programs, Dark Stainless.</p>
            </div>

            <h3 class="priceValue"> 3000 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash1.jpg">
            <input type="hidden" name="product_name" value="Beko Washer Capacity 10 kg 14 Programs Dark.">
            <input type="hidden" class="priceValue" name="product_price" value="3500">
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

            <h3 class="priceValue"> 3500 </h3><h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="wash2.jpg">
            <input type="hidden" name="product_name" value="Beko Washer Capacity 8 kg 14 Programs Dark.">
            <input type="hidden" class="priceValue" name="product_price" value="3000">
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

            <h3 class="priceValue"> 3000 </h3><h3>₪</h3>

        </div>
    </form>
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
                <img src="imgs/ref2.jpg">
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

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="ov3.jpg">
            <input type="hidden" name="product_name" value="Beko Built-In Electric Oven 13 Programs Black.">
            <input type="hidden" class="priceValue" name="product_price" value="3000">
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

            <h3 class="priceValue"> 2800 </h3>
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
</body>
</html>
