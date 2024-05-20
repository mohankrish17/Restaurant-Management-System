<?php

if(!isset($_SESSION['user'])){
    $_SESSION['no-login']="Please login to access admin panel";
    header("Location: ".SITEURL.'admin/login.php');
}

?>
