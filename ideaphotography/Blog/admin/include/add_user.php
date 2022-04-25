
<?php
//---Addint the deatils of the user to the user table
if(isset($_POST['add_user'])){
//    $fname=$_POST['fname'];
//    $lname=$_POST['lname'];
//    $role=$_POST['role'];
//    $email=$_POST['email'];
//    $password=$_POST['password'];
//    $pimage=$_FILES['image']['name'];
//    $ptmpimg=$_FILES['image']['tmp_name'];
//    $tp=$_POST['tp'];
//    $address=$_POST['address'];

	$fname = mysqli_real_escape_string($connect,$_POST['fname']);
	$lname = mysqli_real_escape_string($connect,$_POST['lname']);
	$role = $_POST['role'];
	$email = mysqli_real_escape_string($connect,$_POST['email']);
	$password = mysqli_real_escape_string($connect,password_hash($_POST['password'], PASSWORD_BCRYPT));
	$hash = mysqli_real_escape_string( $connect,md5( rand(0,1000) ) );
	$pimage=$_FILES['image']['name'];
	$tp = mysqli_real_escape_string($connect,$_POST['tp']);
	$ptmpimg = $_FILES['image']['tmp_name'];
	$address = mysqli_real_escape_string($connect,$_POST['address']);
	
    $date=date('d-m-y');
    move_uploaded_file($ptmpimg,"images/users/$pimage");
    $query="INSERT INTO users(upassword,ufirstname,ulastname,urole,uemail,uimage,utnumber,address,date) values('$password','$fname','$lname','$role','$email','$pimage','$tp','$address',now())";
    $result=mysqli_query($connect,$query);
    confirm($result);
    header("Location:users.php");


}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="grid-container">   
        <div class="form-group">
            <label for="title">First Name</label>
            <input type="text" class="form-control" name="fname" required>  
        </div>
        <div class="form-group">
            <label for="title">Last name</label>
            <input type="text" class="form-control" name="lname">  
        </div>
        <div class="form-group">
            <label for="title">Role </label><br>
            <select name="role" id="role">
                <option value='Admin'>Admin</option>
                <option value='Cusomter'>Cusomter</option>       
            </select> 
        </div>  
        
        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" class="form-control" name="email"  required>  
        </div>
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" class="form-control" name="password"  required>  
        </div>
        <div class="form-group">
            <label for="title">Address</label>
            <input type="text" class="form-control" name="address" >  
        </div>
        <div class="form-group">
            <label for="title">Telephone Number </label>
            <input type="text" class="form-control" name="tp" >  
        </div>
    </div>
    <div class="form-group">
        <label for="title">User Image</label>
        <input type="file"  class="btn btn-primary"  name="image">  
    </div>



    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
</form> 