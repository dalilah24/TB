<?php
//check if user has login 
if(!isset($_SESSION['idno'])){ 
die( Header("Location: login.php")); 
} 
?> 