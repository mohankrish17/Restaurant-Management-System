<?php

session_start();

define('SITEURL', 'http://localhost/Resto-management/');

define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','resto');

$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
$sub_select=mysqli_select_db($conn,"resto") ;

if(isset($_GET['id'])){
   $id=$_GET['id'];

   $sql="DELETE FROM category WHERE id=$id";

   $res=mysqli_query($conn,$sql);

   if($res==true){
    $_SESSION['delete']="Category deleted successfully";
    header("Location:".SITEURL.'admin/manage-category.php');
   }
}
else{
    $_SESSION['delete']="Failed to delete category";
   header("Location:".SITEURL.'admin/manage-category.php');
}

?>