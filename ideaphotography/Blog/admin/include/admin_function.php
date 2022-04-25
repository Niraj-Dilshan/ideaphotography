<?php

function cat_insert(){
    global $connect;
    if(isset($_POST['submit'])){
        $name=$_POST['cat_title'];
        if($name ==""|| empty($name)){
            echo "<h3>This field should not be empty</h3>";
        }else{
            $query="Insert into category(catname) values('{$name}')";
            $result=mysqli_query($connect,$query);
            if(!$result){
                die("Query Failed".mysqli_error());
            }
        }
    }

}

function cat_delete(){
    global $connect;
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $query="Delete from category where catid={$id}";
        $reult=mysqli_query($connect,$query);
        header("Location:categories.php");
    }
}


function confirm($result){
    global $connect;
    if(!$result){
        die("Querry Failed".mysqli_error());
    }
    return;
}

function updatepost($postid){
    global $connect;
    if (isset($_POST['update_post'])){
        $title=$_POST['title'];
        $category=$_POST['post_cat'];
        $author=$_POST['photographer'];
        $status=$_POST['status'];
        $pimage=$_FILES['image']['name'];
        $ptmpimg=$_FILES['image']['tmp_name'];

        $tags=$_POST['tag'];
        $content=$_POST['content'];
        $pdate=date('d-m-y');

        $query2="UPDATE posts SET ptitle='{$title}',pcatid='{$category}',pauthor='{$author}',pdate=now(),ptag='{$tags}',pcontent='{$content}',pstatus='{$status}' WHERE pid={$postid}";
        $result2=mysqli_query($connect,$query2);
        confirm($result2);




        if(($_FILES['image']['size'])!=0 ) 
        {
            $id=$_GET['pid'];
            $query3="SELECT * FROM posts where pid={$id}";
            $result3=mysqli_query($connect,$query3);
            $ap=mysqli_fetch_assoc($result3);
            $im="../images/posts/{$ap['pimage']}";
            unlink($im);
            $query2="UPDATE posts SET pimage='{$pimage}' WHERE pid={$postid}";
            $result2=mysqli_query($connect,$query2);
            confirm($result2);
            move_uploaded_file($ptmpimg,"../images/posts/$pimage");
        } 
       echo "<p>Post Updated.<a href='posts.php'>View Post </a> </p>";
    }

}

function updateslide($pid){
    global $connect;
    if (isset($_POST['update'])){

        $caption=$_POST['cap'];
        $image=$_FILES['image']['name'];
        $tmpimg=$_FILES['image']['tmp_name'];
        $query2="UPDATE slider SET imgcaption='{$caption}' where pid={$pid}";
        $result2=mysqli_query($connect,$query2);
        confirm($result2);

        if(($_FILES['image']['size'])!=0 ) 
        {

            $query3="SELECT * FROM slider where pid={$pid}";
            $result3=mysqli_query($connect,$query3);
            $ap=mysqli_fetch_assoc($result3);
            $im="../images/slider/{$ap['img']}";
            unlink($im);
            $query2="UPDATE slider SET img='{$image}' WHERE pid={$pid}";
            $result2=mysqli_query($connect,$query2);
            confirm($result2);
            move_uploaded_file($tmpimg,"../images/slider/$image");
        }
        header("Location:silder.php");

    }

}



?>