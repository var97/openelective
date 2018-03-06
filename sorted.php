<?php

if(isset($_POST['key1'])) {
	include('dbconfig.php');

	if($stmt=$con->prepare("insert into studentinforanked(RegistrationNo, Department, Semester,OE1,OE2,OE3,OE4,OE5,OE6,CGPA, EntryTime) select RegistrationNo, Department, Semester,OE1,OE2,OE3,OE4,OE5,OE6,CGPA, EntryTime from studentinfo order by CGPA desc, CGPA1 desc, EntryTime ASC")){
			$stmt->execute();
			$stmt->close();
			$con->close();
			echo 'success';
	}
}

?>
