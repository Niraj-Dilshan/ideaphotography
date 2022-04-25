
<?php
if(isset($_POST['upload'])){

    $id=$_POST['foldername'];
    // Location 

    $path = "./images/albums/".$id."/";
    $thumbnail_path = "images/albums/".$id."/thumbnail/";
    if (!file_exists($path)) {
        createtable();
        mkdir($path,755);


    }if (!file_exists($thumbnail_path)) {
        mkdir($thumbnail_path,755);
    }

    $name =strval($_POST['foldername']);
    foreach($_FILES['imagefiles']['name'] as $key=>$val){
        $filename = $_FILES['imagefiles']['name'][$key];

        // Valid extension
        $valid_ext = array('png','jpeg','jpg');


        $location ="./images/albums/".$id."/".$filename;
        $thumbnail_location = "images/albums/".$id."/thumbnail/".$filename;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Check extension
        if(in_array($file_extension,$valid_ext)){  

            // Upload file
            if(move_uploaded_file($_FILES['imagefiles']['tmp_name'][$key],$location)){

                // Compress Image
                compressImage($_FILES['imagefiles']['type'][$key],$location,$thumbnail_location,60);
                $query="INSERT INTO {$name}(imagename,date) values('{$filename}',now())";
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
function createtable(){
    global $connect;  //creating a table  stroe  infromation about each invidual album
    $name =strval($_POST['foldername']);
    $query = "CREATE TABLE {$name} (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    imagename VARCHAR(30),
    date date
    )";
    $result=mysqli_query($connect,$query);
    confirm($result);
    $query1="INSERT INTO album(user,name,date,privacy) values('{$_POST['user']}','{$name}',now(),'{$_POST['privacy']}')"; //Inserting the album data the alubm table
    $result1=mysqli_query($connect,$query1);
    confirm($result1);

}





?>


<!-- Upload form -->
<form method='post' action='#' enctype='multipart/form-data'>
    <div class="form-group">
        <label for="title">Album Name</label>
        <input type="text" class="form-control" name="foldername">  
    </div>
    <div class="form-group">
        <label for="title">Authorized Viewer</label>
        <input type="text" class="form-control" name="user">  
    </div>
      <div class="form-group">
        <label for="title">Privacy Level</label>
            <select name="privacy" id="privacy"> 
                    <option value='Public'>Public</option>
                    <option value='Private'>Private</option>
        </select> 
    </div>
    
   
    <div class="form-group">
        <label for="title">Album Images</label>
        <input type="file"  class="btn btn-primary"  name="imagefiles[]" multiple>  
    </div>

    <input type='submit' value='Upload' name='upload'>    
</form>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->




