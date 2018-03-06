<?php

include_once "dbconfig.php";
if(!empty($_POST["Semester"]){
$RegNo = $_POST['RegNo'];
$cgpa = $_POST['cgpa'];
$query = "SELECT CGPA from users where username = $RegNo";
$results = mysqli_query($con, $query);
foreach ($results as $users){
?>
<input value="<?php echo $users["cgpa"]; ?>"><?php echo $users["cgpa"]; ?></input>
<?php
}
}
?>