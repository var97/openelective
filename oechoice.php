<?php
session_start();
if(!isset($_SESSION['user'])){
	header("Location:index.php");
	exit(0);
}
if(isset($_SESSION['admin'])) {
	session_destroy();
	header("Location:index.php");
	exit(0);
}
include ("dbconfig.php");
if($stmt=$con->prepare("SELECT name, CGPA,CGPA1 FROM users WHERE username=?")){
	if($stmt->bind_param("i", $_SESSION['user'])){
		$stmt->execute();
		$stmt->bind_result($name, $cgpa, $cgpa1);
		$stmt->fetch();
		$stmt->close();
		$con->close();
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>OE Choice Form</title>
		<meta charset="utf-8">
		<meta name="robots" content="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700" rel="stylesheet">
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script>
            $(function() {
                $("select.xx").change(function() {
                    $("select.xx option").show();

                    $("select.xx").each(function() {
                        if (!$(this).val() == "") {
                            $("select.xx").not($(this)).find("option").filter("[value='" + $(this).val() + "']").hide();
                        }
                    });
                });
            });
        </script>
		<link href="css/style.css" rel="stylesheet">
		<style>
			.form-control {
				border-width: 2px;
				transition: border .3s linear; 
			    -moz-transition: border .3s linear; 
			    -o-transition: border .3s linear; 
			    -webkit-transition: border .3s linear;
			    width: 200px !important; 
			}
			.form-control:focus {
				box-shadow: none;
				border: 2px solid #d67323;							    			
			}
			.input-group {
				padding: 10px;
			}
			.sheet-title {
				padding-bottom: 5px;
				letter-spacing: 2px;
			}	
			.info {
				padding-left: 10px;
                margin-top: 5px;
                display: inline-block;
			}
			a{
				color: rgba(0,0,0,0.5);
				-moz-transition: color 1s linear; 
			    -o-transition: color 1s linear; 
			    -webkit-transition: color 1s linear;		    
			}
			a:hover, a:focus {
				color: #000000;
				-moz-transition: color .5s linear; 
			    -o-transition: color .5s linear; 
			    -webkit-transition: color .5s linear;
			}
            input[type="submit"] {                
                font-size: 2em;                
                height: 50px;                
                box-shadow: 0 0 7px rgba(0,0,0,0.5);
            }	
            .modal-content {
            	border-radius: 0px;
            }
            th, td {
            	padding: 15px !important;
            }           	
		</style>
	</head>
<body>
	<div class="color-band"></div>

	<div class="outer-container">
		<h4 class="pull-right" style="font-weight:700;padding: 5px;letter-spacing: 1px;"><a href="logout.php">Logout</a></h4>
		<div class="container form-outer-container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color-stripe"></div>
			<div class="container form-inner-container">
				<h1 class="sheet-title">OE Choice Form</h1>				
				<br>
				<div class="row">
					<form id="oeForm" name="oeForm" autocomplete="off">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="RegNo">Registration No.</label><br>
									<input type="tel" id="RegNo" name="RegNo" class="form-control" placeholder="Enter Registration No." value=<?php echo $_SESSION['user']; ?> required disabled />
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="name">Name</label><br>
									<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" <?php echo 'value="'.$name.'"'; ?> required disabled />	
								</div>								
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="input-group">
										<label for="cgpa1">1<sup>st</sup> Year CGPA</label><br>
										<input type="text" name="cgpa1" id="cgpa1" class="form-control" placeholder="Your 1st Year CGPA" <?php echo 'value="'.$cgpa1.'"'; ?> required disabled />	
									</div>								
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">								
								<div class="input-group">
									<label for="cgpa">Previous Semester CGPA</label><br>
									<input type="tel" id="cgpa" name="cgpa" class="form-control" placeholder="Enter CGPA" value=<?php echo $cgpa; ?> required disabled/>
								</div>								
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="branch">Department</label><br>
									<select class="form-control" name="Branch" id="Branch" onclick="getId1();" required>
										<option value="">Select Your Branch</option>								
										<?php
											include ("dbconfig.php");
											$query = "SELECT * FROM departments"; echo 2;
											$results = mysqli_query($con, $query); echo 3;
											foreach ($results as $Department) {
										?>
										<option value="<?php echo $Department["DepName"];?>">
											<?php echo $Department["DepName"];?>
										</option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
								<div class="input-group">
									<label for="Semester">Semester</label><br>
									<select class="form-control" name="Semester" id="Semester" onclick="getId(this.value, a);" required>
										<option value="">Select Your Semester</option>
										<?php
											$query = "SELECT * FROM semester";
											$results = mysqli_query($con, $query);
											foreach ($results as $semester) {
										?>
										<option value="<?php echo $semester["Semester"];?>"><?php echo $semester["Semester"];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>							
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="lb1">Enter Your 1<sup>st</sup> OE</label><br>
									<select id="lb1" name="lb1" onchange="showMe1(this.value);" class="form-control xx" required>
										<option value="">Select Your Choice</option>
										
									</select>
									<p class="info" id="info1"></p>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="lb2">Enter Your 2<sup>nd</sup> OE</label><br>
									<select id="lb2" name="listBoxEmail" onchange="showMe2(this.value);" class="form-control xx" required>
										<option value="">Select Your Choice</option>
										
										<option value="oe1">OE1</option>
										<option value="oe2">OE2</option>
									 	<option value="oe3">OE3</option>
									 	<option value="oe4">OE4</option>
									 	<option value="oe5">OE5</option>
									 	<option value="oe6">OE6</option>
									 	<option value="oe7">OE7</option>
									 	<option value="oe8">OE8</option>
									 	<option value="oe9">OE9</option>
									 	<option value="oe10">OE10</option>
									</select>
									<p class="info" id="info2"></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="lb3">Enter Your 3<sup>rd</sup> OE</label><br>
									<select id="lb3" name="listBoxEmail" onchange="showMe3(this.value);" class="form-control xx" required>
										<option value="">Select Your Choice</option>
										<option value="oe1">OE1</option>
										<option value="oe2">OE2</option>
									 	<option value="oe3">OE3</option>
									 	<option value="oe4">OE4</option>
									 	<option value="oe5">OE5</option>
									 	<option value="oe6">OE6</option>
									 	<option value="oe7">OE7</option>
									 	<option value="oe8">OE8</option>
									 	<option value="oe9">OE9</option>
									 	<option value="oe10">OE10</option>
									</select>
									<p class="info" id="info3"></p>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="lb4">Enter Your 4<sup>th</sup> OE</label><br>
									<select id="lb4" name="listBoxEmail" onchange="showMe4(this.value);" class="form-control xx" required>
										<option value="">Select Your Choice</option>
										<option value="oe1">OE1</option>
										<option value="oe2">OE2</option>
									 	<option value="oe3">OE3</option>
									 	<option value="oe4">OE4</option>
									 	<option value="oe5">OE5</option>
									 	<option value="oe6">OE6</option>
									 	<option value="oe7">OE7</option>
									 	<option value="oe8">OE8</option>
									 	<option value="oe9">OE9</option>
									 	<option value="oe10">OE10</option>
									</select>
									<p class="info" id="info4"></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="lb5">Enter Your 5<sup>th</sup> OE</label><br>
									<select id="lb5" name="listBoxEmail" onchange="showMe5(this.value);" class="form-control xx" required>
										<option value="">Select Your Choice</option>
										<option value="oe1">OE1</option>
										<option value="oe2">OE2</option>
									 	<option value="oe3">OE3</option>
									 	<option value="oe4">OE4</option>
									 	<option value="oe5">OE5</option>
									 	<option value="oe6">OE6</option>
									 	<option value="oe7">OE7</option>
									 	<option value="oe8">OE8</option>
									 	<option value="oe9">OE9</option>
									 	<option value="oe10">OE10</option>
									</select>
									<p class="info" id="info5"></p>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="input-group">
									<label for="lb6">Enter Your 6<sup>th</sup> OE</label><br>
									<select id="lb6" name="listBoxEmail" onchange="showMe6(this.value);" class="form-control xx" required>
										<option value="">Select Your Choice</option>
										<option value="oe1">OE1</option>
										<option value="oe2">OE2</option>
									 	<option value="oe3">OE3</option>
									 	<option value="oe4">OE4</option>
									 	<option value="oe5">OE5</option>
									 	<option value="oe6">OE6</option>
									 	<option value="oe7">OE7</option>
									 	<option value="oe8">OE8</option>
									 	<option value="oe9">OE9</option>
									 	<option value="oe10">OE10</option>
									</select>
									<p class="info" id="info6"></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="input-group">
									<input type="submit" id="submit" value="Submit" data-toggle="modal" class="form-control" />						
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>

	<!-- Modal -->
<div class="modal fade" id="lastCheck" role="dialog">
	<div class="modal-dialog">    	        
      		<div class="modal-content">
		        <div class="modal-header text-center" style="padding-top: 25px;padding-bottom: 25px;">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h3 class="modal-title">Verify Your Data &amp; Proceed</h3>
		        </div>
        		<div class="modal-body" style="padding: 0px;">
          			<table class="table table-striped">
			          	<tbody>
			          		<tr>
			          			<th>Registration No.</th>
			          			<td id="modal-RegNo"></td>
			          		</tr>
			          		<tr>
			          			<th>Branch</th>
			          			<td id="modal-Branch"></td>
			          		</tr>
			          		<tr>
			          			<th>Semester</th>
			          			<td id="modal-Semester"></td>
			          		</tr>
			          		<tr>
			          			<th>Previous Semester CGPA</th>
			          			<td id="modal-cgpa"></td>
			          		</tr>
			          		<tr>
			          			<th>1<sup>st</sup> Year CGPA</th>
			          			<td id="modal-cgpa1"></td>
			          		</tr>
			          		<tr>
			          			<th>1<sup>st</sup> OE</th>
			          			<td id="modal-lb1"></td>
			          		</tr>
			          		<tr>
			          			<th>2<sup>nd</sup> OE</th>
			          			<td id="modal-lb2"></td>
			          		</tr>
			          		<tr>
			          			<th>3<sup>rd</sup> OE</th>
			          			<td id="modal-lb3"></td>
			          		</tr>
			          		<tr>
			          			<th>4<sup>th</sup> OE</th>
			          			<td id="modal-lb4"></td>
			          		</tr>          		
			          		<tr>
			          			<th>5<sup>th</sup> OE</th>
			          			<td id="modal-lb5"></td>
			          		</tr>
			          		<tr>
			          			<th>6<sup>th</sup> OE</th>
			          			<td id="modal-lb6"></td>
			          		</tr>	
			          	</tbody>
          			</table>
        		</div>
		        <div class="modal-footer">
		          <span data-dismiss="modal" style="cursor: pointer;font-size: 20px;">Cancel</span>
		          &nbsp; &nbsp; &nbsp;
		          <span id="proceed" style="color: #d67323;cursor: pointer;font-size: 20px;">Proceed</span>
		        </div>
      		</div>     	   
    </div>
</div>
<script>
	$(document).on("submit", "#oeForm", function(event){
		event.preventDefault();		
		if($('form#oeForm > :input[required]:visible').val() != ""){			
			$("#lastCheck").modal();			
			$('#modal-RegNo').html($('#RegNo').val());
			$('#modal-Branch').html($('#Branch').val());
			$('#modal-Semester').html($('#Semester').val());
			$('#modal-cgpa').html($('#cgpa').val());
			$('#modal-cgpa1').html($('#cgpa1').val());
			$('#modal-lb1').html($('#lb1').val());
			$('#modal-lb2').html($('#lb2').val());
			$('#modal-lb3').html($('#lb3').val());
			$('#modal-lb4').html($('#lb4').val());
			$('#modal-lb5').html($('#lb5').val());
			$('#modal-lb6').html($('#lb6').val());
			console.log(1);
			$(document).on("click", "#proceed", function(event){console.log(2);
				$("#lastCheck").modal("hide");

				var RegNo=$("#RegNo").val();
				var Department=$("#Branch").val();
				var Semester=$("#Semester").val();
				var cgpa=$("#cgpa").val();
				var cgpa1=$("#cgpa1").val();
				var lb1=$("#lb1").val();
				var lb2=$("#lb2").val();
				var lb3=$("#lb3").val();
				var lb4=$("#lb4").val();
				var lb5=$("#lb5").val();
				var lb6=$("#lb6").val();

				var formData={RegNo:RegNo, Branch:Department, Semester:Semester, cgpa:cgpa, cgpa1:cgpa1, lb1:lb1, lb2:lb2, lb3:lb3, lb4:lb4, lb5:lb5, lb6:lb6 };

				$.ajax({
					method: "POST",
					url: "stdreg.php",
					data: formData
				}).done(function(msg){
					alert(msg);
				});
			});
		}		
	});
</script>


<script>
function getId1(){
	a = document.getElementById("Branch").value;
	if(flag==1){
		getId(document.getElementById("Semester").value, a);
	}
}
function getId(val, val1){
	flag=1;
	$.ajax({
	type: "POST",
url: "getdata1.php",
data: 'Department='+val1+'&Semester='+val,
success: function(data){
	$("#lb2").html(data);
	$("#lb1").html(data);
	$("#lb3").html(data);
	$("#lb4").html(data);
	$("#lb5").html(data);
	$("#lb6").html(data);
}	
	});
}
</script>

<script language="javascript">
	function showMe1(str)
	{
	 document.getElementById('info1').innerHTML = ' You have selected : '+str;
	 
	}
	function showMe2(str)
	{
	 document.getElementById('info2').innerHTML = ' You have selected : '+str;
	}
	function showMe3(str)
	{
	 document.getElementById('info3').innerHTML = ' You have selected : '+str;
	}
	function showMe4(str)
	{
	 document.getElementById('info4').innerHTML = ' You have selected : '+str;
	}
	function showMe5(str)
	{
	 document.getElementById('info5').innerHTML = ' You have selected : '+str;
	}
	function showMe6(str)
	{
	 document.getElementById('info6').innerHTML = ' You have selected : '+str;
	}
</script>
</body>
</html>