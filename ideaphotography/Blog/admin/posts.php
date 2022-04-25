

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

                    <?php

                    if(isset($_GET['source'])){
                        $source=$_GET['source'];
                    }else{
                        $source=12;
                    }
                    switch($source){
                        case 'add';
                            echo "<h1 style='color:blue;' >Add a post</h1><br>";
                            include "include/add_posts.php";
                            break;
                        case 'edit_post';
                            echo "<h1  style='color:blue;'>Edit post</h1><br>";
                            include "include/edit_posts.php";
                            break;
                        default;
                            include "include/view_allposts.php";


                    }
                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "include/admin_footer.php"; ?>