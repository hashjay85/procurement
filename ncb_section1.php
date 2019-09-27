<?php
	if(isset($_GET['p']) && isset($_GET['t'])){
		
		
		
		if(isset($_POST['btn_proceedsec1'])){
			$n39=$_POST['txt_protitel'];
			$n40=$_POST['txt_nme'];
			$n41=$_POST['txt_fundingsource'];
			$n42=$_POST['radio_allowforign'];
			$n43=$_POST['txt_itb4_1'];
			$n44=$_POST['txt_itb4_2'];
			$n45=$_POST['txt_itb4_3'];
			$n46=$_POST['txt_itb4_4'];
			$n47=$_POST['txt_itb4_5'];
			$n48=$_POST['txt_nooflots'];
			$n49=$_POST['txt_itb11_1'];
			$n50=$_POST['txt_itb14_3'];
			$n51=$_POST['txt_itb15_1'];
			$n52=$_POST['txt_itb17_3'];
			$n53=$_POST['radio_requiredsale'];
			$n54=$_POST['txt_itb19_1'];
			$n55=$_POST['txt_itb20_2'];
			$n56=$_POST['txt_itb20_3'];
			$n57=$_POST['txt_itb22_2'];
			$n58=$_POST['txt_itb23_1'];
			$n59=$_POST['txt_itb23_2'];
			$n60=$_POST['txt_itb26_1'];
			$n61=$_POST['txt_itb26_2'];
			
			$n63=$_POST['txt_itb35_4'];
			$n64=$_POST['txt_itb35_1'];
			$n65=$_POST['txt_tenderno'];
			
			if(!empty($_POST['check_list'])) {
				$n62="Immediately after the bid closing time";
			}
			else{
				$n62=$_POST['txt_itb26_3'];
			}
			
			
			
			$sql40="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
			$result40 = mysqli_query($link,$sql40);
			if(mysqli_num_rows($result40)==0){
				$sql41="INSERT INTO ncb_details (status,
												ncb_detail_key,
												project_key,
												no_of_lots,
												procument_title,
												sec2_itb1_1,
												sec2_itb1_1_tenderno,
												sec2_itb2_1,
												sec2_itb4_4, 
												sec2_itb7_1_attention,
												sec2_itb7_1_address,
												sec2_itb7_1_telephone,
												sec2_itb7_1_facimaileno,
												sec2_itb7_1_Eelectornicmail,
												sec2_itb11_1e,
												sec2_itb14_3,
												sec2_itb15_1,
												sec2_itb17_3,
												sec2_itb18_1b,
												sec2_itb19_1,
												sec2_itb20_2,
												sec2_itb20_2_date,
												sec2_itb22_2c,
												sec2_itb23_1_date,
												sec2_itb23_1_time,
												sec2_itb26_1_address, 
												sec2_itb26_1_date,
												sec2_itb26_1_time,
												sec2_itb35_4,
												sec2_itb35_5 
												) VALUES
												(0,
												NULL,
												'$_GET[p]',
												1,
												'$n39',
												'$n40',
												'$n65',
												'$n41',
												'$n42',
												'$n43',
												'$n44',
												'$n45',
												'$n46',
												'$n47',
												'$n49',
												'$n50',
												'$n51',
												'$n52',
												'$n53',
												'$n54',
												'$n55',
												'$n56',
												'$n57',
												'$n58',
												'$n59',
												'$n60',
												'$n61',
												'$n62',
												'$n63',
												'$n64'
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
				
				$sql43="UPDATE ncb_details SET
												procument_title='$n39',
												sec2_itb1_1='$n40',
												sec2_itb1_1_tenderno='$n65',
												sec2_itb2_1='$n41',
												sec2_itb4_4='$n42',
												sec2_itb7_1_attention='$n43',
												sec2_itb7_1_address='$n44',
												sec2_itb7_1_telephone='$n45',
												sec2_itb7_1_facimaileno='$n46',
												sec2_itb7_1_Eelectornicmail='$n47',
												no_of_lots=1,
												sec2_itb11_1e='$n49',
												sec2_itb14_3='$n50',
												sec2_itb15_1='$n51',
												sec2_itb17_3='$n52',
												sec2_itb18_1b='$n53',
												sec2_itb19_1='$n54',
												sec2_itb20_2='$n55',
												sec2_itb20_2_date='$n56',
												sec2_itb22_2c='$n57',
												sec2_itb23_1_date='$n58',
												sec2_itb23_1_time='$n59',
												sec2_itb26_1_address='$n60',
												sec2_itb26_1_date='$n61',
												sec2_itb26_1_time='$n62',
												sec2_itb35_4='$n63',
												sec2_itb35_5='$n64'
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
	
	
	$a40=null;
	$a41=null;
	$a42=null;
	$a43=null;
	$a44=null;
	$a45=null;
	$a46=null;
	$a47=null;
	$a48=null;
	$a49=null;
	$a50=null;
	$a51=null;
	$a52=null;
	$a53=null;
	$a54=null;
	$a55=null;
	$a56=null;
	$a57=null;
	$a58=null;
	$a59=null;
	$a60=null;
	$a61=null;
	$a62=null;
	$a63=null;
	$a64=null;
	$a65=null;
	$a66=null;
	
	$sql42="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
	$result42 = mysqli_query($link,$sql42);
	if(mysqli_num_rows($result42)>0){
		while($row42=mysqli_fetch_array($result42)){	
			$a40=$row42['sec2_itb1_1'];
			$a41=$row42['sec2_itb1_1_tenderno'];
			$a42=$row42['sec2_itb2_1'];
			$a43=$row42['sec2_itb4_4'];
			$a44=$row42['sec2_itb7_1_attention'];
			$a45=$row42['sec2_itb7_1_address'];
			$a46=$row42['sec2_itb7_1_telephone'];
			$a47=$row42['sec2_itb7_1_facimaileno'];
			$a48=$row42['sec2_itb7_1_Eelectornicmail'];
			$a49=$row42['no_of_lots'];
			$a50=$row42['sec2_itb11_1e'];
			$a51=$row42['sec2_itb14_3'];
			$a52=$row42['sec2_itb15_1'];
			$a53=$row42['sec2_itb17_3'];
			$a54=$row42['sec2_itb18_1b'];
			$a55=$row42['sec2_itb19_1'];
			$a56=$row42['sec2_itb20_2'];
			$a57=$row42['sec2_itb20_2_date'];
			$a58=$row42['sec2_itb22_2c'];
			$a59=$row42['sec2_itb23_1_date'];
			$a60=$row42['sec2_itb23_1_time'];
			$a61=$row42['sec2_itb26_1_address'];
			$a62=$row42['sec2_itb26_1_date'];
			$a63=$row42['sec2_itb26_1_time'];
			$a64=$row42['sec2_itb35_4'];
			$a65=$row42['sec2_itb35_5'];
			$a66=$row42['procument_title'];
		}
	}

?>

<h3> Section II. Bidding Data Sheet (BDS) </h3>	
<form name="f1" method="post">
		<div class="form-group">
		  <label for="comment">Procurement Title</label>
		  <textarea class="form-control input-sm" rows="3" name="txt_protitel" required><?php echo $a66; ?></textarea>
		</div> 
		<div class="form-group">
		  <label for="comment">ITB 1.1 - The name and identification number of the Contract are:</label>
		  <textarea class="form-control input-sm" rows="5" name="txt_nme"><?php echo $a40; ?></textarea>
		</div> 
		
		<div class="form-group">
		  <label for="comment">Tender No</label>
		 <input type="text" class="form-control input-sm"  name="txt_tenderno" value="<?php echo $a41; ?>">
		</div> 

	<hr class="style18">
 
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB 2.1 - The source of funding is : </label>
			<input type="text" class="form-control input-sm"  name="txt_fundingsource" value="<?php echo $a42; ?>" >
		</div>

	<hr class="style18">
	
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB 4.4 - Allow for Foreign bidders ?</label>
			
			<div class="form-check">
				
				<input class="form-check-input" type="radio" name="radio_allowforign"  value="Allowed" <?php echo ($a43== 'Allowed') ?  "checked" : "" ;  ?>>...  Yes
				
			</div>
			<div class="form-check">
				 <input class="form-check-input" type="radio" name="radio_allowforign" value="Not Allowed" <?php echo ($a43== 'Not Allowed') ?  "checked" : "" ;  ?>> ...  No
				
			</div>
		</div>
	
	<hr class="style18">
	
		<label for="formGroupExampleInput2">ITB 7.1 - Purchaser’s address is ?</label>
		<div class="form-group">
			<label for="formGroupExampleInput2">Attention </label>
			<input type="text" class="form-control input-sm" name="txt_itb4_1" value="<?php echo $a44; ?>">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Address </label>
			<textarea class="form-control input-sm" name="txt_itb4_2" ><?php echo $a45; ?></textarea>
		</div>
	    <div class="form-group">
			<label for="formGroupExampleInput2">Telephone </label>
			<input type="text" class="form-control input-sm"  name="txt_itb4_3" value="<?php echo $a46; ?>">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Facsimile Number </label>
			<input type="text" class="form-control input-sm"  name="txt_itb4_4" value="<?php echo $a47; ?>">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Electronic mail Address  </label>
			<input type="text" class="form-control input-sm"  name="txt_itb4_5" value="<?php echo $a48; ?>">
		</div>
		
	<hr class="style18">
		<div class="form-group">
			<label for="formGroupExampleInput2"> The Bidders shall submit the additional documents: </label>
			<input type="text" class="form-control input-sm" name="txt_itb11_1" value="<?php echo $a50; ?>">
		</div>
		
	<hr class="style18">
	
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB14.3  </label>
			<input type="text" class="form-control input-sm" name="txt_itb14_3" value="<?php echo $a51; ?>">
		</div>
	
	<hr class="style18">
  
		<div class="form-group">
			<label for="formGroupExampleInput2">IT 15.1 - local expenditure of the following items </label>
			<input type="text" class="form-control input-sm" name="txt_itb15_1" value="<?php echo $a52; ?>">
		</div>
	
	<hr class="style18">
	
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB17.3 - Period of time the Goods are expected to be functioning (for the purpose of spare parts):  </label>
			<input type="text" class="form-control input-sm" name="txt_itb17_3" value="<?php echo $a53; ?>">
		</div>
	
	<hr class="style18">
  
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB 18.1 (b) - Required After sales ?</label>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="radio_requiredsale"  value="Required" <?php echo ($a54== 'Required') ?  "checked" : "" ;  ?>>...  Required
			</div>
			<div class="form-check">
				 <input class="form-check-input" type="radio" name="radio_requiredsale" value="Not Required" <?php echo ($a54== 'Not Required') ?  "checked" : "" ;  ?>> ...  Not Required
			</div>
		</div>
		
	<hr class="style18">
		
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB 19.1 - The bid shall be valid until: </label>
			<input type="date" class="form-control input-sm tx_dte" name="txt_itb19_1" value="<?php echo $a55; ?>">
		</div>
	
	<hr class="style18">
 
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB 20.2 - The amount of the bid security shall be : </label>
			<input type="text" class="form-control input-sm" name="txt_itb20_2" value="<?php echo $a56; ?>">
		</div>
		
		<div class="form-group">
			<label for="formGroupExampleInput2">The validity period of the bid security shall be until : </label>
			<input type="date" class="form-control input-sm tx_dte" name="txt_itb20_3" value="<?php echo $a57; ?>">
		</div>
	
	<hr class="style18">
  
		<div class="form-group">
			<label for="formGroupExampleInput2">ITB 22.2 (c) - The inner and outer envelopes shall bear the following identification marks:  </label>
			<input type="text" class="form-control input-sm" name="txt_itb22_2" value="<?php echo $a58; ?>">
		</div>
  
	<hr class="style18">
		<label for="formGroupExampleInput2">ITB 23.1 - The deadline for the submission of bids is :</label>
		<div class="form-group">
			<label for="formGroupExampleInput2">Date  </label>
			<input type="date" class="form-control input-sm tx_dte" name="txt_itb23_1" value="<?php echo $a59; ?>">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Time  </label>
			<input type="time" class="form-control input-sm" name="txt_itb23_2" value="<?php echo $a60; ?>">
		</div>
	
	<hr class="style18">
		
		<label for="formGroupExampleInput2">ITB 26.1 - The Bid Opening Shall Take Place At:</label>
  
		<div class="form-group">
		  <label for="formGroupExampleInput2">Address</label>
		  <textarea class="form-control input-sm" rows="5" name="txt_itb26_1"><?php echo $a61; ?></textarea>
		</div> 
		
		<div class="form-group">
			<label for="formGroupExampleInput2">Date  </label>
			<input type="date" class="form-control input-sm tx_dte" name="txt_itb26_2" value="<?php echo $a62; ?>">
		</div>
		<div class="form-group">
			<input type="checkbox" name="check_list[]" value="1"> <label>Immediately after the bid closing time.</label>
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2">Time  </label>
			<input type="text" class="form-control" id="formGroupExampleInput2" name="txt_itb26_3">
		</div>
		
	
	<hr class="style18">
	  
	  <div class="form-group">
		<label for="formGroupExampleInput">ITB 35.4 factors and methodology will be used for evaluation</label>
		<input type="text" class="form-control input-sm" name="txt_itb35_4" value="<?php echo $a64; ?>">
	  </div>

	<hr class="style18">
		
		<div class="form-group">
		  <label for="formGroupExampleInput">ITB 35.5 - Bidders are allowed to </label>
		  <textarea class="form-control input-sm" rows="5" name="txt_itb35_1"><?php echo $a65; ?></textarea>
		</div> 

	<button type="submit" class="btn btn-success" name="btn_proceedsec1">Proceed Section II</button>
  <br>
<hr class="style18">
<br>


 
 
</form>
<script type="text_javascript">

</script>