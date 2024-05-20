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
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="login" style="border:1px solid black;width:30%;margin:10% auto;padding:2%;text-align:center">
            <h1>LOGIN</h1><br><br>
            <?php
              if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset ($_SESSION['login']);

              }
              if(isset($_SESSION['no-login'])){
                echo $_SESSION['no-login'];
                unset ($_SESSION['no-login']);

              }

            ?><br><br>
            <form action="" method="POST">
                Username: <input type="text" name="username" placeholder="Enter your username"><br><br>
                Password: <input type="password" name="password" placeholder="Enter your password"><br><br>
                <input type="submit" name="submit" id="" value="Login" style="background-color:blue;color:white;padding:2%">
            </form>
            
        </div>
    </body>
</html>

<?php

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1){
        $_SESSION['login']="Logged in successfully";
        header("Location:".SITEURL.'admin/');
        $_SESSION['user']=$username;
    }
    else{
        $_SESSION['login']="Failed to login";
        header("Location:".SITEURL.'admin/login.php');
    }
}

?>