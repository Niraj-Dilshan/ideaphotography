 <?php include "include/customer_header.php"?>
	<h1 style="color:#8b22e0; text-align: center;">Enter your order details</h1><br>
	
	<?php
	
		$email=$_SESSION['email'];
		$query="Select * from users where uemail= '{$email}'";
		$result=mysqli_query($connect,$query);
		if(!$result){
		echo "Eroror";
		}
		$row=mysqli_fetch_assoc($result);

	?>

<div class="content">
	<div class="container-fluid">
		<div class="content">
			<form action="#" method="post" style="color: antiquewhite">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Pacakge Name</label>
							<input type="text" class="form-control"  disabled    value="<?php  echo $_GET['id']?>">
							<input type="hidden"  name="pack"   value="<?php  echo $_GET['id']?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" placeholder="Email"  name="email" value="<?php  echo $_SESSION['email']?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Date</label>
							<input type="date" class="form-control" name="date">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" placeholder="Company" name ="firstname" value="<?php  echo $row['ufirstname']?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Last Name" name ="lastname" value="<?php  echo $row['ulastname']?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Telephone number</label>
							<input type="text" class="form-control" placeholder="City" name ="tpnumber" value="<?php  echo $row['utnumber']?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" placeholder="Home Address" name ="address" value="<?php  echo $row['address']?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label>Order Description</label><br>
							<textarea class="form-control" name="content" id="editor" cols="80" rows="10"></textarea>
						</div>
					</div>
				</div>
				<center>
					<button type="submit" class="btn btn-info btn-fill pull-right" name="add">Place the order</button>
				</center>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>


<?php  

	if(isset($_POST['add'])){

		$id=$_POST['pack'];
		$email=$_POST['email'];
		$date=$_POST['date'];
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
		$tpnumber=$_POST['tpnumber'];
		$address=$_POST['address'];
		$od=$_POST['content'];
		$query="INSERT INTO orders(cemail,package,date,status,description,fname,lname,tpnumber,address) values('$email','$id','$date','Waiting for conformation','$od','$fname','$lname','$tpnumber','$address')";
		$result=mysqli_query($connect,$query);

	}	


?>

<?php include "include/customer_footer.php"?>