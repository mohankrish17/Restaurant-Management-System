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
    <h1>Manage Food</h1>
    <br>
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    ?><br><br>
    <a href="<?php echo SITEURL;?>admin/add-food.php" style="background-color:blue;padding:1%;color:white;text-decoration:none">ADD FOOD</a>
                <br><br>
                <table style="width:100%">
                    <tr>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Id</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Title</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Description</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Price</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Image name</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Category id</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Featured</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Active</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Actions</th>
                    </tr>
                    <?php 
                        $sql="SELECT * FROM food";

                        $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $title=$rows['title'];
                                $description=$rows['description'];
                                $price=$rows['price'];
                                $image_name=$rows['image_name'];
                                $category_id=$rows['category_id'];
                                $featured=$rows['featured'];
                                $active=$rows['active'];
                                ?>
                                   <tr>
                                   <td style="padding:1%"><?php echo $id ?></td>
                                   <td style="padding:1%"><?php echo $title ?></td>
                                   <td style="padding:1%"><?php echo $description ?></td>
                                   <td style="padding:1%"><?php echo $price ?></td>
                                   <td style="padding:1%"><?php echo $image_name ?></td>
                                   <td style="padding:1%"><?php echo $category_id ?></td>
                                   <td style="padding:1%"><?php echo $featured ?></td>
                                   <td style="padding:1%"><?php echo $active ?></td>
                                   <td style="padding:1%">
                                   <button style="background-color:red;"><a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>" style="text-decoration:none;color:white">DELETE FOOD</a></button>
                                   </td>
                               </tr>
                               <?php
                        }

                        }

                    ?>

                    
                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>