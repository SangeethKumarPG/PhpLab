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

    <title>Account Info</title>
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
            <a href="changepassword.php">Change Password</a>
        </li>
        <li>
            <a href="#" onclick="check()">Delete my account</a>
        </li>
        <li>
                <a href="logout.php?logout=true" style="color:red;">Logout</a>
        </li>
    </ul>
    </div>
    
    <div class="container">
        
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email id</th>
                    <th>Information updated on</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $id = $_SESSION['userid'];    
                include'dbtest.php';

                $conn = openConnection();
                $selectQuery = "SELECT fname,lname,email,recordcreated FROM LoginForm WHERE id = '".$id."'";
                $result = $conn->query($selectQuery);

               while($row=$result->fetch_assoc()){ 
               echo" <tr>";
                    echo "<td>".$row['fname']."</td>";
                    echo "<td>".$row['lname']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['recordcreated']."</td>";
                echo"</tr>";
            }
                ?>
            </tbody>
        </table>
        
    </div>
    <script>
        function check(){
            if(window.confirm('Are you sure you want to delete your account')){
                window.location.href = "deleteaccount.php";
            }

        }
    </script>
    
</body>
</html>