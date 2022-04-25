<?php include "include/customer_header.php"?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card" style="background-color: #272626">
					<div class="header">
						<h2 style="color:#00FFBB; text-align: center;" class="title">My Albums</h4><br>
						<hr style="  border: 3px solid red; border-radius: 5px;">
					</div>
					<div class="content">
						<table class="ab" >
							<tr>
								<?php
										$id =$_SESSION['email'];
										$query="SELECT * FROM album ";
										$result=mysqli_query($connect,$query);
										while($row=mysqli_fetch_assoc($result))
										{  if($row['privacy'] =="Public" || $row['user'] ==  $id){
								?>

								<input type="hidden"  name="filename" value="<?php echo $row['name'];?>">
								<td align="center"> 
									<a href="../admin/view/index.php?source=<?php echo  $row['name'];?>">								
										<img src="../admin/images/folder.png"><br>
										<label for="image"><?php echo  $row['name'];?></label>
									</a>
								</td>
								
								<?php 
										}}
								?>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "include/customer_footer.php"?>
