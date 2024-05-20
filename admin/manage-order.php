<?php include('partials/menu.php'); ?>
<?php

//   session_start();

//   define('SITEURL', 'http://localhost/Resto-management/');

//   define('LOCALHOST','localhost');
//   define('DB_USERNAME','root');
//   define('DB_PASSWORD','');
//   define('DB_NAME','resto');
  
  $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
  $sub_select=mysqli_select_db($conn,"resto") ;

?>
<div class="main-content" style="margin: 1% 0;background-color: rgb(205, 205, 205);padding: 1% 0;">
    <div class="wrapper" style="padding: 1%;width: 80%;margin: 0 auto;">
    <h1>Manage order</h1>
    <br>
    <br>
    <?php
    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    ?><br><br>
    <!-- <a href="add-admin.php" style="background-color:blue;padding:1%;color:white;text-decoration:none">ADD ORDER</a> -->
                <br>
                <table style="width:100%">
                    <tr>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Id</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Food</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Price</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Quantity</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Total</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Order date</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">STatus</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Cutomer Name</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Customer contact</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Customer email</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Customer address</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Actions</th>
                    </tr>
                    <?php 
                        $sql="SELECT * FROM orders ORDER BY id ASC ";

                        $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $food=$rows['food'];
                                $price=$rows['price'];
                                $qty=$rows['quantity'];
                                $total=$rows['total'];
                                $order_date=$rows['order_date'];
                                $status=$rows['status'];
                                $customer_name=$rows['customer_name'];
                                $customer_contact=$rows['customer_contact'];
                                $customer_email=$rows['customer_email'];
                                $customer_address=$rows['customer_address'];
                                ?>
                                   <tr>
                                   <td style="padding:1%"><?php echo $id ?></td>
                                   <td style="padding:1%"><?php echo $food ?></td>
                                   <td style="padding:1%"><?php echo $price ?></td>
                                   <td style="padding:1%"><?php echo $qty ?></td>
                                   <td style="padding:1%"><?php echo $total ?></td>
                                   <td style="padding:1%"><?php echo $order_date ?></td>
                                   <td style="padding:1%"><?php echo $status ?></td>
                                   <td style="padding:1%"><?php echo $customer_name ?></td>
                                   <td style="padding:1%"><?php echo $customer_contact ?></td>
                                   <td style="padding:1%"><?php echo $customer_email ?></td>
                                   <td style="padding:1%"><?php echo $customer_address ?></td>
                                   <td style="padding:1%">
                                   <button style="background-color:red;"><a href="<?php echo SITEURL;?>admin/delete-order.php?id=<?php echo $id;?>" style="text-decoration:none;color:white">DELETE ORDER</a></button>
                                   </td>
                               </tr>
                               <?php
                        }

                        }

                    ?>
                    <!-- <tr>
                        <td style="padding:1%">1.</td>
                        <td style="padding:1%">Amar K</td>
                        <td style="padding:1%">amar@123</td>
                        <td style="padding:1%">
                        <button style="background-color:green;"><a href="#" style="text-decoration:none;color:white">UPDATE CATEGORY</a></button>
                        <button style="background-color:red;"><a href="#" style="text-decoration:none;color:white">DELETE CATEGORY</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:1%">2.</td>
                        <td style="padding:1%">Bharath B</td>
                        <td style="padding:1%">bb@123</td>
                        <td style="padding:1%">
                        <button style="background-color:green;"><a href="#" style="text-decoration:none;color:white">UPDATE CATEGORY</a></button>
                        <button style="background-color:red;"><a href="#" style="text-decoration:none;color:white">DELETE CATEGORY</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:1%">3.</td>
                        <td style="padding:1%">Chandan C</td>
                        <td style="padding:1%">cc@123</td>
                        <td style="padding:1%">
                        <button style="background-color:green;"><a href="#" style="text-decoration:none;color:white">UPDATE CATEGORY</a></button>
                        <button style="background-color:red;"><a href="#" style="text-decoration:none;color:white">DELETE CATEGORY</a></button>
                        </td>
                    </tr> -->
                    
                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>