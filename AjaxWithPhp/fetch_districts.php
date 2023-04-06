<?php
    include('db_connection.php');
    $conn = connect_db();
    if($_POST['state_name']){
        $state = $_POST['state_name'];
        $districts = $conn->execute_query("select * from districts where state = '".$state."'");
        while($row = $districts->fetch_assoc()){
            echo "<option value= '".$row['district']."'>".$row['district']."</option>";
        }
    }

?>