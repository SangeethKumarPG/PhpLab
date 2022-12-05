<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
</head>
<body>
    
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Image Gallery</h1>
        </div>
    </div>
    
    <div class="container">
       <?php
            session_start();
            include 'dbtest.php';
            $conn = openConnection();
            $selectQuery = "SELECT * FROM images WHERE uploadedby ='".$_SESSION['userid']."'";
            $result = $conn->query($selectQuery);
            $numberOfImages = $result->num_rows;
            while($row=$result->fetch_assoc()){
       
    echo"<div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"thumbnail\" style=\"width: 100%\">";
                        echo "<a href=\"uploads/$row['filename']\">
                            <img src=\"./uploads/$row['filename']\">
                        </a>
                        <caption>$row['filename']</caption>
                    </div>
                    
                </div>";
              
            echo"</div>";
            
    </div>
    
</body>
</html>