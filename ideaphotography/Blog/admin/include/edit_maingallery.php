


<!-- Upload form -->


<form method='post' action='#' enctype='multipart/form-data'>
 
    <div class="form-group">
        <label for="title">Album Images</label>
        <input type="file"  class="btn btn-primary"  name="imagefiles[]" multiple>  
    </div>

    <input type='submit' value='Upload' name='upload'>    
</form>



             <?php
if(isset($_POST['upload'])){

    foreach($_FILES['imagefiles']['name'] as $key=>$val){
        $filename = $_FILES['imagefiles']['name'][$key];

        // Valid extension
        $valid_ext = array('png','jpeg','jpg');


        $location ="../../assets/img/gallery/".$filename;
        $thumbnail_location = "../../assets/img/gallery/thumb/".$filename;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Check extension
        if(in_array($file_extension,$valid_ext)){  

            // Upload file
            if(move_uploaded_file($_FILES['imagefiles']['tmp_name'][$key],$location)){

                // Compress Image
                compressImage($_FILES['imagefiles']['type'][$key],$location,$thumbnail_location,60);
                $query="INSERT INTO gallery (Image) values('{$filename}')";
                $result=mysqli_query($connect,$query);
                confirm($result);

            }else{
                die("Error");
            }

        }
    }

    echo "Successfully Uploaded";
}
// Compress image
function compressImage($type,$source, $destination, $quality) {

    $info = getimagesize($source);

    if ($type == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($type == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($type == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

}






?>