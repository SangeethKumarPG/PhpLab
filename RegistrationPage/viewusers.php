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

    <title>Registered Users</title>
</head>

<body style="background-color: goldenrod; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <div class="container">


        <?php
        
        echo "<table class=\"table table-striped table-bordered table-hover\">
                <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    </thead>
                </tr>";
                
        include 'dbtest.php';        
        $conn2 = openConnection();
        $selectQuery = "SELECT * FROM RegistrationForm";
        $result = $conn2->query($selectQuery);
        if($result->num_rows <= 0){
            echo"<tr>
                <td>No</td>
                <td>Entries</td>
                <td>Present</td>
                <td>In</td>
                <td>Table</td>
                </tr>";
            
        }
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['mobile'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        ?>




    </div>

</body>

</html>