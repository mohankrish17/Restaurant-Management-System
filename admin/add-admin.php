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
        <h1>Add Admin</h1><br>
        <?php
                  if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                  }
                ?>
                <br>
        <form action="" method="POST">
            <table style="width:30%">
            <tr>
                <td>Id</td>
                <td><input type="text" name="id" id=""></td>
            </tr>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" id="" placeholder="Enter name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" id="" placeholder="Enter username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br><input type="submit" name="submit" id="" value="Add admin" style="background-color:blue;color:white">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
  if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="INSERT INTO admin SET id='$id', full_name = '$full_name', username = '$username', password = '$password'"; 

    // $conn=mysqli_connect("localhost","root","") or die(mysqli_error());
    // $sub_select=mysqli_select_db($conn,"resto-management") or die(mysqli_error());

    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    if($res==TRUE){
        $_SESSION['add']="Admin added successfully";
        header("Location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['add']="Failed to add admin";
        header("Location:".SITEURL.'admin/add-admin.php');
    }
  }
  
?>
