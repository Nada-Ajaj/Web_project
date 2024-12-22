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
    <title>men</title>
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

<div class="header_imge" style="padding-left: 30px;
    width: 2000px;
    height: 320px;
    border-radius: 5px;
    padding-top: 90px;">
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
    <!--cards -->
    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof5.jpg">
            <input type="hidden" name="product_name" value="Korkmaz Turkish Coffee Machine 400W">
            <input type="hidden" class="priceValue" name="product_price" value="270">

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
            <h3 class="priceValue"> 270 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


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
    <!--cards -->



    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof6.jpg">
            <input type="hidden" name="product_name" value="Korkmaz Turkish Coffee Machine 400W">
            <input type="hidden" class="priceValue" name="product_price" value="270">
            <figure class="image">
                <img src="imgs/cof6.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a
                    >
                </div>
            </figure>

            <div class="des">
                <p>Korkmaz Turkish Coffee Machine 400W ,Prepare up to 4 Cups, Rose/Gold Color.</p>
            </div>
            <h3 class="priceValue"> 270 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="cof1.jpg">
            <input type="hidden" name="product_name" value="Korkmaz Turkish Coffee Machine Twin 800W">
            <input type="hidden" class="priceValue" name="product_price" value="400">
            <figure class="image">
                <img src="imgs/cof7.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a
                    >
                </div>
            </figure>

            <div class="des">
                <p>Korkmaz Turkish Coffee Machine Twin 800W, Prepare up to 8 Cups, Red/Chrome Color.</p>
            </div>
            <h3 class="priceValue"> 400 </h3>
            <h3>₪</h3>

        </div>
    </form>

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
