<?php include "include/customer_header.php"?>

	<div id="page-wrapper">
		<div class="container-fluid">
			<h1 style="color:blue; text-align: center;">My Support Tickets</h1><br>
			
			<?php
	
				$id=$_SESSION['email'];
				$query="SELECT * FROM support where Email= '{$id}'"; $result=mysqli_query($connect,$query);
				$row=mysqli_fetch_assoc($result);
				if($row<=0){ echo "No request have made yet" ;}else {
					
			?>
			
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<td >Id</td>
						<td>Name</td>
						<td>Email</td>
						<td>Message</td>
						<td>Date</td>
						<td>Acton</td>
					</tr>
				</thead>
				<tbody>
					<?php
						while($row=mysqli_fetch_assoc($result))
						{
					?>
					<tr>
						<form action="#" method="post">
							<td><?php echo $row['Id']; ?></td>
							<input type="hidden"  name="comid" value="<?php echo $row['Id']; ?>">
							<td><?php echo $row['Name']; ?></td>
							<td><?php echo $row['Email']; ?></td>
							<td><?php echo $row['Message']; ?></td>
							<td><?php echo $row['Date']; ?></td>
							<td align="center" class="colcolar">
								<a href="comments.php?deletecomment=<?php echo $row['comid'];?>">
									<img src="images/delete.png"  >
								</a>
							</td>
						</form>
					</tr>
					<?php 
						}  
					?>
				</tbody>
			</table>
			<?php }  ?>
		</div>
</div>

<?php include "include/customer_footer.php"?>