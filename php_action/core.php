<?php 


require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['idno']) {
	header('index.php');	
} 



?>