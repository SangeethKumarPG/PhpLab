<!DOCTYPE html>
<html>

<head>
    <title>Login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="background-color: goldenrod;font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <div class="container">
        <div class="jumbotron text-center" style="background-color: skyblue;">
            <h3>Registration Form</h3>
        </div>
    </div>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="fname">Enter the first name</label><br>
                <input type="text" class="form-control" id="fname" name="fname" required><br>
                <label for="fname">Enter the last name</label><br>
                <input type="text" class="form-control" id="lname" name="lname" required><br>
                <label for="mobile">Enter the mobile number</label><br>
                <input type="tel" class="form-control" id="mobile" name="mobile" required><br>
                <label for="addr">Enter the address</label><br>
                <input type="text" class="form-control" id="addr" name="addr" required><br>

            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit Data</button>
        </form>
        <br>
        <button class="btn btn-primary btn-lg btn-block"><a href="viewusers.php" style="color:aliceblue">View Registered Users</a></button>
    </div><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>
                    <?php

                    include 'dbtest.php';
                    $conn = openConnection();
                    if ($_POST) {
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $mobile = $_POST['mobile'];
                        $addr = $_POST['addr'];
                        $sql = "INSERT INTO RegistrationForm(firstname,lastname,address,mobile) VALUES ('$fname','$lname','$addr','$mobile')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Registered successfully!";
                        } else {
                            echo "Registration failed . $conn->error";
                        }
                    }
                    ?>
                </h5>
            </div>
        </div>
    </div>
    <br>
    <!-- <div class="container">
        <button class="btn btn-primary"><a href="viewusers.php" style="color:aliceblue">View Registered Users</a></button>
    </div> -->
   
</body>

</html>