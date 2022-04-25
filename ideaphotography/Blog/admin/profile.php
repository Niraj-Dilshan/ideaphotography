

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
                     <h1 style="color:red; text-align: center;">My Profile</h1><br> 
        <hr style="  border: 3px solid purple;
                               border-radius: 5px;">  
                  
<?php

$mail=$_SESSION['email'];
    $query="SELECT * FROM users where uemail='$mail'";
    $result=mysqli_query($connect,$query);
    confirm($result);
    $row=mysqli_fetch_assoc($result);


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="grid-container">   
        <div class="form-group">
            <label for="title">First Name</label>
            <input type="hidden" class="form-control" name="id"  value="<?php echo $row['uid']; ?>" >  
            <input type="text" class="form-control" name="fname"  value="<?php echo $row['ufirstname']; ?>" required>  
        </div>
        <div class="form-group">
            <label for="title">Last name</label>
            <input type="text" class="form-control"  value="<?php echo $row['ulastname']; ?>" name="lname">  
        </div>
 
           
        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" class="form-control" name="email"  value="<?php echo $row['uemail'] ?>" required>  
        </div>
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $row['upassword'] ?>" required>  
        </div>
        <div class="form-group">
            <label for="title">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>">  
        </div>
        <div class="form-group">
            <label for="title">Telephone Number </label>
            <input type="text" class="form-control" name="tp" value="<?php echo $row['utnumber'] ?>" >  
        </div>
    </div>
    <div class="form-group">
        <label for="title">User Image</label>
        <?php  if ($row['uimage']==""){
    echo "No image has set";}else{ ?>
        <img src="images/users/<?php echo $row['uimage']?> " style="width: 30%; height: 30%"> <?php } ?> 
        <input type="file"  class="btn btn-primary"  name="image">  
    </div>



    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="update_user" value="Update My Details">
</form> 

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "include/admin_footer.php"; ?>
        
  <?php      
      
    if (isset($_POST['update_user'])){
        $id=$_POST['id'];
    
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $tp=$_POST['tp'];
    
        //$status=$_POST['status'];
        $pimage=$_FILES['image']['name'];
        $ptmpimg=$_FILES['image']['tmp_name'];
        $password = mysqli_real_escape_string($connect,password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = mysqli_real_escape_string( $connect,md5( rand(0,1000) ) );
        echo $password;
        $query2="UPDATE users SET ufirstname='{$fname}',ulastname='{$lname}',uemail='{$email}',address='{$address}',utnumber='{$tp}' ,upassword='{$password}' WHERE uid='$id'";
        $result2=mysqli_query($connect,$query2);
        confirm($result2);




//        if(($_FILES['image']['size'])!=0 ) 
//        {
//            $id=$_GET['pid'];
//            $query3="SELECT * FROM posts where pid={$id}";
//            $result3=mysqli_query($connect,$query3);
//            $ap=mysqli_fetch_assoc($result3);
//            $im="../images/posts/{$ap['pimage']}";
//            unlink($im);
//            $query2="UPDATE posts SET pimage='{$pimage}' WHERE pid={$postid}";
//            $result2=mysqli_query($connect,$query2);
//            confirm($result2);
//            move_uploaded_file($ptmpimg,"../images/posts/$pimage");
//        } 
       echo "<p>Your Profile Updated sucessfully.<a href='posts.php'> </a> </p>";
//    }

} ?>