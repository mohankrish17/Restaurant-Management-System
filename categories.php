<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wow-Categories</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php include('partials-front/nav.php'); ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">All Categories</h2>

            <?php

            $sql = "SELECT * FROM category WHERE active='Yes'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_array($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    <a href="foods.php">
                        <div class="box-3 float-container">
                            <img src="<?php echo SITEURL;?>images/<?php echo $image_name ?>" alt="" class="img-responsive img-curve" style="height:455px">

                            <h3 class="float-text text-white"><?php echo $title ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }

            ?>
        </div>
        <div class="clearfix"></div>
    </section>
   

</body>

</html>