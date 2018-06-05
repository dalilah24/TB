<?php
require('fpdf/fpdf.php'); //load fpdf class
include("connection.php"); // connection to database
$icno = $_GET['idno']; // get id number
$sql = mysqli_query($connection, "SELECT * FROM customer WHERE idno='$idno'"); // query for select member by id number
if(mysqli_num_rows($sql) == 0){
header("Location: member_profile.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
$username = $row['username'];
$gender = $row['gender'];
$address = $row['address'];
$item = $row['item'];
$currentDate = date("j/n/Y");
// Create your class instance
$pdf = new FPDF();

?> 