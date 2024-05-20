<?php include('partials/menu.php'); ?>

<div class="main-content" style="margin: 1% 0;background-color: rgb(205, 205, 205);padding: 1% 0;">
    <div class="wrapper" style="padding: 1%;width: 80%;margin: 0 auto;">
        <h1>Add Food</h1>
        <br><br>
        <?php
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table style="width:30%">
                <tr>
                    <td>Id</td>
                    <td><input type="text" name="id" id="" placeholder="Enter id"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" id="" placeholder="Enter title"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="50" rows="5" placeholder="Enter the description of the food"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" id="" placeholder="Enter the price"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image" id=""></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td><select name="category_id" id="">

                        <?php
                        $sql="SELECT * FROM category WHERE active='Yes'";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        if($count>0){
                            while($row=mysqli_fetch_array($res)){
                                $id=$row['id'];
                                $title=$row['title'];
                                ?>
                                <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                <?php
                            }

                        }else{
                            ?>
                            <option value="0">No categories found</option>
                            <?php
                        }

                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" id="" value="Yes">Yes
                        <input type="radio" name="featured" id="" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes">Yes
                        <input type="radio" name="active" id="" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br><input type="submit" name="submit" id="" value="Add food"
                            style="background-color:blue;color:white">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $category_id=$_POST['category_id'];
            
            if(isset($_POST['featured'])){
                $featured=$_POST['featured'];
            }
            else{
                $featured="No";
            }
            if(isset($_POST['active'])){
                $active=$_POST['active'];
            }
            else{
                $active="No";
            }
            if(isset($_FILES['image']['name'])){
                $image_name=$_FILES['image']['name'];
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/".$image_name;

                $upload=move_uploaded_file($source_path,$destination_path);

                if($upload==false){
                    $_SESSION['upload']="Failed to upload image";
                    header("Location:".SITEURL.'admin/add-food.php');
                    die();
                }
            }else{
                $image_name="";
            }


            $sql = "INSERT INTO food SET id=$id, title = '$title',description='$description',price=$price,category_id='$category_id',image_name='$image_name', featured = '$featured', active = '$active'";

            // $conn=mysqli_connect("localhost","root","") or die(mysqli_error());
            // $sub_select=mysqli_select_db($conn,"resto-management") or die(mysqli_error());
        
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            if ($res == TRUE) {
                $_SESSION['add'] = "Food added successfully";
                header("Location:" . SITEURL . 'admin/manage-food.php');
            } else {
                $_SESSION['add'] = "Failed to add category";
                header("Location:" . SITEURL . 'admin/add-food.php');
            }
        }

        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>