<!DOCTYPE html>
<html>
    <head>
        <title>States and districts</title>
        <meta charset="utf-8">
             <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
    include('db_connection.php');
?>
<style>
    body{
        background-color: #993399;
    }
</style>

    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Districts and states using AJAX</h1>
            </div>
        <form >
            <select id="state">
                <option value=" ">Select state</option>
                <?php
                    $conn = connect_db();
                    $states = $conn->execute_query("select * from states");
                    while($row = $states->fetch_assoc()){

                    
                ?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php
                    }
                ?>
            </select>
            <select id="district">
                    <option value="">Select district </option>

            </select>
        </form>


        </div>

        <script>
            $(document).on('change','#state',function(){
                var state = $(this).val();
                if (state) {
                    $.ajax({
                        type:'POST',
                        url:'fetch_districts.php',
                        data:{'state_name':state},
                        success:function(result){
                            // console.log("Success");
                            // console.log(result);
                            $('#district').html(result);
                        }
                    });
                }else{
                    $('district').html('<option value=" "> District </option>');
                }
            })
        </script>
    </body>
</html>