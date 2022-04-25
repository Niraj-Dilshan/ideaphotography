<!doctype html>
<html>
    <head>
        <title>View Photos</title>

        <!-- CSS -->
        <link href='photobox/photobox.css' rel='stylesheet' type='text/css'>
        <link href='style.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- Script -->
        <script src='jquery-3.3.1.js' type='text/javascript'></script> 
        <script type="text/javascript" src="photobox/jquery.photobox.js"></script>
        
    </head>
    <body>

        <div class='container'>
            <div class="gallery">

                <?php 
                $id= $_GET['source'];
                $image_extensions = array("png","jpg","jpeg","gif");
                echo "<h1 align='center'>$id </h1>";
                // Target directory
                $dir = "../images/albums/{$id}/";
                if (is_dir($dir)){

                    if ($dh = opendir($dir)){
                        $count = 1;

                        // Read files
                        while (($file = readdir($dh)) !== false){

                            if($file != '' && $file != '.' && $file != '..'){

                                // Thumbnail image path
                                $thumbnail_path = "../images/albums/{$id}/thumbnail/".$file;

                                // Image path
                                $image_path = "../images/albums/{$id}/".$file;

                                $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                                $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

                                // Check its not folder and it is image file
                                if(!is_dir($image_path) && 
                                   in_array($thumbnail_ext,$image_extensions) && 
                                   in_array($image_ext,$image_extensions)){
                ?>

                <!-- Image -->
                <a href="<?= $image_path; ?>">
                    <img src="<?= $thumbnail_path; ?>">
                </a>

                <?php

                                    // Break
                                    if( $count%5 == 0){
                ?>
                <div class="clear"></div>
                <?php    
                                    }
                                    $count++;
                                }
                            }

                        }
                        closedir($dh);
                    }
                }
                ?>


                <!-- Script -->
                <script type='text/javascript'>
                    $(document).ready(function(){
                        $('.gallery').photobox('a',{ time:0 });

                    });
                </script>
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>

                </body>
           
                </div>
            
        </div>
        
         <footer align="center">
         <button onclick="goBack()"   class="btn btn-primary">Go Back</button>
        </footer>
</html>

