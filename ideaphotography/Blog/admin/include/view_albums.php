
<table class="ab" >

    <tr>
        <?php


        $query="SELECT * FROM album";
        $result=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($result))
        {  
        ?>
        <form action="#" method="post">
            <input type="hidden"  name="filename" value="<?php echo $row['name'];?>">
            <td align="center"> <a href="view/index.php?source=<?php echo  $row['name'];?>"><img src="images/folder.png"><br><label for="image"><?php echo  $row['name'];?>
                </label></a><br> <a href="album.php?source=edit_album&name=<?php echo  $row['name'];?>" class="btn btn-success" role="button">Update</a><br><br>
                <input type="submit"   name="delete" value="Delete" class="btn btn-danger" /></td>
        </form>


        <?php  }?>
        <?php
        if(isset($_POST['delete'])){
            $id=$_POST['filename'];
            $name=strval($_POST['filename']);
            //-----------Droping the infro about album from the main table
            $query1="Delete from album where name='{$name}'";
            $result1=mysqli_query($connect,$query1);
            confirm($result1);

            if($name != "category" ||$name != "comments" || $name != "posts" || $name != "slider" || $name!= "users"){
                $query="Drop table {$name}";  //Droping the album table
                $result=mysqli_query($connect,$query);
                confirm($result);

            }
            //--------------------------Deleitng the album folder
            $dir="C:/xampp/htdocs/IdeaPhotography.lk/Blog/admin/images/albums/{$id}";
            deleteDir($dir);
            header("Location:album.php");

        }?>

        <?php //Function for deleteing the path
        function deleteDir($path) {
            return is_file($path) ?
                @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);

        }?>
    </tr>
</table>