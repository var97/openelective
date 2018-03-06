<?php
include("dbconfig.php");
if(isset($_POST['Sorted']))
{
	$query = "insert into StudentInfoRanked(RegistrationNo, Department, Semester,OE1,OE2,OE3,OE4,OE5,OE6,CGPA, EntryTime) select RegistrationNo, Department, Semester,OE1,OE2,OE3,OE4,OE5,OE6,CGPA, EntryTime from StudentInfo order by CGPA desc, EntryTime ASC";
	$results = mysqli_query($con, $query);
}
?>
<html>
<head>
<title>
Sorted
</title>
</head>
<body>
				<form method="POST">
					<input type="submit" id="sorted" value="Sorted" name = "Sorted"/>
</body>
</html>