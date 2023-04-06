<?php
    function connect_db(){
        $conn = new mysqli("localhost","root","","ajax");
        if ($conn->connect_error){
            die("Connection failed : ".$conn->connect_error);
        }else{
            return $conn;
        }
    }
?>