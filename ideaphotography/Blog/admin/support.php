

<?php include "include/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome

                        <small><?php echo  $_SESSION['first_name'] ?></small>
                    </h1>

<h1 style="color:blue; text-align: center;">Support Requests</h1><br>
                    <table class="table table-bordered table-hover  ">
                        <thead class="thead-dark">
                            <tr>
                                <td >Id</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Message</td>
                                <td>Date</td>
                                <td>Acton</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
    $query="SELECT * FROM support";
                            $result=mysqli_query($connect,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                            ?>

                            <tr><form action="#" method="post">
                                <td><?php echo $row['Id']; ?></td>
                                <input type="hidden"  name="comid" value="<?php echo $row['Id']; ?>">
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Message']; ?></td>
                                <td><?php echo $row['Date']; ?></td>

  <td><input type="submit"   name="changec" value="Reply" class="btn btn-warning" /></td>


                                <td align="center" class="colcolar"><a href="comments.php?deletecomment=<?php echo $row['comid'];?>"  ><img src="images/delete.png"  ></a></td> 
                                </form>
                            </tr>

                            <?php  }?>
                        </tbody>
                    </table>


                    <!--

<?php 
if(isset($_GET['deletecomment'])){
    $id=$_GET['deletecomment'];
    $query="Delete from comments where comid={$id}";
    $result=mysqli_query($connect,$query);
    confirm($result);
    header("Location:comments.php");
}


?>

-->




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "include/admin_footer.php"; ?>