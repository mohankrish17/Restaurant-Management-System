<?php

  session_start();

  define('SITEURL', 'http://localhost/Resto-management/');

  define('LOCALHOST','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME','resto');
  
  $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
  $sub_select=mysqli_select_db($conn,"resto") ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wow food</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php include('partials-front/nav.php'); ?><br>
    <?php
    if(isset($_SESSION['order'])){
      echo $_SESSION['order'];
      unset($_SESSION['order']); 
    }

    ?><br>
    
    <div class="home">
        <div class="text-center" style="padding-top: 3%;">
           <h1>wowFOOD</h1>
           <p ><h4>The food heaven</h4></p>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" style="background-color: rgb(162, 255, 255);">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="text-center"><h2 style="padding-top: 4%;">Explore Categories</h2></div>
              <div class="carousel-item active" style="padding-top: 2%;">
                <div class="text-center">
                <img src="images\pizza.jpg" class="opinion-img" alt="..." height="300" width="500">
                <h3 style="padding-top: 1%;">PIZZA</h3>
                </div>
              </div>
              <div class="carousel-item" style="padding-top: 2%;">
                <div class="text-center">
                <img src="images\momo.jpg" class="opinion-img" alt="..." height="300" width="500" >
                <h3 style="padding-top: 1%;">MOMOS</h3>
                </div>
              </div>
              <div class="carousel-item" style="padding-top: 2%;">
                <div class="text-center">
                <img src="images\burger.jpg" class="opinion-img" alt="..." height="300" width="500">
                <h3 style="padding-top: 1%;">BURGERS</h3>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="text-center" style="padding-top: 3%;padding-bottom: 3%;">
          <button type="button" class="btn btn-primary btn-lg"><a href="categories.php" style="color: white;text-decoration: none;">EXPLORE MORE CATEGORIES</a></button>
          </div>
          <div id="carouselExampleIndicators1" class="carousel slide" style="background-color: rgb(162, 255, 255);">
            <div class="carousel-indicators1">
              <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="text-center"><h2 style="padding-top: 4%;">Foods</h2></div>
              <div class="carousel-item active" style="padding-top: 2%;">
                <div class="text-center">
                <img src="images\italian-pizza.jpeg" class="opinion-img" alt="..." height="300" width="500">
                <h3 style="padding-top: 1%;">ITALIAN PIZZA</h3>
                <p>Made with Italian Sauce, Chicken, and organice vegetables</p>
                </div>
              </div>
              <div class="carousel-item" style="padding-top: 2%;">
                <div class="text-center">
                <img src="images\veg-momos.jpeg" class="opinion-img" alt="..." height="300" width="500" >
                <h3 style="padding-top: 1%;">VEG-MOMOS</h3>
                <p>Veg Momos, a steamed or fried dumpling stuffed with mixed vegetables, is a delicious snack food enjoyed in Tibet region</p>
                </div>
              </div>
              <div class="carousel-item" style="padding-top: 2%;">
                <div class="text-center">
                <img src="images\cheese-burger.jpeg" class="opinion-img" alt="..." height="300" width="500">
                <h3 style="padding-top: 1%;">CHEESE BURGER</h3>
                <p>A cheeseburger is a hamburger with a slice of melted cheese on top of the meat patty, added near the end of the cooking time</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="text-center" style="padding-top: 3%;padding-bottom: 3%;">
          <button type="button" class="btn btn-primary btn-lg"><a href="foods.php" style="color: white;text-decoration: none;">SEE ALL FOODS</a></button>
          </div>
    </div>
    <!-- <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved @ 2023</p>
        </div>
    </section> -->
    <?php include('partials-front/footer.php'); ?>

</body>
</html>