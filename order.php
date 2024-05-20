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
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
<?php include('partials-front/nav.php'); ?>
<?php
if(isset($_GET['food_id'])){
    $food_id=$_GET['food_id'];
    $sql="SELECT * FROM food WHERE id=$food_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
        $row=mysqli_fetch_array($res);
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];
    }
  }

?>

    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                          if($image_name==""){
                            echo "Image not found";
                          }
                          else{
                            ?>
                              <img src="<?php echo SITEURL;?>images/<?php echo $image_name?>" alt="<?php echo $image_name;?>" class="img-responsive img-curve">
                            <?php
                          }

                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                    <h3><?php echo $food_id; ?></h3>
                    <input type="hidden" name="food_id" id="" value="<?php echo $id?>">
                        <h3 ><?php echo $title; ?></h3>
                        <input type="hidden" name="title" id="" value="<?php echo $title?>">
                        <p class="food-price" name="price"><?php echo $price; ?></p>
                        <input type="hidden" name="price" id="" value="<?php echo $price?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter your full-name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="ENter your phone number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter your email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="ENter your address" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
              if(isset($_POST['submit']) ){
                $food=$_POST['title'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $total=$price * $qty;
                $order_date=date("Y-m-d h:i:sa");
                $status="Ordered";
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

                $sql2="INSERT INTO orders SET food='$title',price='$price',quantity=$qty,total=$total,order_date='$order_date',status='$status',
                       customer_name='$customer_name',customer_contact='$customer_contact',customer_email='$customer_email',customer_address='$customer_address'";
              
                $res2=mysqli_query($conn,$sql2); 
                if($res2==true){
                $_SESSION['order']="Food ordered successfully";
                header("Location:".SITEURL);

              }
              else{
                $_SESSION['order']="Failed to order food";
                header("Location:".SITEURL);

              }
            }

            ?>
           
        </div>
    </section>

    <?php include('partials-front/footer.php'); ?>

</body>
</html>