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
<?php

if(!isset($_SESSION['user'])){
    $_SESSION['no-login']="Please login to access admin panel";
    header("Location: ".SITEURL.'admin/login.php');
}

?>
<html>
    <head>
        <title>Resto</title>
        <!-- <link rel="stylesheet" href="css/admin.css"> -->
    </head>
    <body>
        <div class="menu" style="text-align:center">
            <div class="wrapper" style="border: 1px solid black;padding: 1%;width: 80%; margin: 0 auto;">
                <ul style="list-style-type: none;">
                    <li style="display: inline;padding: 1%;"><a href="index.php" style="text-decoration:none; color: rgb(255, 66, 66);">Home</a></li>
                    <li style="display: inline;padding: 1%;"><a href="manage-admin.php" style="text-decoration:none; color: rgb(255, 66, 66);">Admins</a></li>
                    <li style="display: inline;padding: 1%;"><a href="manage-category.php" style="text-decoration:none; color: rgb(255, 66, 66);">Categories</a></li>
                    <li style="display: inline;padding: 1%;"><a href="manage-food.php" style="text-decoration:none; color: rgb(255, 66, 66);">Foods</a></li>
                    <li style="display: inline;padding: 1%;"><a href="manage-order.php" style="text-decoration:none; color: rgb(255, 66, 66);">Orders</a></li>
                    <li style="display: inline;padding: 1%;"><a href="logout.php" style="text-decoration:none; color: rgb(255, 66, 66);">Logout</a></li>
                </ul>
            </div>

        </div>