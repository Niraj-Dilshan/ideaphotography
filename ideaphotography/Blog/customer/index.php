<?php include "include/customer_header.php"?>

	<div class="content">
		<div class="container-fluid">

			<!--
                <div class="row">
                    <div class="col-md-4">
                    fsasfasfafs
                    </div>

                    <div class="col-md-8">saffsasaffsa
                </div>
            </div>           
			-->

			<div class="container">
				<div class="row">
					
					<a href="albums.php" style="color: #000000">
						<div class="col-sm-6" style="background-color:yellow;"><br>
							<center>
								<img src="./assets/album.png" alt="..."/> <h2>My Albums</h2>
							</centrer> 
						</div>
					</a> 
					
			   		<a href="user.php" style="color:#000000">
						<div class="col-sm-6" style="background-color:#20e364;"><br>
							<center>
								<img src="./assets/boy.png" alt="..."/> <h2>My Profile</h2>
							</centrer> 
						</div>
					</a> 
					
			 	</div>

				<div class="row">
				   
			   		<a href="orders.php" style="color:#000000">
						<div class="col-sm-6" style="background-color:#387ff2;"><br>
				  			<center>
								<img src="./assets/checklist.png" alt="..."/> <h2>My Orders</h2>
							</centrer> 
						</div>
				   	</a>
				   
			   		<a href="support.php" style="color:#000000">
						<div class="col-sm-6" style="background-color:pink;"><br>
				   			<center>
								<img src="./assets/conversation.png" alt="..."/> <h2>My support Tickets</h2>
							</centrer> 
						</div>
				  	</a>
				  
				</div>
				
			</div>
		</div>
	</div>		
	
<!--
				</div>
			</div>
-->

<?php include "include/customer_footer.php"?>

<script type="text/javascript">

	$.notify({
	icon: 'pe-7s-gift',
	message: "Welcome Back <b> <?php echo $_SESSION['first_name']?> </b> - Hope you will have a nice day"

	},{
	type: 'info',
	timer: 4000
	});
	
</script>