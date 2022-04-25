<h1 style="color:green; text-align: center;">Site Gallery</h1><br>
<button type="button" class="btn btn-success"  style="float: left;" onclick="window.location.href='./maingallery.php?source=edit'">Add new pic</button><br><br>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <td>Id</td>
          
            <td>Display Image</td>
            <td>Update</td>
            <td>Delete</td>

        </tr>
    </thead>
    <tbody>
   

        <?php
        $query="SELECT * FROM gallery";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $row['Id']; ?></td>

            <td><img src="../../assets/img/gallery/<?php echo $row['Image']?> " width="300" > </td>
            <td align="center"><a href="view_maingallery.php?source=edit"  ><img src="images/refresh.png" ></a></td>
            <td align="center"><a href="maingallery.php?delete=<?php echo $row['Id'];?>"  ><img src="images/delete.png"  ></a></td> 
        </tr>

        <?php  }?>
    </tbody>
</table>



<?php
if(isset($_GET['delete'])){
    //--Deleting the slider image from the folder and table
    $id=$_GET['delete'];
    $query="SELECT * FROM gallery where Id={$id}";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $image="../../assets/img/gallery/{$row['Image']}";
    $image2="../../assets/img/gallery/thumb/{$row['Image']}";
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
    $query="Delete from gallery where Id={$id}";
    $result=mysqli_query($connect,$query);
    header("Location:maingallery.php");
}

?>



