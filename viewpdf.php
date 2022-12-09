<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
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
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="logout.php?logout=true" style="color:red;">Logout</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>PDF Gallery</h1>
        </div>
    </div>

    <div class="container">
        <?php
        session_start();
        include 'dbtest.php';
        $conn = openConnection();
        $selectQuery = "SELECT * FROM pdf WHERE uploadedby ='" . $_SESSION['userid'] . "'";
        $result = $conn->query($selectQuery);
        $numberOfImages = $result->num_rows;

        while ($row = $result->fetch_assoc()) {



        ?>

            <div class="row">
                <div class=col-md-4">
                    <i class="glyphicon glyphicon-open-file"><a href="showpdf.php?file=<?php echo $row['filename'] ?>">
                            <?php echo $row['filename']; ?>
                        </a> </i>

                </div>

            </div>

    </div>

<?php } ?>
</div>

</body>

</html>