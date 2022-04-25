<?php
session_start();
include 'connection.php';
$id = 100;
if(!isset($id))
{
    header('Location:login.php');
    echo "<script>console.log('Your not log in..!')</>"; 
}


// add data to database

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = new DateTime($_POST['date']);
    $time = new DateTime($_POST['time']);

    $datetime = new DateTime($date->format('Y-m-d') .' ' .$time->format('H:i:s'));

    $merge = $datetime->format('Y-m-d H:i:s');

    $query = "INSERT INTO appoinment_data VALUES($id,'$name',$contact,'$email','$merge')";

    $result = mysqli_query($con,$query);

    if($result)
    {
        echo "<script>console.log('Data add to Database..')</script>";
        $_SESSION['msg'] = 'Success';
        $_SESSION['modelflag']=true;
    }
    else{
        echo "<script>console.log('Data can\'t add to Database..')</script>";
        $_SESSION['msg'] = 'Error';
        $msg = $_SESSION['msg'];
        $_SESSION['modelflag']=true;
    }
    unset($_POST);
    header('Location:index.php');
    
    
}
    //delete appoinment in database

if(isset($_POST['delete']))
{
    $datetime = $_POST['datetime'];

    $query = "DELETE FROM appoinment_data WHERE datetime = '$datetime'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo "<script>console.log('Data delete from Database..')</script>";
        $_SESSION['msg'] = 'Delete Success';
        $_SESSION['modelflag']=true;
    }
    else{
        echo "<script>console.log('Data can\'t delete from Database..')</script>";
        $_SESSION['msg'] = 'Delete Error';
        $msg = $_SESSION['msg'];
        $_SESSION['modelflag']=true;
    }
    unset($_POST);
    header('Location:index.php');
}

    //update appoinment in database
    
if(isset($_POST['update']))
{
    $olddatetime = $_POST['datetime'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = new DateTime($_POST['date']);
    $time = new DateTime($_POST['time']);

    $datetime = new DateTime($date->format('Y-m-d') .' ' .$time->format('H:i:s'));

    $merge = $datetime->format('Y-m-d H:i:s');

    $query = "UPDATE appoinment_data SET id = $id, name = '$name', contact = $contact, email = '$email',datetime = '$merge' WHERE datetime = '$olddatetime'";

    $result = mysqli_query($con,$query);

    if($result)
    {
        echo "<script>console.log('Database Updated..')</script>";
        $_SESSION['msg'] = 'Update Success';
        $_SESSION['modelflag']=true;
    }
    else{
        echo "<script>console.log('Database can\'t Update..')</script>";
        $_SESSION['msg'] = 'Update Error';
        $msg = $_SESSION['msg'];
        $_SESSION['modelflag']=true;
    }
    unset($_POST);
    header('Location:index.php');
    
    
}
?>