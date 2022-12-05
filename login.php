<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    
    <div class="container">
        
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="register.php">Register</a>
            </li>
        </ul>
        
    </div>
    
    <div class="container">
        
        <div class="page-header">
          <h1>Login</h1>
        </div>
        
    </div>
    
    <div class="container">
        
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" role="form">
        
            <div class="form-group">
                <label for="emailid">Email Address</label>
                <input type="text" class="form-control" name = "emailid" id="emailid" placeholder=" Email" required>
                <label for="passwd">Password</label>
                <input type="password" name="passwd" id="passwd" class="form-control"  required="required" title="" placeholder="Password">
                
            </div>
        
            
        
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        
    </div>
    <?php
    session_start();
    include 'dbtest.php';
    if($_POST){
        $emailid = trim($_POST['emailid']);
        $passwd = trim($_POST['passwd']);
        $encryptedPassword = md5($passwd);
        $conn = openConnection();
        $sqlQuery = "SELECT * FROM LoginForm WHERE email = '".$emailid."'";

        $result1 = $conn->query($sqlQuery);
        $numberOfRows = $result1->num_rows;
        if($numberOfRows == 1){
            $row = $result1->fetch_assoc();
            if($encryptedPassword == $row['passwd']){
                $_SESSION['userid'] = $row['id'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                header('location:dashboard.php');
                exit;

            }else{
                echo"<div class=\"alert alert-danger\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <strong>Wrong Password!</strong>
            </div>";
            }
        }else{
            echo"<div class=\"alert alert-danger\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
            <strong>No user found!</strong>
        </div>";
        }

    }

    
    ?>

    
    
</body>
</html>