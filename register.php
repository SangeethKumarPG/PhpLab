<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
                <a href="login.php">Login</a>
            </li>
        </ul>
        
    </div>
    
    <div class="container">
        
        <div class="jumbotron text-center">
            <h2>Registration Form</h2>
        </div>
        
    </div>
    
    <div class="container">
        
        <form method="POST" role="form">
            <legend>Please Enter the details</legend>
        
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                <label for="emailid">Email Address</label>
                <input type="email" name="emailid" id="emailid" class="form-control" value="" required="required" title="" placeholder="Email Id">
                <label for="pass">Set Password</label>
                
                <input type="password" name="passwd" id="passwd" class="form-control" required="required" title="" placeholder="Password">
                
            </div>
        
            
            
            <button type="submit" class="btn btn-large btn-block btn-primary">Register</button>
            
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        </form>
        
    </div>
    <?php
        if($_POST){
        include'dbtest.php';
        $conn = openConnection();
        $fn = trim($_POST['fname']);
        $ln = trim($_POST['lname']);
        $email = trim($_POST['emailid']);
        $passwd = trim($_POST['passwd']);
        $encryptedPassword = md5($passwd);
        $timestamp = date("Y-m-d H:i:s");
        $insertQuery = "INSERT INTO LoginForm(fname,lname,email,passwd,recordcreated) VALUES('$fn','$ln','$email','$encryptedPassword','$timestamp')";
        if($conn->query($insertQuery) === TRUE){

            echo "<div class=\"alert alert-success\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo"<strong>Registration Success!</strong>";
           echo"</div>";
        }else{
            
            echo"<div class=\"alert alert-danger\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <strong>Registration Failed!</strong>
            </div>";
            
        }
        }
        
    ?>
    <!-- <br><br><br>
    <footer>
   
        
        <center><a href="index.php">Home</a></center>
        
    
    </footer>
     -->
        

</body>
</html>