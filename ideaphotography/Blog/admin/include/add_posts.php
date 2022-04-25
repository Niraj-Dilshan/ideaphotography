<form action="" method="post" enctype="multipart/form-data">
    <div class="grid-container">  
        <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" class="form-control" name="title">  
        </div>

        <div class="form-group">
            <label for="title">Photographer</label>
            <input type="text" class="form-control" name="photographer">  
        </div>

        <div class="form-group">
            <label for="title">Post Status</label><br>
            <select name="status" id="status">
                <option value='Published'>Published</option>
                <option value='Draft' selected>Draft</option>       
            </select> 
        </div>

        <div class="form-group">
            <label for="title">Post  Image</label>
            <input type="file"  class="btn btn-primary"  name="image">  
        </div>

        <div class="form-group">
            <label for="title">Post Tags</label>
            <input type="text" class="form-control" name="tag">  
        </div>
    </div>
    <div class="form-group">
        <label for="title">Category </label><br>
        <select name="post_cat" id="post_cat">

            <?php
            $query1="Select * from category";
            $result1=mysqli_query($connect,$query1);
            confirm($result1);     
            while($row1=mysqli_fetch_assoc($result1)){
                $id=$row1['catid'];
                $catname=$row1['catname'];


            ?>
            <?php echo "<option value='$id'>$catname</option>"; }?>
        </select> 

    </div>
        

    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="content" id="editor" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group"></div>
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish">
</form>

<?php

if(isset($_POST['create_post'])){
    $title=$_POST['title'];
    $category=$_POST['post_cat'];
    $author=$_POST['photographer'];
    $status=$_POST['status'];
    $pimage=$_FILES['image']['name'];
    $ptmpimg=$_FILES['image']['tmp_name'];

    $tags=$_POST['tag'];
    $content=$_POST['content'];
    $pdate=date('d-m-y');

    move_uploaded_file($ptmpimg,"../images/posts/$pimage");
    $query="INSERT INTO posts(pcatid,ptitle,pauthor,pdate,pimage,pcontent,ptag,pstatus) values('$category','$title','$author',now(),'$pimage','$content','$tags','$status')";
    $result=mysqli_query($connect,$query);
    confirm($result);
   echo "<p>New Post added.<a href='#'>View Post </a> </p>";


}

?>