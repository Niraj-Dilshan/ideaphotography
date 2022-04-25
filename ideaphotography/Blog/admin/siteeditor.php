<?php include "include/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome

                        <small><?php echo  $_SESSION['first_name'] ?></small>
                    </h1>

                </div>



            </div>
            <!-- /.row -->

     
            
                          <!-- /.row -->
                          
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                       <div class="panel-body" style=" background-color: #30e873;">
						   <center>
							   <img src="../admin/images/order.png" class="card-img-top" alt="...">
								<br>
								<a href="packages.php" class="btn btn-primary stretched-link">Pacakges</a>  
						   </center>
						</div>
					</div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                       <div class="panel-body" style=" background-color:#1dc0d6;">
						   <center>   
							   <img src="../admin/images/canvas.png" class="card-img-top" alt="...">
							   <br>
							   <a href="./maingallery.php" class="btn btn-primary stretched-link">Main gallery</a> 
						   </center>
						</div>
					</div>  
     			</div>  
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                       <div class="panel-body" style=" background-color: #f5429e;">
						   <center>   
							   <img src="../admin/images/video.png" class="card-img-top" alt="...">
							   <br>
							   <a href="./mainslider.php" class="btn btn-danger stretched-link">Main Slider</a>  
						   </center>
						</div>     
                    </div>
                </div>
              
            </div>            
                            
<!--
<table class="table">

  <tbody>
    <tr>
      <td>
     
      <td>
    
</td>
   
    </tr>

  </tbody>
</table>
-->
       


        <?php include "include/admin_footer.php"; ?>