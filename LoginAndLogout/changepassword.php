<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Change Password</title>
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
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="myaccount.php">Account information</a>
            </li>
            <li>
                <a href="logout.php?logout=true" style="color:red;">Logout</a>
        </li>
        </ul>
        
    </div>
    
    <div class="container">
        
        <form method="POST" role="form">
            <legend>Change your password</legend>
        
            <div class="form-group">
                <label for="">Old Password</label>
                <input type="password" class="form-control" name="oldpwd" id="oldpwd" placeholder="old password">

                <label for="">New Password</label>
                <input type="password" class="form-control" name="newpwd" id="newpwd" placeholder="new password">
            </div>
        
            
            <center>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Change Password</button></center>
        </form>
        
    </div>
    <?php
        
        if(isset($_POST['submit'])){
            include'dbtest.php';
            $conn = openConnection();
            $uid = $_SESSION['userid'];
            $selectUser = "SELECT * FROM LoginForm WHERE id='".$uid."'";
            $oldpwd = trim($_POST['oldpwd']);
            $encryptedOldPwd = md5($oldpwd);
            $result = $conn->query($selectUser);
            while($row=$result->fetch_assoc()){
                $correctPassword = $row['passwd'];
            }
            if($correctPassword == $encryptedOldPwd){
                $newPasswd = trim($_POST['newpwd']);
                $encryptedNewPwd = md5($newPasswd);
                $updateQuery = "UPDATE LoginForm SET passwd = '".$encryptedNewPwd."' WHERE id = '".$uid."'"; 
                if($conn->query($updateQuery) === TRUE){
                    echo "<div class=\"alert alert-success\">";
                    echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                    echo"<strong>Password Changed!</strong>";
                   echo"</div>";
                }
            }else{
                echo"<div class=\"alert alert-danger\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <strong>Incorrect Old Password</strong>
            </div>";
            }
            
        }
    ?>
</body>
</html>