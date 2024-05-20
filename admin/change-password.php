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
                <h1>Change password</h1>
                <br><br>
                <?php
                  
                  $id =$_GET['id'];
                  $sql="SELECT * FROM admin WHERE id=$id";
                  $res=mysqli_query($conn,$sql);

                  if($res==true){
                    $count=mysqli_num_rows($res);
                    if($count==1){
                        $row=mysqli_fetch_assoc($res);
                        $password=$row['password'];
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
                    <td>Old password</td>
                    <td><input type="text" name="old_password" id="" value="<?php echo $password ?>"></td>
                </tr>
                <tr>
                    <td>New password</td>
                    <td><input type="password" name="new_password" id="" placeholder="Enter the new password"></td>
                </tr>
                <tr>
                    <td>Confrim password</td>
                    <td><input type="password" name="confirm_password" id="" placeholder="Confirm your new password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br><input type="submit" name="submit" id="" value="Change password" style="background-color:blue;color:white">
                    </td>
                </tr>
            </table>
                </form>
            </div>
 </div>

<?php
 if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];

    $sql="SELECT * FROM admin WHERE id = $id AND password = '$old_password'";

    $res=mysqli_query($conn,$sql);

    if($res==true){
        $count=mysqli_num_rows($res);
        if($count==1){
            if($confirm_password==$new_password){
                $sql2="UPDATE admin SET password = '$new_password' WHERE id =$id";
                $res2=mysqli_query($conn,$sql2);
                if($res2==true){
                $_SESSION['change-pass']= "Password changed successfully";
                header("Location:".SITEURL.'admin/manage-admin.php');
                }
                else{
                    $_SESSION['change-pass']="Failed to change password";
                    header("Location:".SITEURL.'admin/manage-admin.php'); 
                }

            }
            else{
                $_SESSION['change-pass']="Failed to change password";
            header("Location:".SITEURL.'admin/manage-admin.php');
            }
        }
        
        else{
            $_SESSION['change-pass']="Failed to change password";
            header("Location:".SITEURL.'admin/manage-admin.php');
        }
    }
 }

?>

<?php include('partials/footer.php'); ?>