<!--Header-->
<?php include "include/db.php"?>
<?php include "include/header2.php"?>


<!-- s-content
================================================== -->
<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <div class="entry__media col-full">
            <div class="entry__post-thumb">
                <?php
    $query="Select * from posts where (pid={$_GET['id']} AND pstatus='Published')";
$result=mysqli_query($connect,$query); 
$row=mysqli_fetch_assoc($result);
                ?>
                <img class="centers" src="images/posts/<?php echo $row['pimage'];?>" 

                     alt="">
            </div>
        </div>

        <div class="entry__header col-full">
            <h1 class="entry__header-title display-1">
                <?php echo $row['ptitle'] ?>
            </h1>
            <ul class="entry__header-meta">
                <li class="date"><?php echo $row['pdate']; ?></li>
                <li class="byline">
                    By
                    <a href="#0"><?php echo $row['pauthor']; ?></a>
                </li>
            </ul>
        </div>

        <div class="col-full entry__main">

            <p class="lead drop-cap"><?php echo $row['pcontent']; ?></p>

            <div class="entry__taxonomies">
                <div class="entry__cat">
                    <h5>Posted In: </h5>
                    <span class="entry__tax-list">
                        <a href="#0"><?php echo $row['ptag'];?></a>

                    </span>
                </div> <!-- end entry__cat -->

                <div class="entry__tags">
                    <h5>Tags: </h5>
                    <span class="entry__tax-list entry__tax-list--pill">
                        <a href="#0">orci</a>
                        <a href="#0">lectus</a>
                        <a href="#0">varius</a>
                        <a href="#0">turpis</a>
                    </span>
                </div> <!-- end entry__tags -->
            </div> <!-- end s-content__taxonomies -->

            <div class="entry__author">
                <img src="images/avatars/user-03.jpg" alt="">

                <div class="entry__author-about">
                    <h5 class="entry__author-name">
                        <span>Posted by</span>
                        <a href="#0"><?php echo $row['pauthor'];?></a>
                    </h5>
                </div>
            </div>

        </div> <!-- s-entry__main -->

    </article> <!-- end entry/article -->


    <!-- end s-content__pagenav -->

    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">
                <?php
                $id=$_GET['id'];
                $count=0;
                $query1="SELECT * from comments where (comstatus='Approved'  AND compid={$id})" ;
                $result1=mysqli_query($connect,$query1);
                while($row=mysqli_fetch_assoc($result1)){
                    $count++;
                }


                ?>
                <h3 class="h2"><?php if($count==0) {
    echo "No Comments";
}else
{ echo $count." Comments";
}
                    ?></h3>
                <?php
                $id=$_GET['id'];
                $query1="SELECT * from comments where (comstatus='Approved'  AND compid={$id})" ;
                $result1=mysqli_query($connect,$query1);
                while($row=mysqli_fetch_assoc($result1)){


                ?>
                <!-- START commentlist -->
                <ol class="commentlist">

                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author" ><?php  echo $row['comauthor']; ?></div>

                                <div class="comment__meta">
                                    <div class="comment__time"><?php  echo $row['comdate']; ?></div>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p><?php  echo $row['comcontent']; ?></p>
                            </div>

                        </div>

                    </li> <!-- end comment level 1 -->
                </ol>
                <!-- END commentlist -->           
                <?php      }?>
            </div> <!-- end col-full -->
        </div> <!-- end comments -->

        <div class="row comment-respond">

            <!-- START respond -->
            <div id="respond" class="col-full">

                <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                <form name="contactForm" id="contactForm" method="post" action="#" autocomplete="off">
                    <fieldset>

                        <div class="form-field">
                            <input name="cName" id="cName" class="full-width" placeholder="Your Name*" value="" type="email" required>
                        </div>

                        <div class="form-field">
                            <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email*" value="" type="text" required>
                        </div>

                        <div class="message form-field">
                            <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message*" required></textarea>
                        </div>

                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                    </fieldset>
                </form> <!-- end form -->

            </div>
            <!-- END respond-->
            <?php  if(isset($_POST['submit'])){
    $id= $_GET['id'];
    $comauthor=$_POST['cName'];
    $comemail=$_POST['cEmail'];
    $comcontent=$_POST['cMessage'];
    $comstatus="Disapproved";
    $comdate=date('d-m-y');
    $query="INSERT into comments(compid,comauthor,comemail,comcontent,comstatus,comdate) values('{$id}','{$comauthor}','{$comemail}','{$comcontent}','{$comstatus}',now())";
    $result=mysqli_query($connect,$query);


} ?>
        </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->

</section> <!-- end s-content -->




<?php include "include/footer.php"?>
