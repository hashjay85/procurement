<?php include("includes/a_config.php");?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");
?>
<!DOCTYPE html>

<?php
$cur_dte=date("Y-m-d");
	if(isset($_POST['btn_register'])){
		$n1=$_POST['txt_firstnme'];
		$n2=$_POST['txt_lstnme'];
		$n3=$_POST['txt_empno'];
		$n4=$_POST['txt_designation'];
		$n5=$_POST['txt_unme'];
		$n8=$_POST['sele_department'];
		$n9=$_POST['sele_committee'];
		$n10=$_POST['sele_accesslevel'];
		
		
			$pw=MD5(9900);
			
			$sql2="SELECT * FROM user_master WHERE emp_no='$n3' AND first_name='$n1' AND last_name='$n2' AND status=0";
			$result2 = mysqli_query($link,$sql2);
			if(mysqli_num_rows($result2)==0){
				$sql1="SELECT * FROM user_master WHERE user_name='$n5' AND status=0";
				$result1 = mysqli_query($link,$sql1);
				if(mysqli_num_rows($result1)==0){
					
					$sql3="INSERT INTO user_master (status,user_key,emp_no,first_name,last_name,designation,user_name,password,department,committee,user_level,sys_regdate)
											VALUES (0,NULL,'$n3','$n1','$n2','$n4','$n5','$pw','$n8','$n9','$n10','$cur_dte')";
					if(mysqli_query($link,$sql3)){
						echo "<script>
							alert('Successfully Registration.');
							window.location.href='reg.php';
						</script>";
					}
					else{
						echo "<script>
							alert('Execute Error.');
							
						</script>";
					}
					
				}
				else{
					echo "<script>
							alert('Duplicate User Name');
					</script>";
				}
			}
			else{
				echo "<script>
							alert('Already Added this user');
					</script>";
			}
		
		
	}
?>

<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>




<div class="container" id="main-content">
	<form name="f1" method="post">
		<div class="form-row">
			<div class="col-md-4 mb-3">
			  <label for="validationServer01">First name</label>
			  <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" name="txt_firstnme" required>
			</div>
			<div class="col-md-4 mb-3">
			  <label for="validationServer02">Last name</label>
			  <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" name="txt_lstnme" required>
			</div>
		</div>
		</br>
		
		<div class="form-row">
			<div class="col-md-4 mb-3">
			  <label for="validationServer01">Employee No</label>
			  <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Employee No" name="txt_empno" required>
			</div>
			<div class="col-md-4 mb-3">
			  <label for="validationServer02">Designation</label>
			  <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Designation" name="txt_designation"  required>
			  
			</div>
		</div>
		</br>
		
		<div class="form-row">  
			<div class="col-md-4 mb-3">
			  <label for="validationServerUsername">User Name</label>
			  <div class="input-group">
				<input type="text" class="form-control is-invalid" id="validationServerUsername" placeholder="User Name" name="txt_unme" required>
			  </div>
			</div>
		</div>
		</br>
			
		
		<div class="form-group">
			<label for="sel1">Select a Department</label>
			<select class="form-control input-sm" name="sele_department" required>
				<option value="" disabled selected hidden>SELECT...</option>
				<option value="Procurement">Procurement</option>
				<option value="Finance">Finance</option>
				<option value="Administration">Administration</option>
				<option value="IT">IT</option>
			</select>
		</div>
		</br>

		<div class="form-group">
			<label for="sel1">Select the Committee</label>
			<select class="form-control input-sm" name="sele_committee" required>
				<option value="" disabled selected hidden>SELECT...</option>
				<option value="Procurement Committee">Procurement Committee</option>
				<option value="Technical Evaluation Committee">Technical Evaluation Committee</option>
				<option value="Bid Opening Committee">Bid Opening Committee</option>
				<option value="None">None</option>
			</select>
		</div>
		</br>

		<div class="form-group">
			<label for="sel1">Select Access Level</label>
			<select class="form-control input-sm" name="sele_accesslevel" required>
				<option value="" disabled selected hidden>*SELECT</option>
				<option value="Admin">Admin</option>
				<option value="Authorized">Authorized </option>
				<option value="Data Entry">Data Entry</option>
				<option value="View Only">View Only</option>
			</select>
	  
		</div>
		
		<button class="btn btn-primary" type="submit" name="btn_register">Register Now</button>
	</form>
</div>

<?php include("includes/footer.php");?>

</body>
</html>