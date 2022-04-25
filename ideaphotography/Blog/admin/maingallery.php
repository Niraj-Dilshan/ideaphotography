

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
                        case 'edit';
                            
                            echo "<h1>Add a New Photo</h1>";
                            include "include/edit_maingallery.php";
                            break;
//                        case 'edit_album';
//
//                            include "include/edit_album.php";
//                            break;
                        default;
                            include "include/view_maingallery.php";


                    }
                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "include/admin_footer.php"; ?>