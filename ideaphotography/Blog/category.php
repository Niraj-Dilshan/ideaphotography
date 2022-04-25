<!--Header-->
<?php include "include/db.php"?>
<?php include "include/header2.php"?>


<!-- s-content
================================================== -->
<section class="s-content">

    <div class="row entries-wrap wide">
        <div class="entries">
            <?php

				if(isset($_GET['cat'])){
					$id= $_GET['cat'];
					$query ="SELECT * FROM posts where (pcatid='$id' AND pstatus='Published')";
					$result=mysqli_query($connect,$query);
					if(!$result){
						die("Query Failed".mysqli_error($connect));
					}
					$count=mysqli_num_rows($result);

					if($count==0){
						echo "<h1 class='text-center'>No result</h1>";
					}else{

						while($row=mysqli_fetch_assoc($result)){
							$pid=$row['pid'];
							$p_title=$row['ptitle'];
							$p_author=$row['pauthor'];
							$p_date=$row['pdate'];
							$p_image=$row['pimage'];
							$p_tag=$row['ptag'];
							$content=substr($row['pcontent'],0,120);

            ?>
            <article class="col-block ">

                <div class="item-entry"   data-aos="zoom-in">
                    <div class="item-entry__thumb">
                        <a href="post.php?id=<?php echo $pid?>" class="item-entry__thumb-link">

                            <img src="images/posts/<?php echo $p_image ?>" 
                                 srcset="images/posts/<?php echo $p_image ?> 1x, images/posts/<?php echo $p_image ?> 2x" alt="">

                        </a>
                    </div>

                    <h1 class="item-entry__title"><a href="single-standard.html"><?php  echo $p_title; ?></a></h1>
                    <p><?php echo $content;?> </p>
                    <a class=" btn btn--primary " href="post.php?id=<?php echo $pid?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>  
                    <div class="item-entry__cat">
                        <a href="category.html"><?php echo $p_tag ?></a><br>
                        <a href="#"><?php echo $p_date;?></a>
                    </div>



                </div> <!-- item-entry -->

            </article><?php } } }?>
            <!-- end article -->



        </div> <!-- end entries -->
    </div> <!-- end entries-wrap -->



</section> <!-- end s-content -->





<?php include "include/footer.php"?>