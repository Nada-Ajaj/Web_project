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
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Dryer</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="cards.css">
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
    <a href="Shamout.php" ><i class="fa-solid fa-house-chimney logo "></i> SHAMOUT.com</a>

    <ul>


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




    <div>
        <!--Shopping cart-->
        <?php

        $select_rows = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);

        ?>
        <a href="cart.php" class="shopping-cart" style="position: absolute; top:0px; right: 5px;">  <i class="fas fa-shopping-cart shoppingCartButton"></i> <span><?php echo $row_count; ?></span> </a>
    </div>
</div><!-- End-->
<div class="header_imge">
    <img src="imgs/100.jpg">
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


            <p >Beko Dryer 8Kg, Heat Pump System Save Energy, 15 Programs, Dark Stainless.</p>



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

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry3.jpg">
            <input type="hidden" name="product_name" value="EVA Dryer 10Kg">
            <input type="hidden" class="priceValue" name="product_price" value="3300">
            <figure class="image">
                <img src="imgs/dry3.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="dryer3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des" name="product_name" value="EVA Dryer 10Kg">
                <p>EVA Dryer 10Kg, Heat Pump System Save Energy, 15 Programs, Dark Grey.</p>
            </div>

            <h3 class="priceValue" name="product_price" value="3300"> 3300 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->

    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry4.jpg">
            <input type="hidden" name="product_name" value="EVA Dryer 8Kg">
            <input type="hidden" class="priceValue" name="product_price" value="2500">
            <figure class="image">
                <img src="imgs/dry4.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="dryer4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>EVA Dryer 8Kg, Condenser System, 15 Programs, Dark Grey.<br><br></p>
            </div>

            <h3 class="priceValue"> 2500 </h3>
            <h3>₪</h3>

        </div>

        <!--cards -->
    </form>


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
            <input type="hidden" name="product_image" value="dry8.jpg">
            <input type="hidden" name="product_name" value="Magic Dryer 8Kg">
            <input type="hidden" class="priceValue" name="product_price" value="2000">
            <figure class="image">
                <img src="imgs/dry8.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Magic Dryer 8Kg, Condenser System, 15 Programs, Silver Color.<br><br></p>
            </div>

            <h3 class="priceValue"> 2000 </h3>
            <h3>₪</h3>

        </div>
    </form>
    <!--cards -->


    <form action="" method="post">
        <div class="card">
            <input type="hidden" name="product_image" value="dry9.jpg">
            <input type="hidden" name="product_name" value="Smart Dryer 10Kg">
            <input type="hidden" class="priceValue" name="product_price" value="3000">
            <figure class="image">
                <img src="imgs/dry9.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart" value="add to cart" name="add_to_cart">
                    <a href="detail_page.html" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Smart Dryer 10Kg, Heat Pump System Save Energy, 15 Programs, Dark Grey.</p>
            </div>

            <h3 class="priceValue"> 3000 </h3>
            <h3>₪</h3>

        </div>
    </form>

    <!--card-->

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
