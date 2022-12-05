<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

    
    <div class="container">
        <div class="jumbotron text-centre">
            <h1>Upload Images</h1>
        </div>
    </div>
    
    <div class="container">
        
        <form method="POST" role="form" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="uploadimage">Image File</label>
                <input type="file" class="form-control" id="uploadimage" name="uploadimage" placeholder="Image" required>
            </div>
        
            
            <center>
            <button type="submit" class="btn btn-primary" name="upload">Submit</button></center>
        </form>
        
    </div>
    <div>
        <?php
            session_start();
            include'dbtest.php';
            if(isset($_POST['upload'])){
                $conn = openConnection();
                $targetDir = "uploads/";
                $filename = basename($_FILES['uploadimage']['name']);
                $targetFilePath = $targetDir.$filename;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                $userid = $_SESSION['userid'];
                if(in_array($fileType,$allowTypes)){
                    if(move_uploaded_file($_FILES['uploadimage']['tmp_name'],$targetFilePath)){
                        $insertQuery = "INSERT INTO images (filename, recordcreatedon,uploadedby) VALUES('".$filename."',NOW(),'".$userid."')";
                        if($conn->query($insertQuery) === TRUE){
                            echo "<div class=\"alert alert-success\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo"<strong>Uploaded Successfully!</strong>";
           echo"</div>";
                        }
                    }else{
                        echo"<div class=\"alert alert-danger\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                        <strong>Upload Failed!</strong>
                    </div>";
                    }
                }else{
                    echo"<div class=\"alert alert-danger\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                        <strong>Type not supported!</strong>Use any of jpg,png,jpeg,pdf.
                    </div>";
                }


            }
        ?>

    </div>
    
    
    
</body>
</html>