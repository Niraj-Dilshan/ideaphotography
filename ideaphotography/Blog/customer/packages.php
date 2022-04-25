<?php include "include/customer_header.php"?>

	<div class="content">
		<div class="container-fluid">
			<h1 style="color:green; text-align: center;">Choose your pacakge</h1><br>
			<hr style="  border: 3px solid red; border-radius: 5px;">
			<div class="row">
				<?php  
					$query="SELECT * FROM packages";
					$result=mysqli_query($connect,$query);
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
							<center>
								<img src="../admin/images/order.png" class="card-img-top" alt="..."><br>
								<a href="./addorder.php?id=<?php echo  $row['pac_name']; ?>" class="btn btn-primary stretched-link">Order This package</a>
							</center>
						</div>
					</div>
				</div>
				<?php
					} 
				?>
			</div>
		</div>
	</div>

<?php include "include/customer_footer.php"?>