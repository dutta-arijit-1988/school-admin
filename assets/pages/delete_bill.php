<?php

include("config.php");
 session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM bill WHERE id=$id");
 
//redirecting to the display page (index.php in our case)
header("Location:view_bill.php");
?>