<?php 

//Sailence is Golden
if (!isset($_SESSION["user_id"])) {
	header("location: http://localhost/DMS/login.php");
}

?>