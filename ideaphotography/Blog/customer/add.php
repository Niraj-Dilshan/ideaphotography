<?php

	include "include/customer_header.php";
	 //---Getting the deatils from the slider table----------
	if(isset($_POST['add_payment'])){ 
		$id=$_GET['id'];
		$caption=$_POST['caption'];
		$image=$_FILES['image']['name'];
		$tmpimg=$_FILES['image']['tmp_name'];
		move_uploaded_file($tmpimg,"./assets/payments/$image");
		$query="Update orders Set note='{$caption}',payment='{$image}',status='Payment add.Wating for approval' where oid='{$id}'";
		$result=mysqli_query($connect,$query);
		if(!$result){
			die("Errror".mysqli_error($result));
		}
		header("Location:./orders.php");
	}

?>

<br>

<div class="container" style="margin: auto; border: 3px solid green; padding: 10px; background: hsla(0,0%,18%,1.00)">
	
<h1 style="color:green; text-align: center;">Add your payment</h1><br>
    <hr style="  border: 3px solid red; border-radius: 5px;"> 
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title" style="color: antiquewhite">Any special Note</label>
        <input type="text" class="form-control" name="caption">  
    </div>


    <div class="form-group">
        <label for="title" style="color: antiquewhite">Payment slip pic</label>
        <input type="file"  class="btn btn-primary"  name="image">  
    </div>


    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="add_payment" value="Add">
</form>

</div>


  <?php include "include/customer_footer.php"?>