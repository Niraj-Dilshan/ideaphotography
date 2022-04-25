<?php include "include/customer_header.php"?>

	<div class="content">
		<div class="container-fluid">
			<h1 style="color:green; text-align: center;">My orders</h1><br>
			<hr style="  border: 3px solid red; border-radius: 5px;">
			<button type="button" class="btn btn-success"  style="float: left;" onclick="window.location.href='./packages.php'">Make new order</button>
			<br><br>
			<table class="table table-bordered table-hover" style="color: antiquewhite">
				<thead class="thead-dark">
					<tr>
						<td>Order Id</td>
						<td>Order Date</td>
						<td>Pacakage</td>
						<td>Order Status</td>
						<td>Description </td>
						<td>Add Payment</td>
						<td>Update the order</td>
						<td>Cancel the order</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$id =$_SESSION['email'];
					$query="SELECT * FROM orders where cemail = '$id'";
					$result=mysqli_query($connect,$query);
					while($row=mysqli_fetch_assoc($result))
					{
					?>
					<tr>
						<td><?php echo $row['oid']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['package']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td>
							<?php 
								if($row['payment']!=""){
								echo "You have paid";
								}else{
								if($row['status']=='Order Aproved.Wating for Payment')
								{ 
							?>
								<button class="btn btn-info" type="button" onclick="location.href = './add.php?id=<?php echo $row['oid']; ?>';" >Add Payment</button> <?php } else { ?>
								<button type="button" disabled>Add Payment</button>
							<?php } }  ?>
						</td>
						<td>
							<a href="url_to_delete"  button type="button"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
						</td>
						<td align="center" class="colcolar">
							<a href="./orders.php?delete=<?php echo $row['oid'];?>"  ><img src="./assets/delete.png"  ></a>
						</td>
					</tr>
					<?php 
					} 
					?>
				</tbody>			
			</table>
		</div>
	</div>

<?php   

	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$query="Delete from orders where oid={$id}";
		$result=mysqli_query($connect,$query);
	}

?>

<?php include "include/customer_footer.php"?>
