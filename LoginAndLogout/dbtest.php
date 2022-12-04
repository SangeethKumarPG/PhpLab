<?php
function openConnection(){
    // $server = "localhost";
    $server = "localhost";
    $username="root";
    $password="";
    $database = "basics";
    $conn = new mysqli($server,$username,$password,$database);
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}
?>
