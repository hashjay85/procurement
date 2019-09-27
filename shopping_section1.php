<?php
	if(isset($_GET['p']) && isset($_GET['t'])){
		
		if(isset($_POST['btn_proceedsec1'])){
			$a1=$_POST['txt_purchesernme'];
			$a2=$_POST['txt_purcheseraddress'];
			$a3=$_POST['txt_shp5_1'];
			$a4=$_POST['txt_shp8_validdte'];
			$a5=$_POST['txt_shp11_deadlinedte'];
			$a6=$_POST['txt_shp11_1_deadlinetime'];
			$a7=$_POST['txt_shp13_bidopenpls'];
			$a8=$_POST['txt_shp21_amountbid'];
			$a9=$_POST['txt_shp21_bidsecvalid'];
			
			$sql40="SELECT * FROM shopping_details WHERE project_key='$_GET[p]' AND status=0";
			$result40 = mysqli_query($link,$sql40);
			if(mysqli_num_rows($result40)==0){
				$sql41="INSERT INTO shopping_details (status,
												shopping_detail_key,
												project_key,
												purchser_nme_1,
												purchser_address_1,
												shp_5_1,
												validdte_8,
												deadlinedte_11,
												deadlinetime_11,
												bidopenplc_13,
												amountbid_21,
												bidsecvalid_21
												) VALUES
												(0,
												NULL,
												'$_GET[p]',
												'$a1',
												'$a2',
												'$a3',
												'$a4',
												'$a5',
												'$a6',
												'$a7',
												'$a8',
												'$a9'
												)";
				
				if(mysqli_query($link,$sql41)){
					echo "<script>
						alert('Successfully.');
						
					</script>";
				}
				else{
					echo "<script>
						alert('Execute Error2.');
					</script>";
				}
			}
			else{
				
				$sql43="UPDATE shopping_details SET
												purchser_nme_1='$a1',
												purchser_address_1='$a2',
												shp_5_1='$a3',
												validdte_8='$a4',
												deadlinedte_11='$a5',
												deadlinetime_11='$a6',
												bidopenplc_13='$a7',
												amountbid_21='$a8',
												bidsecvalid_21='$a9'
											WHERE project_key='$_GET[p]' AND status=0";	
				if(mysqli_query($link,$sql43)){
					echo "<script>
						alert('Successfully.');
						
					</script>";
				}
				else{
					echo "<script>
						alert('Execute Error.');
					</script>";
				}								
				
			}
		}
	
	}
	
	
	$b1=null;
	$b2=null;
	$b3=null;
	$b4=null;
	$b5=null;
	$b6=null;
	$b7=null;
	$b8=null;
	$b9=null;
	
	
	$sql42="SELECT * FROM shopping_details WHERE project_key='$_GET[p]' AND status=0";
	$result42 = mysqli_query($link,$sql42);
	if(mysqli_num_rows($result42)>0){
		while($row42=mysqli_fetch_array($result42)){	
			$b1=$row42['purchser_nme_1'];
			$b2=$row42['purchser_address_1'];
			$b3=$row42['shp_5_1'];
			$b4=$row42['validdte_8'];
			$b5=$row42['deadlinedte_11'];
			$b6=$row42['deadlinetime_11'];
			$b7=$row42['bidopenplc_13'];
			$b8=$row42['amountbid_21'];
			$b9=$row42['bidsecvalid_21'];
		}
	}

?>

<h3> Section II. Bidding Data Sheet (BDS) </h3>	
<form name="f1" method="post">
		
		<div class="form-group">
		  <label for="comment">1.1 -Purchaser  Name</label>
		 <input type="text" class="form-control input-sm"  name="txt_purchesernme" value="<?php echo $b1; ?>">
		</div> 
		
		<div class="form-group">
		  <label for="comment">1.1 -Purchaser  Address</label>
		  <textarea class="form-control input-sm" rows="5" name="txt_purcheseraddress"><?php echo $b2; ?></textarea>
		</div> 
	
	<hr class="style18">
 
		<div class="form-group">
			<label for="formGroupExampleInput2">5.1 - If the bidder is allowed to quote for less than the all the items specified, indicate the details : </label>
			<input type="text" class="form-control input-sm"  name="txt_shp5_1" value="<?php echo $b3; ?>" >
		</div>
	
	<hr class="style18">
		<div class="form-group">
			<label for="formGroupExampleInput2">8 - The Quotation shall be valid until:  </label>
			<input type="date" class="form-control input-sm tx_dte" name="txt_shp8_validdte" value="<?php echo $b4; ?>">
		</div>
	
	<hr class="style18">
		
		<label for="formGroupExampleInput2">11.1 - The deadline for the submission of bids is :</label>
		<div class="form-group">
			<label for="formGroupExampleInput2">Date  </label>
			<input type="date" class="form-control input-sm tx_dte" name="txt_shp11_deadlinedte" value="<?php echo $b5; ?>">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Time  </label>
			<input type="time" class="form-control input-sm" name="txt_shp11_1_deadlinetime" value="<?php echo $b6; ?>">
		</div>
	
	
	<hr class="style18">
		
		<label for="formGroupExampleInput2">13 - The Bid Opening Shall Take Place At:</label>
  
		<div class="form-group">
		  <label for="formGroupExampleInput2">Address</label>
		  <textarea class="form-control input-sm" rows="5" name="txt_shp13_bidopenpls"><?php echo $b7; ?></textarea>
		</div> 
	
	<hr class="style18">
 
		<div class="form-group">
			<label for="formGroupExampleInput2">21 - The amount of the bid security shall be : </label>
			<input type="text" class="form-control input-sm" name="txt_shp21_amountbid" value="<?php echo $b8; ?>">
		</div>
		
		<div class="form-group">
			<label for="formGroupExampleInput2">The validity period of the bid security shall be until : </label>
			<input type="date" class="form-control input-sm tx_dte" name="txt_shp21_bidsecvalid" value="<?php echo $b9; ?>">
		</div>
		
		
	<hr class="style18">
	<button type="submit" class="btn btn-success" name="btn_proceedsec1">Proceed Section</button>
<br>

</form>
<script type="text_javascript">

</script>