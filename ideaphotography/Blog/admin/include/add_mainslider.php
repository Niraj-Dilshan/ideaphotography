
<?php
 //---Getting the deatils from the slider table----------
if(isset($_POST['add_mainslider'])){    
    $image=$_FILES['image']['name'];
    $tmpimg=$_FILES['image']['tmp_name'];


    move_uploaded_file($tmpimg,"../../assets/img/slider/$image");
    $query="INSERT INTO mainslider(image) values('$image')";
    $result=mysqli_query($connect,$query);
    confirm($result);
    header("Location:mainslider.php");


}

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title"> Image</label>
        <input type="file"  class="btn btn-primary"  name="image">  
    </div>


    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="add_mainslider" value="Add pic">
</form>