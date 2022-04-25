
<?php
 //---Getting the deatils from the slider table----------
if(isset($_POST['add_slider'])){    
    $caption=$_POST['caption'];
    $image=$_FILES['image']['name'];
    $tmpimg=$_FILES['image']['tmp_name'];


    move_uploaded_file($tmpimg,"../images/slider/$image");
    $query="INSERT INTO slider(imgcaption,img) values('$caption','$image')";
    $result=mysqli_query($connect,$query);
    confirm($result);
    header("Location:silder.php");


}

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Image caption</label>
        <input type="text" class="form-control" name="caption">  
    </div>


    <div class="form-group">
        <label for="title">Post  Image</label>
        <input type="file"  class="btn btn-primary"  name="image">  
    </div>


    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="add_slider" value="Publish">
</form>