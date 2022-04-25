<?php include "include/customer_header.php"?>

<?php  
	
	$email=$_SESSION['email'];
	$query="Select * from users where uemail= '{$email}'";
	$result=mysqli_query($connect,$query);
	if(!$result){
		echo "Error";
	}
	$row=mysqli_fetch_assoc($result);

?>
   <div class="content">
	   <div class="container-fluid">
		   <div class="row">
			   <div class="col-md-8">
				   <div class="card">
					   <div class="header">
						   <h4 class="title">Edit Profile</h4>
					   </div>
					   <div class="content">
						   <form action="" method="post" enctype="multipart/form-data" onSubmit="window.location.reload()">
							   
							   <div class="row">
								   <div class="col-md-6">
									   <div class="form-group">
										   <label>Resgistration Date</label>
										   <input type="text" class="form-control" name="regdate" disabled placeholder="Resgistration Date" value="<?php  echo $row['date'] ?>">
									   </div>
								   </div>								   
							   </div>
							   
							   <div	class="row">
								   <div class="col-md-6">
									   <div class="form-group">
										   <label>Email address</label>
										   <input type="email" class="form-control" name="email" placeholder="Email" value="<?php  echo $row['uemail']?>" required>
									   </div>
								   </div>
							   </div>

							   <div class="row">
								   <div class="col-md-6">
									   <div class="form-group">
										   <label>First Name</label>
										   <input type="hidden" class="form-control" name="id"  value="<?php echo $row['uid'];?>"> 
										   <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php  echo $row['ufirstname']?>" required>
									   </div>
								   </div>
								   <div class="col-md-6">
									   <div class="form-group">
										   <label>Last Name</label>
										   <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php  echo $row['ulastname']?>">
									   </div>
								   </div>
							   </div>

							   <div class="row">
								   <div class="col-md-12">
									   <div class="form-group">
										   <label>Address</label>
										   <input type="text" class="form-control" name="address" placeholder="Home Address" value="<?php  echo $row['address']?>">
									   </div>
								   </div>
							   </div>

							   <div class="row">
								   <div class="col-md-6">
									   <div class="form-group">
										   <label>Telephone Number</label>
										   <input type="text" class="form-control" name="tp" placeholder="Telephone Number" value="<?php  echo $row['utnumber']?>">
									   </div>
								   </div>								
							   </div>
							   
							   <div class="row">
								   <div class="col-md-6">
									   <div class="form-group">
										   <label for="title">User Image</label>
										   <br>
										   <?php

												if ($row['uimage']==""){
													echo "No image has set";
												}else{ 

										   ?>

										   <img src="../admin/images/users/<?php echo $row['uimage']?> " style="width: 30%; height: 30%">

										   <?php 

												} 

										   ?>
										   
										   <input type="file"  class="btn btn-primary"  name="image">
									   </div>
								   </div>
							   </div>
							   
							   <button type="submit" class="btn btn-info pull-right" name="update_user">Update Profile</button>
							   
							   <div class="clearfix"></div>
							   
						   </form>
						   
					   </div>
					   
				   </div>
				   
			   </div>
			   
			   <div class="col-md-4">
				   <div class="card card-user">
					   <div class="image">
						   <img src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="..."/>
					   </div>
					   <div class="content">
						   <div class="author">
							   <a href="#">
								   <img class="avatar border-gray" src="../admin/images/users/<?php  echo $row['uimage']?>" alt="Profile-Picture" style="width: 30%; height: 30%"/>
								   <br>
								   <br>
								   <br>
								   <h4 class="title"><?php  echo $row['ufirstname']?> <?php  echo $row['ulastname']?></h4>
							   </a>
						   </div>
						   
						   <p class="description text-center">
							   
							   <?php  echo $row['uemail']?><br>
							   <?php  echo $row['address']?> <br>
							   <?php  echo $row['utnumber']?>
							   
						   </p>
					   </div>
				   </div>
			   </div>

		   </div>
	   </div>
   </div>

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
        $query2="UPDATE users SET ufirstname='{$fname}',ulastname='{$lname}',uemail='{$email}',address='{$address}',utnumber='{$tp}' WHERE uid='$id'";
        $result2=mysqli_query($connect,$query2);
        
        if(($_FILES['image']['size'])!=0 ) 
        {
            $id=$_POST['id'];
            $query3="SELECT * FROM users where uid={$id}";
            $result3=mysqli_query($connect,$query3);
            $ap=mysqli_fetch_assoc($result3);
            if($ap['uimage'] !=""){
               $im="../admin/images/users/{$ap['uimage']}";
                unlink($im);}
            $query2="UPDATE users SET uimage='{$pimage}' WHERE uid={$id}";
            $result2=mysqli_query($connect,$query2);
       
			move_uploaded_file($ptmpimg,"../admin/images/users/$pimage");
        } 
    
    

}
?>
<?php include "include/customer_footer.php"?>
	   