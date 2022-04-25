<?php
if(isset($_GET['uid']))
     $id=$_GET['uid'];
    $query="SELECT * FROM users where uid='$id'";
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
        <br>
        <?php  
            if ($row['uimage']==""){
                echo "No image has set";
            }else{ ?>
                <img src="images/users/<?php echo $row['uimage']?> " style="width: 30%; height: 30%">
        <?php 
            } 
        ?> 
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
        $pimage=$_FILES['image']['name'];
        $ptmpimg=$_FILES['image']['tmp_name'];
        $password = mysqli_real_escape_string($connect,password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = mysqli_real_escape_string( $connect,md5( rand(0,1000) ) );
        $query2="UPDATE users SET ufirstname='{$fname}',ulastname='{$lname}',uemail='{$email}',address='{$address}',utnumber='{$tp}' ,upassword='{$password}' WHERE uid='$id'";
        $result2=mysqli_query($connect,$query2);
        confirm($result2);




        if(($_FILES['image']['size'])!=0 ) 
        {
            $id=$_GET['uid'];
            $query3="SELECT * FROM users where uid={$id}";
            $result3=mysqli_query($connect,$query3);
            $ap=mysqli_fetch_assoc($result3);
            if($ap['uimage'] !=""){
               $im="./images/users/{$ap['uimage']}";
                unlink($im);}
            $query2="UPDATE users SET uimage='{$pimage}' WHERE uid={$id}";
            $result2=mysqli_query($connect,$query2);
            confirm($result2);
            move_uploaded_file($ptmpimg,"./images/users/$pimage");
        } 
    
    

} ?>