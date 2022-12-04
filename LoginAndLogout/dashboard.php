<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>
<?php
session_start();
if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
    header('location:index.php');
    exit;
}
?>
<div class="container">
        
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="logout.php?logout=true" style="color:red;">Logout</a>
            </li>
            <li>
                <a href="myaccount.php">Edit account information</a>
            </li>
        </ul>
        
    </div>
    <div class="container">
        
        <div class="jumbotron">
            <div class="container">
                <h1>Hello <?php $fname = $_SESSION['fname']; echo $fname;?></h1>
                <p>Welcome ...</p>
            </div>
        </div>
        
    </div>
    
    
</body>
</html>