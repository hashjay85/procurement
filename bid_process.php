<?php 
include("includes/a_config.php");
error_reporting(0);
?>

<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");

?>

<?php
	
	
	
	if(isset($_POST['btn_proceed'])){
		$a1=$_POST['sele_sell'];
		
		$sql2="SELECT * FROM project_master WHERE projmas_key='$a1'";
		$result2 = mysqli_query($link,$sql2);
		while($row2=mysqli_fetch_array($result2)){
			 	$a2=$row2['bid_type'];
		}			
			if($a2=='NCB'){
				echo "<script>
						alert('Bid Process Started');
						window.location.href='bid_process.php?p=$a1&t=$a2';
					</script>";
			}
			if($a2=='Shopping'){
				echo "<script>
						alert('Bid Process Started');
						window.location.href='shp_bid_process.php?p=$a1&t=$a2';
					</script>";
			}
	}
		
	if(isset($_GET['p']) && isset($_GET['t'])){
		
		$sql3="SELECT * FROM project_master WHERE projmas_key='$_GET[p]'";
		$result3 = mysqli_query($link,$sql3);
		while($row3=mysqli_fetch_array($result3)){	
			$p_id=$row3['project_id'];
			$p_nme=$row3['project_nme'];
			
		}
	

	
		if($_GET['t']=='NCB'){
					$sql7="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
					$result7 = mysqli_query($link,$sql7);
					if(mysqli_num_rows($result7)>0){
						while($row7=mysqli_fetch_array($result7)){	
							$c40=$row7['no_of_lots'];
							$c54=$row7['sec4_dte'];
							$c55=$row7['sec4_no'];
							
							$c87=$row7['sec5_manufacturedte'];
							$c88=$row7['sec5_manufactureprocess'];
							$c89=$row7['sec5_nameofmanufactor'];
							$c90=$row7['sec5_typeofmanufactor'];
							$c91=$row7['sec5_fulladdressmanufactor'];
							$c92=$row7['sec5_completenmeofbidder'];
							$c93=$row7['sec5_title'];
							$c94=$row7['sec5_dteofsign'];
							$c95=$row7['sec5_nameofauthperson'];
							$c96=$row7['sec5_discreptionofgood'];
						}
					}
				
				if(isset($_POST['sele_supplier'])){
					echo "<script>
									window.location.href='bid_process.php?p=$_GET[p]&t=$_GET[t]&s=$_POST[sele_supplier]';
						</script>";
				}

				
				for($i4=1;$i4<=1;$i4++){	
					$sql9="SELECT * FROM ncbsec45_initial_item_details WHERE project_key='$_GET[p]' AND lot_no='$i4' AND status=0";
					$result9 = mysqli_query($link,$sql9);
					while($row9=mysqli_fetch_array($result9)){
							
							$btn_add1="btn_45priceadd".$row9['ncbsec45_ini_item_key'];
							
							if(isset($_POST[$btn_add1])){
								$s1="txt_item".$row9['ncbsec45_ini_item_key'];
								$s2="txt_withoutvatunitprice".$row9['ncbsec45_ini_item_key'];
								$s3="txt_withvatunitprice".$row9['ncbsec45_ini_item_key'];
								$s4="txt_totwithvat".$row9['ncbsec45_ini_item_key'];
								$s5="txt_totwithoutvat".$row9['ncbsec45_ini_item_key'];
								
								$sql12="SELECT * FROM ncbsec45_item_bid_details WHERE project_key='$_GET[p]' AND supplier_key='$_GET[s]' AND item_key='$_POST[$s1]' AND status=0";
								$result12 = mysqli_query($link,$sql12);
								if(mysqli_num_rows($result12)==0){
									
									$sql10="INSERT INTO ncbsec45_item_bid_details (status,
																	   ncbsec45_itembid_key,
																	   project_key,
																	   lot_no,
																	   supplier_key,
																	   item_key,
																	   qty,
																	   unit_price_withoutvat,
																	   unit_price_withvat,
																	   total_price_withvat,
																	   total_price_withoutvat,
																	   act_person)
															   VALUES (0,
																	   NULL,
																	   '$_GET[p]',
																	   '$row9[lot_no]',
																	   '$_GET[s]',
																	   '$_POST[$s1]',
																	   '$row9[qty]',
																	   '$_POST[$s2]',
																	   '$_POST[$s3]',
																	   '$_POST[$s4]',
																	   '$_POST[$s5]',
																	   '$ses_ukey')";
									if(mysqli_query($link,$sql10)){
										echo "<script>
											alert('Successfully Entered Data');
								
										</script>";
									}
								}
								else{
									$sql13="UPDATE ncbsec45_item_bid_details SET  unit_price_withoutvat='$_POST[$s2]',
																				  unit_price_withvat='$_POST[$s3]',
																				  total_price_withvat='$_POST[$s4]',
																				  total_price_withoutvat='$_POST[$s5]'
																			WHERE project_key='$_GET[p]' AND supplier_key='$_GET[s]' AND item_key='$_POST[$s1]'";
									if(mysqli_query($link,$sql13)){
										echo "<script>
											alert('Successfully Entered Data');
								
										</script>";
									}
								}
								
							}
					}
				}
				
				
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
	
	  <meta charset="utf-8">

		<script type="text/javascript" src="js/jquery3.3.1.js"></script>
	
  
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">

	<h2> Will create the BOQ here </h2>
	<p> TextBoxes will create when we click on the "Create TextBoxes" Button </p>
	<form name="f1" method="post" >
		<div class="form-group">
		  <label for="sel1">Select the Project ID</label>
			<select class="form-control input-sm" id="sel1" name="sele_sell">
					<?php
						if(isset($_GET['p'])){
					?>
						<option value="<?php echo $_GET['p'];?>"><?php echo $p_id." - ".$p_nme; ?></option>
					<?php
						}
						else{
							$sql1="SELECT * FROM project_master	WHERE status=0";
							$result1 = mysqli_query($link,$sql1);
							while($row1=mysqli_fetch_array($result1)){	
					?>
							 <option value="" disabled selected hidden>Please Choose.............</option>
							 <option value="<?php echo $row1['projmas_key'];?>"><?php echo $row1['project_id']." - ".$row1['project_nme'] ?></option>
					<?php
							}
						}
					?>
			</select>
		</div>
		<?php
			if(!isset($_GET['p'])){
		?>
			<button type="submit" class="btn btn-success" name="btn_proceed">Proceed >></button>
		<?php
			}
		?>
	</form>
	</br>
	</br>
	</br>

	
<!-- Documentation -->
		<?php
			if($_GET['t']=='NCB'){
				
				$sql7="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
				$result7 = mysqli_query($link,$sql7);
				if(mysqli_num_rows($result7)>0){
					while($row7=mysqli_fetch_array($result7)){	
						$c40=$row7['no_of_lots'];
						$c54=$row7['sec4_dte'];
						$c55=$row7['sec4_no'];
						
						$c87=$row7['sec5_manufacturedte'];
						$c88=$row7['sec5_manufactureprocess'];
						$c89=$row7['sec5_nameofmanufactor'];
						$c90=$row7['sec5_typeofmanufactor'];
						$c91=$row7['sec5_fulladdressmanufactor'];
						$c92=$row7['sec5_completenmeofbidder'];
						$c93=$row7['sec5_title'];
						$c94=$row7['sec5_dteofsign'];
						$c95=$row7['sec5_nameofauthperson'];
						$c96=$row7['sec5_discreptionofgood'];
					}
				}
				
		?>
			<div class="row">
				<div class="col-md-2">
				
				</div>
                <div class="col-md-8">
					<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
								<div class="col-md-2">
										<a href="upload_documents.php?p=<?php echo $_GET['p']; ?>&t=NCB" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Previous</div></a>
								</div>
								<div class="col-md-8">
									
									<div style="font-size:20px; color:green; font-weight:bold;" align="center"> Bid Process </div>
									
								</div>
								<div class="col-md-2">
										<a href="bidEvaluation.php?p=<?php echo $_GET['p'];?>&t=NCB" class="btn btn-warning btn-block"><div style="font-size:20px; font-weight:bold;">Next &raquo;</div></a>
								</div>
							</div>
					</section>
				 </div>
		    </div>
			<br>
			<br>
					<form name="f2" method="post">
						<div class="form-group">
							<label for="sel1">Supplier</label>
							<select class="form-control input-sm"  name="sele_supplier" required onchange="this.form.submit();">
								<?php
								if(isset($_GET['s'])){
									$sql6="SELECT * FROM supplier_master WHERE supplierms_key='$_GET[s]' AND status=0";
									$result6 = mysqli_query($link,$sql6);
									while($row6=mysqli_fetch_array($result6)){
										$supp_nme2=$row6['supplier_name'];
										echo '<option value='.$_GET['s'].'>'.$supp_nme2.'</option>';
									}
									$sql5="SELECT * FROM supplier_master WHERE status=0";
									$result5 = mysqli_query($link,$sql5);
									while($row5=mysqli_fetch_array($result5)){
										$supp_key1=$row5['supplierms_key'];
										$supp_nme1=$row5['supplier_name'];
										echo '<option value='.$supp_key1.'>'.$supp_nme1.'</option>';
									}
								}
								else{
									$sql4="SELECT * FROM supplier_master WHERE status=0";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										$supp_key=$row4['supplierms_key'];
										$supp_nme=$row4['supplier_name'];
										echo '<option value="" disabled selected hidden>Please Choose.............</option>';
										echo '<option value='.$supp_key.'>'.$supp_nme.'</option>';
									}
								}
								?>					
							</select>
						</div>
					</form>
					<?php
					if(isset($_GET['s'])){
					?>
						<form name="f3" method="post">
						<?php
							//for($i3=1;$i3<=$c40;$i3++){
							for($i3=1;$i3<=1;$i3++){
						?>
						
							<div class="panel panel-default">
								<div class="panel-heading">
									<div style="font-size:15px;font-weight:bold;">Lot No <?php echo $i3; ?></div>
								</div>
								<div class="panel-body">
									<input type="hidden" class="form-control input-sm" name="<?php echo "txt_sec45key".$i3;?>" value="<?php echo $i3; ?>">
										<table width="100%" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="45%">Item</th>
													<th width="10%">Qty</th>
													<th width="10%">Unit Price<br>(Without VAT)<br>In figures </th>
													<th width="10%">Unit Price<br>(With VAT)<br>In figures </th>
													<th width="10%">Total Price<br> (Without VAT)<br> In figures</th>
													<th width="10%">Total Price<br> (with VAT) In figures</th>
													<th width="5%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$r1=0;
												$sql8="SELECT * FROM ncbsec45_initial_item_details WHERE project_key='$_GET[p]' AND lot_no='$i3' AND status=0";
												$result8 = mysqli_query($link,$sql8);
												while($row8=mysqli_fetch_array($result8)){
													$sql11="SELECT * FROM ncbsec45_item_bid_details WHERE project_key='$_GET[p]' AND lot_no='$i3' AND supplier_key='$_GET[s]' AND item_key='$row8[ncbsec45_ini_item_key]' AND status=0";
													$result11 = mysqli_query($link,$sql11);
													if(mysqli_num_rows($result11)==0){
												?>
														<tr>
															<td><?php echo $row8['item_nme']; ?><input type="hidden" class="form-control input-sm" name="<?php echo "txt_item".$row8['ncbsec45_ini_item_key']; ?>" value="<?php echo $row8['ncbsec45_ini_item_key']; ?>"></td>
															<td><?php echo $row8['qty'];?></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_withoutvatunitprice".$row8['ncbsec45_ini_item_key']; ?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_withvatunitprice".$row8['ncbsec45_ini_item_key']; ?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_totwithoutvat".$row8['ncbsec45_ini_item_key']; ?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_totwithvat".$row8['ncbsec45_ini_item_key']; ?>"></td>
															
															<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_45priceadd".$row8['ncbsec45_ini_item_key'];?>" value="Add"></td>
														</tr>
												<?php
													}
													else{
														while($row11=mysqli_fetch_array($result11)){
												?>
														<tr>
															<td><?php echo $row8['item_nme']; ?><input type="hidden" class="form-control input-sm" name="<?php echo "txt_item".$row8['ncbsec45_ini_item_key']; ?>" value="<?php echo $row8['ncbsec45_ini_item_key']; ?>"></td>
															<td><?php echo $row8['qty'];?></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_withoutvatunitprice".$row8['ncbsec45_ini_item_key']; ?>" value="<?php echo $row11['unit_price_withoutvat']; ?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_withvatunitprice".$row8['ncbsec45_ini_item_key']; ?>" value="<?php echo $row11['unit_price_withvat']; ?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_totwithoutvat".$row8['ncbsec45_ini_item_key']; ?>" value="<?php echo $row11['total_price_withoutvat']; ?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_totwithvat".$row8['ncbsec45_ini_item_key']; ?>" value="<?php echo $row11['total_price_withvat']; ?>"></td>
															<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_45priceadd".$row8['ncbsec45_ini_item_key'];?>" value="Update"></td>
														</tr>

												<?php
														}
													}
												}
												?>
											</tbody>
										</table>
								</div>
							</div>
						
						<?php
							}
						?>
						</form>
					<?php
					}
					?>
		<?php
			}
		?>
<!-- Footer -->

<?php include("includes/footer.php");?>
	
	
</body>
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
</html>