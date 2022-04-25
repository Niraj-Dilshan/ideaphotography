

<?php include "include/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome

                        <small><?php echo  $_SESSION['first_name'] ?></small>
                    </h1>

                    <div class="col-xs-6">



                        <?php
                        cat_insert();

                        ?>
                        <form action="" method="POST">
                            <div class="form group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control " name="cat_title">
                            </div>
                            <br>
                            <div class="form group">
                                <input class="btn btn-primary"type="submit" name="submit" value="Add Category">

                            </div>
                        </form>

                        <br>
                        <?php 
                        if(isset($_GET['update'])){
                            $id=$_GET['update'];
                            $query="SELECT * FROM category where catid={$id}";
                            $result=mysqli_query($connect,$query);
                            while($row=mysqli_fetch_assoc($result)){
                        ?>



                        <form action="" method="POST">
                            <div class="form group">
                                <?php        
                                if(isset($_POST['update'])){
                                    $name=$_POST['cat_title'];
                                    if($name ==""|| empty($name)){
                                        echo "<h3>This field should not be empty</h3>";
                                    }else{
                                        echo $_GET['update'];
                                        $query="UPDATE category SET catname='{$name}' WHERE catid={$_GET['update']}";
                                        $result=mysqli_query($connect,$query);
                                        if(!$result){
                                            die("Query Failed".mysqli_error());
                                        }
                                        header("Location:categories.php");
                                    }
                                }

                                ?>
                                <label for="cat_title">Edit Category</label>
                                <input type="text" class="form-control " name="cat_title" value="<?php echo $row['catname'];?>">

                            </div>
                            <br>
                            <div class="form group">
                                <input class="btn btn-primary"type="submit" name="update" value="Update">
                            </div>
                        </form>  <?php } } ?>
                    </div><!---End of First div-->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thehead >
                                <tr class="thead-dark">
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thehead>
                            <tbody>
                                <?php //finding categories

                                $query="SELECT * FROM category";
                                $result=mysqli_query($connect,$query);
                                while($row=mysqli_fetch_assoc($result))
                                {
                                ?>
                                <tr>
                                    <td><?php echo $row['catid'];?></td>
                                    <td><?php echo $row['catname'];?></td>
                                    <td align="center"><a href="categories.php?update=<?php echo $row['catid'];?>"  ><img src="images/refresh.png" class= "center"></a></td> 
                                    <td align="center" class="colcolar"><a href="categories.php?delete=<?php echo $row['catid'];?>"  ><img src="images/delete.png"  width="20%"></a></td> 

                                </tr>
                                <?php }?>

                                <?php //Deleting categories
                                cat_delete();
                                ?>
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "include/admin_footer.php"; ?>