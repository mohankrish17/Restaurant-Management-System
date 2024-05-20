<?php include('partials/menu.php'); ?>
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

<div class="main-content" style="margin: 1% 0;background-color: rgb(205, 205, 205);padding: 1% 0;">
            <div class="wrapper" style="padding: 1%;width: 80%;margin: 0 auto;">
                <h1>Update Admin</h1>
                <br>

                <?php
                  
                  $id =$_GET['id'];
                  $sql="SELECT * FROM admin WHERE id=$id";
                  $res=mysqli_query($conn,$sql);

                  if($res==true){
                    $count=mysqli_num_rows($res);
                    if($count==1){
                        $row=mysqli_fetch_assoc($res);
                        $full_name=$row['full_name'];
                        $username=$row['username'];
                    }
                  }
                 
                 ?>

                <form action="" method="POST">
                <table style="width:30%">
            <tr>
                <td>Id</td>
                <td><input type="text" name="id" id="" value="<?php echo $id ?>" ></td>
            </tr>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" id="" value="<?php echo $full_name ?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" id="" value="<?php echo $username ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br><input type="submit" name="submit" id="" value="Update admin" style="background-color:blue;color:white">
                    </td>
                </tr>
            </table>
                </form>
            </div>
</div>

<?php

 if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];

    $sql="UPDATE admin SET full_name = '$full_name' , username = '$username' WHERE id = '$id'";

    $res=mysqli_query($conn,$sql);

    if($res==true){
        $_SESSION['update']= "Admin info updated successfully";
        header("Location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update']="Failed to update admin";
        header("Location:".SITEURL.'admin/manage-admin.php');
    }
 }

?>

<?php include('partials/footer.php'); ?>