
<table class="table table-bordered table-hover  ">
    <thead class="thead-dark">
        <tr>
            <td >Id</td>
            <td>Comment Post</td>
            <td>Commenter</td>
            <td>Email</td>
            <td>Comment</td>
            <td>Comment Status</td>
            <td>Comment Date</td>
            <td>Change Status</td>


        </tr>
    </thead>
    <tbody>

        <?php
        $query="SELECT * FROM comments";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {
        ?>

        <tr><form action="#" method="post">
            <td><?php echo $row['comid']; ?></td>
            <input type="hidden"  name="comid" value="<?php echo $row['comid']; ?>">

            <td><?php 


            $query1="SELECT * FROM posts where pid={$row['compid']}";
            $result1=mysqli_query($connect,$query1);
            confirm($result1);
            $wr=mysqli_fetch_assoc($result1);
            echo $wr['ptitle'];


                ?>


            <td><?php echo $row['comauthor']; ?></td>


            <td><?php echo $row['comemail']; ?></td>

            <td><?php echo $row['comcontent']; ?></td>
            <td><?php echo $row['comstatus']; ?></td>
            <td><?php echo $row['comdate']; ?></td>

            <td align="right"><select name="status" id="post_cat">


                <option value='Approved'>Approve</option>
                <option value='Disapproved'>Disapprove</option>
                </select>
                <input type="submit"   name="change" value="Change" class="btn btn-warning" />
            </td>

            <td align="center" class="colcolar"><a href="comments.php?deletecomment=<?php echo $row['comid'];?>"  ><img src="images/delete.png"  ></a></td> 
            </form>
        </tr>

        <?php  }?>
    </tbody>
</table>



<?php 
if(isset($_GET['deletecomment'])){
    $id=$_GET['deletecomment'];
    $query="Delete from comments where comid={$id}";
    $result=mysqli_query($connect,$query);
    confirm($result);
    header("Location:comments.php");
}

if(isset($_POST['change'])){
    $id= $_POST['comid'];
    $status= $_POST['status'];
    $query1="UPDATE comments set comstatus='{$status}' where comid='{$id}'";
    $result1=mysqli_query($connect,$query1);
    confirm($result1);
    header("Location:comments.php");
}
?>



