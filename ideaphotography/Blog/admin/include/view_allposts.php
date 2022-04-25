<h1 style="color:green; text-align: center;">Blog Posts</h1><br>
<br>

<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <td>Id</td>
            <td>Photographer</td>
            <td>Title</td>
            <td>Category</td>
            <td>Status</td>
            <td>Display Image</td>
            <td>Tags</td>
            <td>Comments</td>
            <td>Dates</td>
            <td>Change Status</td>
            <td>View</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>

        <?php
        $query="SELECT * FROM posts";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {
        ?>
        <form action="#" method="post">
            <tr class="text-center">
                <td><?php echo $row['pid']; ?></td>
                <input type="hidden"  name="pid" value="<?php echo $row['pid']; ?>">
                <td><?php echo $row['pauthor']; ?></td>
                <td><?php echo $row['ptitle']; ?></td>
                <td><?php 
            $query1="SELECT * FROM category where catid={$row['pcatid']}";
            $result1=mysqli_query($connect,$query1);
            confirm($result1);
            $wr=mysqli_fetch_assoc($result1);
            echo $wr['catname'];
                    ?>
                </td>
                <td><?php echo $row['pstatus']; ?></td>
                <td><img src="../images/posts/<?php echo $row['pimage']?> " width="100" > </td>
                <td><?php echo $row['ptag']; ?></td>
                <td><?php
            $query1="SELECT  *  from comments where  compid={$row['pid']}" ;
            $result1=mysqli_query($connect,$query1);
            $row1=mysqli_num_rows($result1);
            echo $row1;        

                    ?></td>
                <td><?php echo $row['pdate']; ?></td>
                <td align="right"><select name="status" id="post_cat"> 
                    <option value='Published'>Published</option>
                    <option value='Draft'>Draft</option>
                    </select>
                    <input type="submit"   name="change" value="Change" class="search1" />
                </td>
                <td><button type="button" class="btn btn-success" onclick="window.location.href='../post.php?id=<?php echo $row['pid'];?>'">View</button></td>
                <td align="center"><a href="posts.php?source=edit_post&pid=<?php echo $row['pid'];?>"  ><img src="images/refresh.png" ></a></td>
                <td align="center" class="colcolar"><a href="posts.php?delete=<?php echo $row['pid'];?>"  ><img src="images/delete.png"  ></a></td> 
            </tr>
        </form>
        <?php  }?>
    </tbody>
</table>


<?php 
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $query="SELECT * FROM posts where pid={$id}";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $image="../images/posts/{$row['pimage']}";
    if(file_exists($image)){
        unlink($image);
    } else {
        die('file does not exist');
    }
    $query="Delete from posts where pid={$id}";
    $result=mysqli_query($connect,$query);
    header("Location:posts.php");
}
if(isset($_POST['change'])){
    $id=$_POST['pid'];
    $state=$_POST['status'];
    $query="UPDATE posts SET pstatus='{$state}' where pid={$id}";
    $result=mysqli_query($connect,$query);
    header("Location:posts.php");
}

?>



