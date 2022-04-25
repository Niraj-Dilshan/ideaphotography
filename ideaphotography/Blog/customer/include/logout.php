<?php
 require '../../include/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
 $email=$_SESSION['email'];
    echo $email;
$result=mysqli_query($connect,"UPDATE users set active=0 WHERE uemail='$email'");
    if(!$result){
        die("Errror");
    }
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
 header("location:../../login/index.php");   
    
?>

</body>
</html>