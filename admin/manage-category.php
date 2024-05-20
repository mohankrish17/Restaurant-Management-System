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
    <h1>Manage Category</h1> 
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
    <a href="add-category.php" style="background-color:blue;padding:1%;color:white;text-decoration:none">ADD CATEGORY</a>
                <br><br>
                <table style="width:100%">
                    <tr>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Id</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Title</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">ImageName</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Featured</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Active</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Actions</th>
                    </tr>
                    <?php 
                        $sql="SELECT * FROM category";

                        $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $title=$rows['title'];
                                $image_name=$rows['image_name'];
                                $featured=$rows['featured'];
                                $active=$rows['active'];
                                ?>
                                   <tr>
                                   <td style="padding:1%"><?php echo $id ?></td>
                                   <td style="padding:1%"><?php echo $title ?></td>
                                   <td style="padding:1%"><?php echo $image_name ?></td>
                                   <td style="padding:1%"><?php echo $featured ?></td>
                                   <td style="padding:1%"><?php echo $active ?></td>
                                   <td style="padding:1%">
                                   <button style="background-color:red;"><a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>" style="text-decoration:none;color:white">DELETE CATEGORY</a></button>
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