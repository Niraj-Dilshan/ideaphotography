
<?php
//---Getting the  post id from the get global varaible and getting all the queries from the table
if(isset($_GET['pid'])){
    $postid=$_GET['pid'];
    $query="SELECT * FROM posts where pid={$postid}";
    $result=mysqli_query($connect,$query);
    confirm($result);
    $row=mysqli_fetch_assoc($result);

}


updatepost($postid);
  
?>


<form action="#" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $row['ptitle']?>">  
    </div>


    <div class="form-group">
        <label for="title">Category </label><br>
        <select name="post_cat" id="post_cat">
<!--Getting the category Dynimically-->
            <?php
                $query1="Select * from category";
               $result1=mysqli_query($connect,$query1);
               confirm($result1);     
               while($row1=mysqli_fetch_assoc($result1)){
                   $id=$row1['catid'];
                   $catname=$row1['catname'];
                   if($id==$row['pcatid']){
                       echo "<option value='$id' selected >$catname</option>";
                   }else{
                       echo "<option value='$id'>$catname</option>"; 
                   } }?>
        </select> 

    </div>

    <div class="form-group">
        <label for="title">Photographer</label>
        <input type="text" class="form-control" name="photographer" value="<?php echo $row['pauthor']?>">  
    </div>


    <div class="form-group">
        <label for="title">Post Status</label> <br>

        <select name="status" id="status" >
            <option value='Published' <?php echo ($row['pstatus']== "Published")?"selected":""; ?>>Published</option>
            <option value='Draft' <?php echo ($row['pstatus']== "Draft")?"selected":""; ?>>Draft</option>     
        </select>  
    </div>
    <div class="form-group">
        <label for="title">Post  Image</label><br>
        <img src="../images/posts/<?php echo $row['pimage']?> " style="width: 30%; height: 30%" > 
        <input type="file"  class="btn btn-primary"  name="image">  
    </div>

    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" name="tag" value="<?php echo $row['ptag']?>">  
    </div>

    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10"><?php echo $row['pcontent']?></textarea>
    </div>

    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="update_post" value="Update">
</form>


