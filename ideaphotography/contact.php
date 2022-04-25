<?php 
session_start();
include "db.php";

if(isset($_POST['contact'])){
    $_SESSION['contact']=1;
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
     $date=date('d-m-y');
    $sql = "INSERT INTO support(Name,Email,Message,Date) values('$name','$email','$message',now())";
    $result=mysqli_query($connect,$sql);
   
  
       mysqli_close($connect);

}?>
<script type="text/javascript">location.href = 'http://localhost/IdeaPhotography.lk/#contact';</script>