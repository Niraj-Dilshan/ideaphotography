

<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <td width="10">User Id</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Role</td>
            <td>Mail</td>
            <td>User Image</td>
            <td>Telephone Number</td>
            <td>Address</td>
            <td>Customer since</td>
            <td>Change role</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>

        <?php
        $query="SELECT * FROM users";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {
        ?>
        <form action="#" method="post">
            <tr class="text-center">
                <td><?php echo $row['uid']; ?></td>
                <input type="hidden"  name="uid" value="<?php echo $row['uid']; ?>">
                <td><?php echo $row['ufirstname']; ?></td>
                <td><?php echo $row['ulastname']; ?></td>
                <td><?php echo $row['urole'];  ?> </td>
                <td><?php echo $row['uemail']; ?></td>
                <td ><img src="images/users/<?php echo $row['uimage']?> " width="100" > </td>
                <td><?php echo $row['utnumber']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td ><select name="role" id="post_cat"> 
                    <option value='Admin'>Admin</option>
                    <option value='Customer'>Customer</option>
                    </select><br><br>
                    <input type="submit"   name="changec" value="Change" class="btn btn-danger" />
                </td>  <td align="center"><a href="users.php?source=edit_user&uid=<?php echo $row['uid'];?>"  ><img src="images/refresh.png" ></a></td>
                <td align="center" class="colcolar"><a href="users.php?deletecustomer=<?php echo $row['uid'];?>"  ><img src="images/delete.png"  ></a></td> 
            </tr>
        </form>
        <?php  }?>
    </tbody>
</table>



<?php 
if(isset($_GET['deletecustomer'])){
    $id=$_GET['deletecustomer'];
    $query="SELECT * FROM users where uid={$id}";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_assoc($result);
    $image="images/users/{$row['uimage']}";
    if(file_exists($image)){
        unlink($image);
    } else {
        die('file does not exist');
    }
    $query="Delete from users where uid={$id}";
    $result=mysqli_query($connect,$query);
    header("Location:users.php");
}
if(isset($_POST['changec'])){
    $id=$_POST['uid'];
    $role=$_POST['role'];
    $query="UPDATE users SET urole='{$role}' where uid={$id}";
    $result=mysqli_query($connect,$query);

    header("Location:users.php");
}

?>



