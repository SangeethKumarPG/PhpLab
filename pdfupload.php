<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Upload</title>
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
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="logout.php?logout=true" style="color:red;">Logout</a>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="jumbotron text-centre">
            <h1>Upload PDF Files</h1>
        </div>
    </div>

    <div class="container">

        <form method="POST" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="uploadimage">PDF File</label>
                <input type="file" class="form-control" id="uploadpdf" name="uploadpdf" placeholder="PDF" accept=".pdf" required>
            </div>


            <center>
                <button type="submit" class="btn btn-primary" name="upload">Upload</button>
            </center>
        </form>

    </div>
    <div>
        <?php
        session_start();
        include 'dbtest.php';
        if (isset($_POST['upload'])) {
            $conn = openConnection();
            $targetDir = "PDFFiles/";
            $filename = basename($_FILES['uploadpdf']['name']);
            $targetFilePath = $targetDir . $filename;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = 'pdf';
            $userid = $_SESSION['userid'];
            if ($fileType == $allowTypes) {
                if (move_uploaded_file($_FILES['uploadpdf']['tmp_name'], $targetFilePath)) {
                    $insertQuery = "INSERT INTO pdf (filename, recordcreatedon,uploadedby) VALUES('" . $filename . "',NOW(),'" . $userid . "')";
                    if ($conn->query($insertQuery) === TRUE) {
                        echo "<div class=\"alert alert-success\">";
                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                        echo "<strong>Uploaded Successfully!</strong>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class=\"alert alert-danger\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                        <strong>Upload Failed!</strong>
                    </div>";
                }
            } else {
                echo "<div class=\"alert alert-danger\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                        <strong>Type not supported!</strong>pdf files.
                    </div>";
            }
        }
        ?>

    </div>



</body>

</html>