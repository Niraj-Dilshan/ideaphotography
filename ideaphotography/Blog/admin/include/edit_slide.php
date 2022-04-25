
<?php

if(isset($_GET['id'])){
    $pid=$_GET['id'];
    $query="SELECT * FROM slider where pid={$pid}";
    $result=mysqli_query($connect,$query);
    confirm($result);
    $row=mysqli_fetch_assoc($result);

}
updateslide($pid);

?>


<form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Image caption</label>
        <input type="text" class="form-control" name="cap" value="<?php echo $row['imgcaption']?>">  
    </div>


    <div class="form-group">
        <label for="title">Post  Image</label><br>
        <img src="../images/slider/<?php echo $row['img']?> " style="width: 30%; height: 30%" > 
        <input type="file"  class="btn btn-primary"  name="image">  
    </div>

    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="update" value="Update">
</form>