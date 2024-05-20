<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food-menu</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php include('partials-front/nav.php'); ?>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

            $sql = "SELECT * FROM food WHERE active='Yes'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_array($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box" style="height:250px">
                        <div class="food-menu-img">
                            <img src="<?php echo SITEURL; ?>images/<?php echo $image_name ?>" alt="<?php echo $image_name ?>" class="img-responsive img-curve" style="height:100px">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title ?></h4>
                            <p class="food-price">Rs.<?php echo $price ?></p>
                            <p class="food-detail">
                                <?php echo $description ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }

            ?>

            <!-- <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Italian pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Italian-pizza</h4>
                    <p class="food-price">Rs.150</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images\menu-french-pizza.jpeg" alt="French-break-pizza" class="img-responsive img-curve" height="100px">
                </div>

                <div class="food-menu-desc">
                    <h4>French Bread Pizza</h4>
                    <p class="food-price">Rs.200</p>
                    <p class="food-detail">
                        Made with soft yet hearty French bread, robust, garlicky and herby pizza sauce
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images\cheese-burger.jpeg" alt="Cheese Burger" class="img-responsive img-curve" height="100px">
                </div>

                <div class="food-menu-desc">
                    <h4>Cheese Burger</h4>
                    <p class="food-price">Rs.120</p>
                    <p class="food-detail">
                        Hamburger with a slice of melted cheese on top of the meat patty
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Hawai Pizza</h4>
                    <p class="food-price">Rs.200</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images\veg-momos.jpeg" alt="Chicke Hawain Pizza" class="img-responsive img-curve" height="100px">
                </div>

                <div class="food-menu-desc">
                    <h4>Veg Momos</h4>
                    <p class="food-price">Rs.150</p>
                    <p class="food-detail">
                        Steamed or fried dumpling stuffed with mixed vegetables
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">Rs.200</p>
                    <p class="food-detail">
                        Steamed or fried dumpling is a delicious snack food enjoyed in Tibet region
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div> -->


            <div class="clearfix"></div>



        </div>

    </section>

</body>

</html>