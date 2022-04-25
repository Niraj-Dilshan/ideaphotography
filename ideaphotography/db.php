<?php
//Conecting to the the database
$connect=mysqli_connect('localhost','root','','ideaphotography');

if(!$connect){
    die("Couldnot not connect".mysqli_error());
}


?>