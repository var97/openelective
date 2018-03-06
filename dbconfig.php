<?php 
	$user="root";
	$password="root";
	$db="oe";
	$con=@mysqli_connect('localhost', $user, $password, $db);	
	if(!$con){
		die('Sorry! Try again later.');
	}
?>