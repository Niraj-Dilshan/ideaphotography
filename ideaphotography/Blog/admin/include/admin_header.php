<?php ob_start();
 include "../include/db.php";
 include "admin_function.php"; 
 session_start();

//
// if(!isset($_SESSION['user role'])){
//     header("Location: ../index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IdeaPhotography - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't' work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   <!-- Goolge chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    
   <style type="text/css">
.thead-dark {
    background-color:black;
    border-color: black;
    color: white;
  

}
       .colcolar{
           background-color:deepskyblue;
       }
input.search1 {
    width: 5em;  height: 2em;
    background-color: coral;
}
table.ab {
  border-collapse: separate;
  border-spacing: 35px 0;
}
       .grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-gap: 10px;
}
       
         .grid-containers {
  display: grid;
  grid-template-columns: auto  auto;
  grid-gap: 10px;
}
       
       
.panel-p {
    border-color: #c91ca6;
}

.panel-p .panel-heading {
    border-color: #c91ca6;
    color: #fff;
    background-color: #c91ca6;
}

.panel-p a {
    color: #c91ca6;
}

.panel-p a:hover {
    color: #df8a13;
}


    </style>
</head> <body> 