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
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Shamout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="image.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="offers.css">
  <link rel="stylesheet" href="btm.css">
  <link rel="stylesheet" href="cards.css">
  <link rel="stylesheet" href="swiper-bundle.min.css">
  <link rel="stylesheet" href="shop-cart.css">
  <link rel="stylesheet" href="change%20-image.css">
  <!-- CSS -->
  <link rel="stylesheet" href="pp.css">
  <link rel="stylesheet" href="Categories.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--for footer-->
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
<!-- Header -->

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

<!--  Autametic image change  -->
<div class="Section_top">
    </div>
</div><!-- end-->

<div class="gallery">
  <a href="TV.php" ><img src="imgs/tv8.jpg" class="g g1"/></a>
  <a href="coffee.html.html" ><img src="imgs/14.jpg" class="g g2"/></a>
  <a href="Conditioner.php"> <img src="imgs/cond7.jpg" class="g g3"/></a>
  <a href="Oven.php"><img src="imgs/ov13.jpg" class="g g4"/></a>
  <a href="streem.html.html" ><img src="imgs/52.jpg" class="g g5"/></a>

</div>
<! -- shop by brand-->
<div class="brand1" >
  <h1 style="text-align:center; ">Shop By Brand</h1>
  <div class="brand" >
    <a href="media.php"><img src="imgs/mideaa.png" width="100%" height="95%" style=" border-radius: 50%" ></a>
  </div>
  <div class="brand" >
    <a href="LG.php"><img src="imgs/lg.png" width="95%" height="95%"></a>
  </div>
  <div class="brand" >
    <a href="EVA.php"><img src="imgs/eva.jpg" width="100%" height="100%"></a>
  </div>

  <div class="brand" >
    <a href="Beko.php"><img src="imgs/beko.png" width="100%" height="95%" style=" border-radius: 50%"></a>
  </div>
  <div class="brand" >
    <a href="Magic.php"><img src="imgs/magic.jpg" width="100%" height="95%" style=" border-radius: 50%;border: 1px black solid"></a>
  </div>

  <div class="brand" >
    <a href=""><img src="imgs/firegas.png" width="100%" height="95%" style=" border-radius: 50%"></a>
  </div>

</div>
<!-- end-->

<div class="slide-container swiper">
  <div class="slide-content">
    <div class="card-wrapper swiper-wrapper">

      <div class="card swiper-slide">
          <input type="hidden" name="product_image" value="dish10.jpg">
          <input type="hidden" name="product_name" value="Beko Dryer 8Kg, Heat Pump System Save Energy, 15 Programs, Dark Stainless.">
          <input type="hidden" class="priceValue" name="product_price" value="3000">

          <figure class="image">
              <img src="imgs/dry1.jpg">
              <div class="product-over">
                  <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                  <a href="dryer1.php" class="more-inf">More Info</a>
              </div>
          </figure>

          <div class="des">
              <p>Beko Dryer 8Kg, Heat Pump System Save Energy, 15 Programs, Dark Stainless.</p>
          </div>

          <h3 class="priceValue"> 3000 </h3>
          <h3>₪</h3>
      </div>

        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="dish10.jpg">
            <input type="hidden" name="product_name" value="LG Dishwasher 9 Programs, 14 Place Setting.">
            <input type="hidden" class="priceValue" name="product_price" value="3500">
            <figure class="image">
                <img src="imgs/dish10.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="dishwash4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Dishwasher 9 Programs, 14 Place Setting, Inverter Direct Drive Save Energy, 2 Racks.</p>
            </div>

            <h3 class="priceValue"> 3500 </h3>
            <h3>₪</h3>
        </div>


        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="fan1.jpg">
            <input type="hidden" name="product_name" value="Star Fan 2 in One, 120W, 18 Inch, Black Color.">
            <input type="hidden" class="priceValue" name="product_price" value="300">
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

            <h3 class="priceValue"> 300 </h3>
            <h3>₪</h3>
        </div>


        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="heat1.jpg">
            <input type="hidden" name="product_name" value="Colder Infra Heater 2000W with Remote Control IP65, Silver Color.">
            <input type="hidden" class="priceValue" name="product_price" value="500">
            <figure class="image">
                <img src="imgs/heat1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="heater1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Colder Infra Heater 2000W with Remote Control IP65, Silver Color.</p>
            </div>

            <h3 class="priceValue"> 500 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="hob9.jpg">
            <input type="hidden" name="product_name" value="Firegas Hi-Tech Built-In Gas Hob 90 Cm, 5 Burners, Black Color.">
            <input type="hidden" class="priceValue" name="product_price" value="2800">
            <figure class="image">
                <img src="imgs/hob9.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="hob44.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Firegas Hi-Tech Built-In Gas Hob 90 Cm, 5 Burners, Black Color.</p>
            </div>

            <h3 class="priceValue"> 2800 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="ho9.jpg">
            <input type="hidden" name="product_name" value="Firegas Wall Mount Hood 90 Cm, Suction 300 m³/h, Stainless Steel.">
            <input type="hidden" class="priceValue" name="product_price" value="600">
            <figure class="image">
                <img src="imgs/ho9.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="HOOD4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Firegas Wall Mount Hood 90 Cm, Suction 300 m³/h, Stainless Steel.</p>
            </div>

            <h3 class="priceValue"> 600 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="ov4.jpg">
            <input type="hidden" name="product_name" value="Beko Built-In Electric Oven, 60 Cm 9 Programs Black.">
            <input type="hidden" class="priceValue" name="product_price" value="2500">
            <figure class="image">
                <img src="imgs/ov4.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="O4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Beko Built-In Electric Oven, 60 Cm, 72 Liter Capacity, 9 Programs, 2800 Watts, Black.</p>
            </div>

            <h3 class="priceValue"> 2500 </h3>
            <h3>₪</h3>
        </div>


        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="tv1.jpg">
            <input type="hidden" name="product_name" value="LG Television NanoCell Smart WebOS TV.">
            <input type="hidden" class="priceValue" name="product_price" value="2800">
            <figure class="image">
                <img src="imgs/tv1.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="tv1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>LG Television NanoCell, NANO84 Series, Size 50 Inch 4K UHD, Smart WebOS TV.</p>
            </div>

            <h3 class="priceValue"> 2800 </h3>
            <h3>₪</h3>
        </div>

    </div>
  </div>

  <div class="swiper-button-next swiper-navBtn"></div>
  <div class="swiper-button-prev swiper-navBtn"></div>
  <div class="swiper-pagination"></div>
</div>

<script src="swiper-bundle.min.js"></script>
<script>

  var swiper = new Swiper(".slide-content", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
      0: {
        slidesPerView: 1,
      },
      320: {
        slidesPerView: 2,
      },
      550: {
        slidesPerView: 3,
      },
      950: {
        slidesPerView: 4,
      },
    },
  });

</script>




<!--OFFER-->

<div class="offer" >
    <div class="cont">
        <a href="offer.php">Watching offers</a>
    </div>
</div>
<!-- end-->



<h1 style="text-align:center; position: relative; top: 120px;">Take Care Of Your Hiar</h1>

<div class="slide-container1 swiper">
  <div class="slide-content">
    <div class="card-wrapper swiper-wrapper">

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="28.jpg">
            <input type="hidden" name="product_name" value="Trust hair curler 32 mm, black color.">
            <input type="hidden" class="priceValue" name="product_price" value="99">
            <figure class="image">
                <img src="imgs/28.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="hair1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Trust hair curler 32 mm, black color.</p>
            </div>

            <h3 class="priceValue"> 99 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="29.jpg">
            <input type="hidden" name="product_name" value="Chi hair straightener, temperature of 220 degrees Celsius, black color.">
            <input type="hidden" class="priceValue" name="product_price" value="459">
            <figure class="image">
                <img src="imgs/29.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="hair2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Chi hair straightener, temperature of 220 degrees Celsius, black color.</p>
            </div>

            <h3 class="priceValue"> 459 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="30.jpg">
            <input type="hidden" name="product_name" value="Hair straightener with thin ceramic plates, black color.">
            <input type="hidden" class="priceValue" name="product_price" value="89">
            <figure class="image">
                <img src="imgs/30.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="hair3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Chi hair straightener, temperature of 220 degrees Celsius, black color.</p>
            </div>

            <h3 class="priceValue"> 89 </h3>
            <h3>₪</h3>
        </div>


        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="31.jpg">
            <input type="hidden" name="product_name" value="Daphne (Allure) Cordless Hair Straightener Brush 185°, Black.">
            <input type="hidden" class="priceValue" name="product_price" value="639">
            <figure class="image">
                <img src="imgs/31.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="hair4.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Daphne (Allure) Cordless Hair Straightener Brush 185°, Black.</p>
            </div>

            <h3 class="priceValue"> 639 </h3>
            <h3>₪</h3>
        </div>


        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="41.jpg">
            <input type="hidden" name="product_name" value="Philips IPL Hair Removal Device 250,000 Flashes.">
            <input type="hidden" class="priceValue" name="product_price" value="2560">
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

            <h3 class="priceValue"> 2560 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="44.jpg">
            <input type="hidden" name="product_name" value=" Philips Electric Shaver Wet and Dry Gray Dark Color.">
            <input type="hidden" class="priceValue" name="product_price" value="2560">
            <figure class="image">
                <img src="imgs/44.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="man1.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Philips Electric Shaver Wet and Dry, Runtime 60 minutes, Gray Dark Color.</p>
            </div>

            <h3 class="priceValue"> 509 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="45.jpg">
            <input type="hidden" name="product_name" value="Philips Electric Shaver Wet and Dry, Runtime 60 minutes, Gray Dark Color.">
            <input type="hidden" class="priceValue" name="product_price" value="2560">
            <figure class="image">
                <img src="imgs/45.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="man2.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Philips Electric Shaver Wet and Dry, Runtime 60 minutes, Gray Dark Color.</p>
            </div>

            <h3 class="priceValue"> 509 </h3>
            <h3>₪</h3>
        </div>


        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="46.jpg">
            <input type="hidden" name="product_name" value="Remington Cordless Beard Trimmer White/Black.">
            <input type="hidden" class="priceValue" name="product_price" value="480">
            <figure class="image">
                <img src="imgs/46.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="man3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p> Remington Cordless Beard Trimmer, All-in-One Beard, Body and Stubble Trimmer, White/Black.</p>
            </div>

            <h3 class="priceValue"> 480 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="35.jpg">
            <input type="hidden" name="product_name" value="Remington Hair Dryer 2100 Watts, 2 Speed ​​Settings, Black/Gold.">
            <input type="hidden" class="priceValue" name="product_price" value="219">
            <figure class="image">
                <img src="imgs/35.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="man3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Remington Hair Dryer 2100 Watts, 2 Speed ​​Settings, Black/Gold.</p>
            </div>

            <h3 class="priceValue"> 219 </h3>
            <h3>₪</h3>
        </div>

        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="36.jpg">
            <input type="hidden" name="product_name" value="TRemington Curly Hair Curler 25mm, 220°C, Grey.">
            <input type="hidden" class="priceValue" name="product_price" value="199">
            <figure class="image">
                <img src="imgs/36.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="hair3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>TRemington Curly Hair Curler 25mm, 220°C, Grey.</p>
            </div>

            <h3 class="priceValue"> 199 </h3>
            <h3>₪</h3>
        </div>


        <!--cards -->
        <div class="card swiper-slide">
            <input type="hidden" name="product_image" value="37.jpg">
            <input type="hidden" name="product_name" value="Grundig Hair Dryer 2100W with Ionic Technology, 2 Speed ​​Settings, Black/Rose Gold.">
            <input type="hidden" class="priceValue" name="product_price" value="210">
            <figure class="image">
                <img src="imgs/37.jpg">
                <div class="product-over">
                    <input type="submit" class="addToCart"  value="add to cart" name="add_to_cart">
                    <a href="hair3.php" class="more-inf">More Info</a>
                </div>
            </figure>

            <div class="des">
                <p>Grundig Hair Dryer 2100W with Ionic Technology, 2 Speed ​​Settings, Black/Rose Gold.</p>
            </div>

            <h3 class="priceValue"> 210 </h3>
            <h3>₪</h3>
        </div>

    </div>
  </div>

  <div class="swiper-button-next swiper-navBtn"></div>
  <div class="swiper-button-prev swiper-navBtn"></div>
  <div class="swiper-pagination"></div>
</div>






<script src="ss/swiper-bundle.min.js"></script>
<script>

  var swiper = new Swiper(".slide-content", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
      0: {
        slidesPerView: 1,
      },
      320: {
        slidesPerView: 2,
      },
      550: {
        slidesPerView: 3,
      },
      950: {
        slidesPerView: 4,
      },
    },
  });

</script>



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
      <p>+91 74**9**258</p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="mailto:sagar00001.co@gmail.com">m.b.shammout@hotmail.com</a></p>
    </div>
  </div>
  <div class="footer-right">
    <p class="footer-company-about">
      <span>About the company</span>
      <strong>Sagar Developer</strong> is a Youtube channel where you can find more creative CSS Animations
      and
      Effects along with
      HTML, JavaScript and Projects using C/C++.
    </p>
    <div class="footer-icons">
      <a href="https://www.facebook.com/shammoutt"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="https://www.instagram.com/shammout_electronics/?igshid=YmMyMTA2M2Y%3D&fbclid=IwAR22oeecFtWU9tI5TpuArRyhO8lUnQweViBZQ4B8V5VCcVwnLq08TX-nW4s"><i class="fab fa-instagram"></i></a>

    </div>
  </div>
</footer>

</body>
</html>