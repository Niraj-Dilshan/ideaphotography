

<hr style="  border: 3px solid green;
           border-radius: 5px;">  
<h1 style="color:green; text-align: center;">Edit album</h1><br>

<?php


if(isset($_GET['name'])){
    $name= $_GET['name'];
    $query1="SELECT * FROM album where name='{$name}'";
    $result1=mysqli_query($connect,$query1);
    $row1=mysqli_fetch_assoc($result1);

}else{
    die("Error");
}


?>


<div class="grid-containers">
    <div>
        <div class="form-group">
            <label for="title">Album Name</label>
            <input type="text" class="form-control" name="name" readonly value="<?php echo $row1['name']; $abname=$row1['name'];?> ">  
        </div> 
        <form method='post' action='#' enctype='multipart/form-data'>
            <div class="form-group">
                <label for="title">Album Images</label>
                <input type="file"  class="btn btn-primary"  name="imagefiles[]" multiple>  
            </div>
            <input type='submit' value='Add new pictures ' name='add' class="btn btn-success"> <br>
        </form>
        <label for="table"><span><h3>Album</h3></span></label>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <td>Id</td>
                    <td>Image</td>
                    <td>Date</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>

                <!--
<?php
$query="SELECT * FROM {$name}";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($result))
{
?>
-->
                <form action="#" method="post">
                    <tr class="text-center">
                        <td width="20"><?php echo $row['id'];?></td>
                        <input type="hidden"  name="pid" value="<?php echo $row['id'];?>">
                        <td ><img src="images/albums/<?php echo $name;?>/<?php echo $row['imagename'];?>" width="150" height="75" > </td>
                        <td ><?php echo $row['date'];?></td>
                        <td  align="center"><a href="posts.php?source=edit_post&pid="  ><img src="images/refresh.png" ></a></td>
                        <td  align="center" class="colcolar"><a href="album.php?source=edit_album&name=<?php echo $abname?>&delete=<?php echo  $row['id']; ?>"  ><img src="images/delete.png"  ></a></td> 
                    </tr>
                </form>
                <!--                                        <?php  }?>-->
            </tbody>
        </table>
    </div>

    <div>
        <form action="#" method="post">
            <div class="form-group">
                <label for="title">Authrozied user</label>
                <input type="text" class="form-control" name="username"  value="<?php echo $row1['user']?>">  
            </div> 

            <div class="form-group">
                <label for="title">Privacy Level</label>
                <select name="privacy" id="privacy"> 
                    <?php if($row1['privacy']=="Public"){?>
                    <option value='Public' selected>Public</option><option value='Private'>Private</option><?php }else {?>
                    <option value='Private' selected>Private</option><option value='Public' >Public</option><?php } ?>
                </select>  
            </div> 
            <input type='submit' value='Update' name='updatedetails' class="btn btn-success">    
        </form>

    </div>  

</div>
<!-- Updateing the album table-->
<?php 
if (isset($_POST['updatedetails'])){

    $name=$abname;
    $privacy=$_POST['privacy'];
    $usermail=$_POST['username']; 
    $query2="UPDATE album SET privacy='{$privacy}',user='{$usermail}' WHERE name='{$name}'";
    $result2=mysqli_query($connect,$query2);
    confirm($result2);
    header('Location: ./album.php');

}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $query="SELECT * FROM $abname where id={$id}";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $image="./images/albums/$abname/{$row['imagename']}";
    $image2="./images/albums/$abname/thumbnail/{$row['imagename']}";
    if(file_exists($image)){
        unlink($image);
    } else {
        die('file does not exist');
    }
    if(file_exists($image2)){
        unlink($image2);
    } else {
        die('file does not exist');
    }
    $query="Delete from $abname where id={$id}";
    $result=mysqli_query($connect,$query);
    //     header("Location:./album.php?source=edit_album&name=$abname");
}




if(isset($_POST['add'])){

    $id=$abname;
    // Location 

    $path = "./images/albums/".$id."/";
    $thumbnail_path = "images/albums/".$id."/thumbnail/";
    if (!file_exists($path)) {
        createtable();
        mkdir($path,755);


    }if (!file_exists($thumbnail_path)) {
        mkdir($thumbnail_path,755);
    }

    $name =strval($abname);
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

?>



