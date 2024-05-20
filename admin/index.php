<?php include('partials/menu.php'); ?>
<?php

//   session_start();

//   define('SITEURL', 'http://localhost/Resto-management/');

//   define('LOCALHOST','localhost');
//   define('DB_USERNAME','root');
//   define('DB_PASSWORD','');
//   define('DB_NAME','resto');
  
//   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
//   $sub_select=mysqli_select_db($conn,"resto") ;

?>
        <div class="main-content" style="margin: 1% 0;background-color: rgb(205, 205, 205);padding: 1% 0;">
            <div class="wrapper" style="padding: 1%;width: 80%;margin: 0 auto;">
                <h1>DASHBOARD</h1><br>
                <?php
              if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset ($_SESSION['login']);

              }

            ?><br><br>
                <div class="col-4" style="width: 10%;background-color: white;margin: 1%;padding: 2%;float: left;text-align:center;">
                <?php
                $sql="SELECT * FROM category";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);

                ?>
                    <h1><?php echo $count;?></h1>
                    Categories
                </div>
                <div class="col-4" style="width: 10%;background-color: white;margin: 1%;padding: 2%;float: left;text-align:center;">
                <?php
                $sql2="SELECT * FROM food";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);

                ?>
                    <h1><?php echo $count2;?></h1>
                    Foods
                </div>
                <div class="col-4" style="width: 10%;background-color: white;margin: 1%;padding: 2%;float: left;text-align:center;">
                <?php
                $sql3="SELECT * FROM orders";
                $res3=mysqli_query($conn,$sql3);
                $count3=mysqli_num_rows($res3);

                ?>
                    <h1><?php echo $count3;?></h1>
                    Total Orders
                </div>
                <div class="col-4" style="width: 10%;background-color: white;margin: 1%;padding: 2%;float: left;text-align:center;">
                <?php
                $sql4="SELECT SUM(total) AS Total FROM orders";
                $res4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_assoc($res4);
                $total_revenue=$row4['Total'];

                ?>
                    <h1>Rs. <?php echo $total_revenue;?></h1>
                    Revenue Generated
                </div>
                <div class="clearfix" style="float: none;clear: both;"></div>
            </div>
        </div>
    <?php include('partials/footer.php'); ?>