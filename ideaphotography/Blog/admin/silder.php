

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
                            include "include/add_slider.php";
                            break;
                        case 'update';
                            echo "<h1>Update post</h1>";
                            include "include/edit_slide.php";
                            break;
                        default;
                            include "include/view_allsilder.php";


                    }
                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "include/admin_footer.php"; ?>