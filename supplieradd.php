<?php include("includes/a_config.php");?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");
?>

<?php
	
	
	if(isset($_POST['btn_supplierdadd'])){
		$n1=$_POST['txt_registartion'];
		$n2=$_POST['txt_supp_name'];
		$n3=$_POST['txt_address'];
		$n4=$_POST['txt_tpno'];
		$n5=$_POST['txt_faxno'];
		$n6=$_POST['txt_email'];
		

		
		$sql1="SELECT * FROM supplier_master WHERE supplier_name='$n2' AND registration_no='$n1' AND status=0";
		$result1 = mysqli_query($link,$sql1);
		if(mysqli_num_rows($result1)==0){
			
			$sql2 = "INSERT INTO supplier_master (status,supplierms_key,registration_no,supplier_name,address,tp_no,fax_no,email_address,act_person) VALUES 
												 (0,NULL,'$n1','$n2','$n3','$n4','$n5','$n6','$ses_ukey')";
			if(mysqli_query($link,$sql2)){
				echo "<script>
						alert('Successfully Entered Supplier Information');
					</script>";
			}
			else{
				echo "<script>
						alert('Execute Error');
					</script>";
			}
			
		}
		else{
			echo "<script>
				alert('Already Added this information');
			</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
	
	  <meta charset="utf-8">
	  
	<!-- Script only for datepicker --> 
	  
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<!-- Script only for datepicker -->  
  
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
<form method="POST" name="f1" >
	<div class="form-group">                
        <label class="control-label col-md-4"><font color="red">&lowast;</font>Registration No :</label>
        <input type="text" class="form-control input-sm" name="txt_registartion" required placeholder="Please Enter Supplier Name">
    </div>
	<div class="form-group">                
        <label class="control-label col-md-4"><font color="red">&lowast;</font>Supplier Name :</label>
        <input type="text" class="form-control input-sm" name="txt_supp_name" required placeholder="Please Enter Supplier Name">
    </div>
	<div class="form-group">                
		<label class="control-label col-md-4"><font color="red">&lowast;</font>Address :</label>
		<input type="text" class="form-control input-sm" name="txt_address" required placeholder="Please Enter address">
	</div> 
   
	<div class="form-group">                
		<label class="control-label col-md-4">TP No :</label>
		<input type="text" class="form-control input-sm" name="txt_tpno" placeholder="Please Enter Tp. No">
	</div>								
	<div class="form-group">                
		<label class="control-label col-md-4">Fax No :</label>     
		<input type="text" class="form-control input-sm" name="txt_faxno" placeholder="Please Enter Fax No">
	</div>								
	<div class="form-group">                
		<label class="control-label col-md-4">Email :</label>     
		<input type="text" class="form-control input-sm" name="txt_email" placeholder="Please Enter Email Address">
	</div> 
	
	<button type="submit" class="btn btn-primary" name="btn_supplierdadd">Register</button>
</form>

</div>
<!-- Footer -->

<?php include("includes/footer.php");?>

</body>
</html>