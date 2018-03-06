<?php
include_once "dbconfig.php";
if(!empty($_POST["Semester"])){
$Semester = $_POST["Semester"];
$Department = $_POST["Department"];
$query = "SELECT oename FROM oechoice where Semester = $Semester and not Department = '".$Department."'";
$results = mysqli_query($con, $query);
echo '<option value="">Select Your Choice</option>';
foreach ($results as $oechoice){
?>
<option value="<?php echo $oechoice["oename"]; ?>"><?php echo $oechoice["oename"]; ?></option>
<?php
}
}
?>