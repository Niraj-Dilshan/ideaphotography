<?php
session_start();
include'connection.php';
$id = 100;
if(!isset($id))
{
    header('Location:login.php');
    echo "<script>console.log('Your not log in..!')</>"; 
}

$row;

if(isset($_POST['update']))
{
    var_dump($_POST);
    $datetime =  $_POST['datetime'];

    $query ="SELECT * FROM appoinment_data WHERE datetime = '$datetime'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        $row = mysqli_fetch_array($result);
        echo "<script>console.log('Search successful..')</script>";
    }
    else{
        echo "<script>console.log('Search unsuccessful..')</script>";
        $_SESSION['msg']='Something went to wrong';
        $_SESSION['modelflag'] = true;
        header('Location:index.php');
    }

    $objdatetime = new DateTime($datetime);
    $date = $objdatetime->format('Y-m-d');
    $time = $objdatetime->format('H:i:s');
    
    unset($_POST);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation </title>
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
         * {
                box-sizing: border-box;
            }
    </style>
</head>
<body>
    <!-- navbar -->  
 <nav class="navbar navbar-expand-lg fixed-top ">  
    <a class="navbar-brand" href="#">IdeaPhotography.lk</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse " id="navbarSupportedContent">     <ul class="navbar-nav mr-4">
    <a class="nav-link " data-value="contact" href="index.php">Back</a>       
    </li> 
   </ul> 
   </div>
</nav>
   <!-- header -->
   <header class="header">
        <div class="overlay"></div>
        <div class="container">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header" style="outline-offset: -13px;
                                                    padding: 30px;
                                                    background: #6819e8;
                                                    background: -moz-linear-gradient(left, #6819e8 0%, #7437d0 35%, #615fde 68%, #6980f2 100%);
                                                    background: -webkit-linear-gradient(left, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                    background: linear-gradient(to right, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6819e8', endColorstr='#6980f2',GradientType=1 );
                    ">
                    <h4 class="modal-title" style="color: #FFFFFF;">Appoinment</h4>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                            <form action="datahandler.php" method = "post" class="needs-validation" novalidate>
                                <div class="form-group">
                                  <label for="name">Your Name:</label>
                                  <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value='<?php echo $row['name']?>' required='true'>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group">
                                  <label for="contact">Contact No:</label>
                                  <input type="text" class="form-control" id="contact" placeholder="Enter contact no." value='<?php echo $row['contact']?>' name="contact" required='true'>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group">
                                    <label for="email">E Mail:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value='<?php echo $row['email']?>'>
                                </div>
                                <div class="form-group">
                                    <label for="date">Appoinment Date:</label>
                                    <input type="date" class="form-control" id="date" name="date" required='true' value='<?php echo $date?>'>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group">
                                    <label for="time">Time:</label>
                                    <input type="time" class="form-control" id="time" name="time" required='true' value='<?php echo $time?>'>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <input type=text name='datetime' value='<?php echo $datetime?>' style='display:none'>
                                <input type="submit" name = "update" class="btn btn-primary" value="Update">
                              </form>
                    </div>
                </div>
                </div>
        </div>
    </header>
    
    <!-- jquery,popper js,bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>

<?php } ?>