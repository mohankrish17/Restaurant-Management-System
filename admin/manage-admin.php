<?php include('partials/menu.php'); ?>
<?php

  // session_start();

  // define('SITEURL', 'http://localhost/Resto-management/');

  // define('LOCALHOST','localhost');
  // define('DB_USERNAME','root');
  // define('DB_PASSWORD','');
  // define('DB_NAME','resto');
  
  $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
  $sub_select=mysqli_select_db($conn,"resto") ;

?>
        <div class="main-content" style="margin: 1% 0;background-color: rgb(205, 205, 205);padding: 1% 0;">
            <div class="wrapper" style="padding: 1%;width: 80%;margin: 0 auto;">
                <h1>MANAGE ADMIN</h1>
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
                  if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                  }
                  if(isset($_SESSION['change-pass'])){
                    echo $_SESSION['change-pass'];
                    unset($_SESSION['change-pass']);
                  }
                ?>
               <br><br><br>
                <a href="add-admin.php" style="background-color:blue;padding:1%;color:white;text-decoration:none">ADD ADMIN</a>
                <br><br>
                <table style="width:100%">
                    <tr>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">ID</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Full Name</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">UserName</th>
                        <th style="border-bottom:1px solid black;padding:1%;text-align:left">Actions</th>
                    </tr>

                    <?php
                      $sql = "SELECT * FROM admin";
                      $res=mysqli_query($conn,$sql);
                      if($res==TRUE){
                        $count=mysqli_num_rows($res);
                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                               $id=$rows['id'];
                               $full_name=$rows['full_name'];
                               $username=$rows['username'];

                               ?>
                               <tr>
                                   <td style="padding:1%"><?php echo $id?></td>
                                   <td style="padding:1%"><?php echo $full_name?></td>
                                   <td style="padding:1%"><?php echo $username?></td>
                                   <td style="padding:1%">
                                   
                                  <button style="background-color:green;"><a href="<?php echo SITEURL;?>admin\update-admin.php?id=<?php echo $id;?>" style="text-decoration:none;color:white">UPDATE ADMIN</a></button>
                                   
                                   <button style="background-color:red;"><a href="<?php echo SITEURL;?>admin\delete-admin.php?id=<?php echo $id;?>" style="text-decoration:none;color:white">DELETE ADMIN</a></button>
                                   <button style="background-color:blue;"><a href="<?php echo SITEURL;?>admin\change-password.php?id=<?php echo $id;?>" style="text-decoration:none;color:white">CHANGE PASSWORD</a></button>
                                  </td>
                                </tr>
                               <?php
                            }
                        }
                        else{

                        }
                      }

                    ?>
                    
                </table>
                <div class="clearfix" style="float: none;clear: both;"></div>
            </div>
        </div>
<?php include('partials/footer.php'); ?>