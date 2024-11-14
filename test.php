
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"]=="GET"){

	#The below snippet verifies if the session is present in the DB	

	session_start();

	include("db.php");

	$session=session_id();

	GET_VALUES($_COOKIE['user'],$session);
	
	#include("funcitons/logout_function.php");
	#include("functions/hello_world.php");

	}
 ?>
