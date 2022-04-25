
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <td>Id</td>
            <td>Image Caption</td>
            <td>Display Image</td>
            <td>Update</td>
            <td>Delete</td>

        </tr>
    </thead>
    <tbody>

        <?php
        $query="SELECT * FROM slider";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $row['pid']; ?></td>
            <td><?php echo $row['imgcaption']; ?></td>

            <td><img src="../images/slider/<?php echo $row['img']?> " width="100" > </td>
            <td align="center"><a href="silder.php?source=update&id=<?php echo $row['pid'];?>"  ><img src="images/refresh.png" ></a></td>
            <td align="center"><a href="silder.php?delete=<?php echo $row['pid'];?>"  ><img src="images/delete.png"  ></a></td> 
        </tr>

        <?php  }?>
    </tbody>
</table>



<?php
if(isset($_GET['delete'])){
    //--Deleting the slider image from the folder and table
    $id=$_GET['delete'];
    $query="SELECT * FROM slider where pid={$id}";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $image="../images/slider/{$row['img']}";
    if(file_exists($image)){
        unlink($image);
    } else {
        die('file does not exist');
    }
    $query="Delete from slider where pid={$id}";
    $result=mysqli_query($connect,$query);
    header("Location:slider.php");
}

?>



