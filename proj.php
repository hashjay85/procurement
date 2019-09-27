<?php include("includes/a_config.php");?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");
?>

<?php
	
	
	$sql1="SELECT * FROM user_master WHERE status=0";
	$result1 = mysqli_query($link,$sql1);
	$option1 ="";
	while($row1=mysqli_fetch_array($result1)){	
		$option1 = $option1."<option value='$row1[user_key]'>$row1[first_name] $row1[last_name] - $row1[designation]</option>";	
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
	<?php
	$cr_yer=date("Y");
	$sql7="SELECT MAX(projmas_key)AS maxprojkeyos FROM project_master";
	$result7 = mysqli_query($link,$sql7);
	while($row7=mysqli_fetch_array($result7)){
		$maxprojkeyos=$row7['maxprojkeyos'];
	}
	$nextprojkey=$maxprojkeyos+1;
	$new_code="UCSC|PROC|G|".$cr_yer."|".$nextprojkey;
	
	?>
	<div class="form-group row">  
	  <div class="col-xs-2">
		<label for="ex3">Project Id</label>     
		<input class="form-control input-sm" id="ex3" name="txt_proid" type="text" value="<?php if(isset($_POST['txt_proid'])){echo $_POST['txt_proid'];}else{echo $new_code;} ?>" required>
	  </div>
	</div>

	<div class="form-group row">
		<div class="col-xs-8">
		<label for="ex3">Project Name</label>     
		<input class="form-control" id="ex3" type="text" name="txt_pronme" value="<?php if(isset($_POST['txt_pronme'])){echo $_POST['txt_pronme'];} ?>" required>
	  </div>
	</div>
	
	<div class="form-group">
	  <label for="comment">Project Description</label>
	  <textarea class="form-control" rows="5" id="comment" name="txt_description" required><?php if(isset($_POST['txt_description'])){echo $_POST['txt_description'];} ?></textarea>
	</div>

	<div class="form-group">
		<label for="sel1">Bidding Type</label>
		<select class="form-control input-sm"  name="sele_sel1" required>
			<?php
				if(isset($_POST['sele_sel1'])){
			?>
					<option value="<?php echo $_POST['sele_sel1'];?>"><?php echo $_POST['sele_sel1'];?></option>
					<option value="Shopping">Shopping</option>
					<option value="NCB">NCB</option>
					<option value="ICB">ICB</option>
					<option value="Other">Other</option>
			<?php
				}
				else{
			?>
					<option value="" disabled selected hidden>SELECT ...</option>
					<option value="Direct Purchase">Direct Purchase</option>
					<option value="Shopping">Shopping</option>
					<option value="NCB">NCB</option>
					<option value="ICB">ICB</option>
					<option value="Other">Other</option>
			<?php
				}
			?>
		</select>
	</div>

<!--Date & Time -->

  Expire Date 
  <!--Datepicker
  <input type="date" name="expDate"> -->     
  
  <input type="date" id="datepicker" width="270" name="txt_dte" value="<?php if(isset($_POST['txt_dte'])){echo $_POST['txt_dte']; } ?>" required />
	
	
	<!-- Timepicker -->
	and Time 
	<input type="time" name="txt_expdte" value="<?php if(isset($_POST['txt_expdte'])){echo $_POST['txt_expdte']; } ?>" required> of the Bid:
     
<!-- Time Picker -->
  </br>
  </br>
	<div class="form-group row">
		<div class="col-xs-3">
			<label for="ex3">Value of the Bid Security</label>     
			<input class="form-control" id="ex3" name="txt_value" type="text" value="<?php if(isset($_POST['txt_value'])){echo $_POST['txt_value']; } ?>" required>
		</div>
	</div>
  
<!--Date & Time -->
</br>
	
	<div class="form-group">
	  <label for="comment">Remark</label>
	  <textarea class="form-control" rows="5" name="txt_remark"><?php if(isset($_POST['txt_remark'])){echo $_POST['txt_remark']; } ?></textarea>
	</div>
	
</br>
	<div class="form-group row">
		<div class="col-xs-3">
			   
			<?php
				$p=1;
				for($i=1;$i<=$p;$i++){
					$sele_app="sele_app".$i;
					$options2="option2".$i;
			?>
				<?php
				if($i==1){
				?>
				<label for="ex3">Chairman</label> 
				<?php
				}
				else{
				?>
				<label for="ex3">Appoint Technical Members</label> 
				<?php
				}
				?>
				<select class="form-control input-sm" name="<?php echo $sele_app; ?>"  onchange="this.form.submit()">
					<?php
						if(isset($_POST["sele_app".$i])){
							$sql3="SELECT * FROM user_master WHERE user_key='$_POST[$sele_app]' AND status=0";
							$result3 = mysqli_query($link,$sql3);
							while($row3=mysqli_fetch_array($result3)){
								$rrs=$row3['first_name']." ".$row3['last_name']. "- ".$row3['designation']." ";
							}
							$options2 = $options2."<option value='$_POST[$sele_app]'>$rrs</option>"; 
							echo $options2;
							echo $option1;
							echo "<option value=''></option>";
							$p++;
						}
						else{
							echo "<option value='' disabled selected hidden>Please Choose.............</option>";
							echo $option1;
												
						}											
					?>
				</select>
				<br>
			<?php
				}
			?>
		</div>
	</div>
<button type="submit" class="btn btn-primary" name="btn_submit">Create a Project</button>
</form>

</div>
<!-- Footer -->

<?php include("includes/footer.php");?>

</body>

<?php
	if(isset($_POST['btn_submit'])){
		$nm1=$_POST['txt_proid'];
		$nm2=$_POST['txt_pronme'];
		$nm3=$_POST['txt_description'];
		$nm4=$_POST['sele_sel1'];
		$nm5=$_POST['txt_dte'];
		$nm6=$_POST['txt_expdte'];
		$nm7=$_POST['txt_value'];
		$nm8=$_POST['txt_remark'];

		$sql1="SELECT * FROM project_master WHERE project_id='$nm1' AND status=0";
		$result1 = mysqli_query($link,$sql1);
		if(mysqli_num_rows($result1)==0){
			$sql2="INSERT INTO project_master (status,projmas_key,project_id,project_nme,description,bid_type,expire_dte,exp_time,valueofbid_sec,remark,act_person)
									   VALUES (0,NULL,'$nm1','$nm2','$nm3','$nm4','$nm5','$nm6','$nm7','$nm8','$ses_ukey')";
			if(mysqli_query($link,$sql2)){
				
				$sql4="SELECT * FROM project_master WHERE project_id='$nm1' AND project_nme='$nm2' AND description='$nm3' AND bid_type='$nm4' AND expire_dte='$nm5' AND valueofbid_sec='$nm7' AND status=0";
				$result4 = mysqli_query($link,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					$pro_key=$row4['projmas_key'];
				}
				
				for($a=1;$a<=$p;$a++){
					if($a==1){
						$appointtt="C";
					}
					else{
						$appointtt="A";
					}
					$sele_app1="sele_app".$a;
					if(isset($_POST[$sele_app1])){
						if($_POST[$sele_app1]!=''){
							$sql5="SELECT * FROM appoint_tec_details WHERE project_key='$pro_key' AND user_key='$_POST[$sele_app1]' AND status=0";
							$result5 = mysqli_query($link,$sql5);
							if(mysqli_num_rows($result5)==0){
								$sql6="INSERT INTO appoint_tec_details (status,appointtecdetail_key,project_key,user_key,chairman_appointtec)
																		VALUES (0,NULL,'$pro_key','$_POST[$sele_app1]','$appointtt')";
								mysqli_query($link,$sql6);
							}
						}
					}
				}
				
				echo "<script>
						alert('Successfully Entered Project.');
						window.location.href='proj.php';
					</script>";
			}
			
		}
		
		
	}

?>
</html>

<script type="text/javascript">
$(window).scroll(function() {
  sessionStorage.scrollTop = $(this).scrollTop();
});

$(document).ready(function() {
  if (sessionStorage.scrollTop != "undefined") {
    $(window).scrollTop(sessionStorage.scrollTop);
  }
});

 </script>