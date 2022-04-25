<?php include "include/admin_header.php"; ?>

<div id="wrapper">
<?php if(isset($_GET['source'])){
    if(($_GET['source'])=='delete'){
        $id=$_GET['id'];
        $query="DELETE From packages where pac_id=$id";
        $result=mysqli_query($connect,$query);
        confirm($result);
         header("Location:packages.php");
    }
}?>
    <!-- Navigation -->
    <?php include "include/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h2>Welcome

                        <span><?php echo  $_SESSION['first_name'] ?></span></h2> 
                    <hr style="  border: 3px solid green;
                               border-radius: 5px;">  

                </div>



            </div>
            <!-- /.row -->


            <!-- /.row -->
            <h1 style="color:red; text-align: center;">Pacakges</h1><br> 
            <?php

    if(isset($_POST['addp'])){
        $Name=$_POST['pname'];
        $price=$_POST['pprice'];
        $status=$_POST['status'];
        $pdate=date('d-m-y');
        $content=$_POST['pdescription'];
        $query="INSERT INTO packages(pac_name,price,description,date,status) values('$Name','$price','$content',now(),'$status')";
        $result=mysqli_query($connect,$query);
        confirm($result);
        echo "<h4>New Package added </h4>";


    }

            ?>

            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="grid-container">  
                        <div class="form-group">
                            <label for="title">Pacakge Name</label>
                            <input type="text" class="form-control" name="pname">  
                        </div>

                        <div class="form-group">
                            <label for="title">Price</label>
                            <input type="text" class="form-control" name="pprice">  
                        </div>

                        <div class="form-group">
                            <label for="title">Package Status</label><br>
                            <select name="status" id="status">
                                <option value='Published'>Published</option>
                                <option value='Draft' selected>Draft</option>       
                            </select> 
                        </div>

                    </div>
                    <div class="form-group">

                        <label for="title">Package Description</label><br><small>(Insert the package description with the commas)</small>
                        <textarea class="form-control" name="pdescription" id="editor" cols="10" rows="5"></textarea>
                    </div>

                    <div class="form-group"></div>
                    <input class="btn btn-primary" type="submit" name="addp" value="Add Package">
                </form>
            </div>
     <br>
        </div>
        <div class="row">    
            <?php  
            $query="SELECT * FROM packages";
            $result=mysqli_query($connect,$query);
            confirm($result);
            while($row=mysqli_fetch_assoc($result)){



            ?>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading"><?php echo  $row['pac_name']; ?></div>

                    <div class="panel-body">
                     <b>Price :- <?php echo  $row['price']; ?>.</b> <br>
                     <b>Date :- <?php echo  $row['date']; ?></b> <br>
                     <b>Status :- <?php echo  $row['status']; ?></b> <br><br>
                        <ul>
                            <?php 
                $myString = $row['description'];
                $myArray = explode(',', $myString);
                foreach($myArray as $my_Array){
                    echo "<li>".$my_Array. "</li>";
                }?>

                        </ul>
<center>    <img src="../admin/images/order.png" class="card-img-top" alt="..."><br>
<a href="#" class="btn btn-primary stretched-link">Update</a>  <a href="./packages.php?source=delete&id=<?php echo  $row['pac_id']; ?>" class="btn btn-danger stretched-link">Delete</a> </center>
                    </div>

                </div>
            </div>
            <?php       } ?>

        </div>

    </div>
    <!--



-->
</div>
<?php 
include "include/admin_footer.php"; ?>