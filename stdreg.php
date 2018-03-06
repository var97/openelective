<?php

$RegNo = $_POST['RegNo'];
$Branch = $_POST['Branch'];
$Semester = $_POST['Semester'];
$lb1 = $_POST['lb1'];
$lb2 = $_POST['lb2'];
$lb3 = $_POST['lb3'];
$lb4 = $_POST['lb4'];
$lb5 = $_POST['lb5'];
$lb6 = $_POST['lb6'];
$cgpa = $_POST['cgpa'];
$cgpa1 = $_POST['cgpa1'];	

include_once "dbconfig.php";
if($stmt=$con->prepare("INSERT INTO studentinfo(RegistrationNo, Department, Semester, OE1, OE2, OE3, OE4, OE5, OE6, CGPA, CGPA1) VALUES (?,?,?,?,?,?,?,?,?,?,?)")){
	if($stmt->bind_param("isissssssdd", $RegNo, $Branch, $Semester, $lb1, $lb2, $lb3, $lb4, $lb5, $lb6, $cgpa, $cgpa1)){
		$stmt->execute();
		echo "Thank you";		
	}
}

?>