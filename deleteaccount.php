<?php

session_start();
if (!isset($_SESSION['userid']) && empty($_SESSION['userid'])) {
    header('location:index.php');
    exit;
}
include 'dbtest.php';
$uid = $_SESSION['userid'];
$conn = openConnection();
$deleteQuery = "DELETE FROM LoginForm WHERE id = '" . $uid . "'";
if ($conn->query($deleteQuery)) {
    echo "<script>window.alert(\" Account deleted Successfully!!\");</script>";
    unset($_SESSION['lname']);
    unset($_SESSION['fname']);
    unset($_SESSION['userid']);
    session_destroy();
    header('location:index.php');
    exit;
}
