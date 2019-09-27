<?php 
include("includes/a_config.php");
include("includes/conn.php");
include("includes/sessionconfig.php");?>


<?php
	$cur_dte=date("Y-m-d");
	
	if(isset($_POST['btn_proceed'])){
		$a1=$_POST['sele_sell'];
		
		$sql8="SELECT * FROM project_master WHERE projmas_key='$a1'";
		$result8 = mysqli_query($link,$sql8);
		while($row8=mysqli_fetch_array($result8)){
			 	$a2=$row8['bid_type'];
		}
		
		if($a2=='NCB'){
			echo "<script>
					window.location.href='bidEvaluation.php?p=$a1&t=$a2';
				</script>";
		}
		if($a2=='Shopping'){
				echo "<script>
						window.location.href='shp_bidEvaluation.php?p=$a1&t=$a2';
					</script>";
		}
		
	}
	
	if(isset($_GET['p'])){
		$sql3="SELECT * FROM project_master WHERE projmas_key='$_GET[p]'";
		$result3 = mysqli_query($link,$sql3);
		while($row3=mysqli_fetch_array($result3)){	
			$p_id=$row3['project_id'];
			$p_nme=$row3['project_nme'];
			
		}
		
		if($_GET['t']=='NCB'){
			
			$q1=0;
			$sql15="SELECT DISTINCT(supplier_key) AS dissuppkey FROM ncbsec45_item_bid_details WHERE lot_no=1 AND project_key='$_GET[p]' AND status=0";
			$result15 = mysqli_query($link,$sql15);
			while($row15=mysqli_fetch_array($result15)){
				
				$q1++;
				
				if(isset($_POST['btn_preliminaryadd'.$q1])){
					$d1=$_POST["txt_perliminarykey".$q1];
					$d2=$_POST["txt_bidbondgurantee".$q1];
					$d3=$_POST["txt_formfilled".$q1];
					$d4=$_POST["txt_priceshedulefill".$q1];
					$d5=$_POST["txt_manufactureauth".$q1];
					$d6=$_POST["chk_accpection".$q1];
					
					if ($d6 == 1){
						$d7=1;
					}
					else{
						$d7=0;
					}
					
					$sql18="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND supplier_key='$d1' AND status=0";
					$result18 = mysqli_query($link,$sql18);
					if(mysqli_num_rows($result18)==0){
						$sql16="INSERT INTO ncbsec45_bid_eveluate_details (status,
																ncbsec45_bid_eveluate_dtlkey,
																		project_key,
																		lot_no,
																		supplier_key,
																		pre_exami_bidbond,
																		pre_exami_bidfilled,
																		pre_exami_priceshedulefill,
																		pre_exami_manufactureauth,
																		pre_exami_accpectancedetail,
																		act_peson)
																	VALUES(0,
																		  NULL,
																		  '$_GET[p]',
																		  '1',
																		  '$d1',
																		  '$d2',
																		  '$d3',
																		  '$d4',
																		  '$d5',
																		  '$d7',
																		  '$ses_ukey'
																		  )";
																		  
						if(mysqli_query($link,$sql16)){
							echo "<script>
								alert('Successfully Bid Evaluation');
								
							</script>";
						}
						else{
							echo "<script>
								alert('Execute Error');
							</script>";
						}
						
					}
					else{
						$sql19="UPDATE ncbsec45_bid_eveluate_details SET 
												pre_exami_bidbond='$d2',
												pre_exami_bidfilled='$d3',
												pre_exami_priceshedulefill='$d4',
												pre_exami_manufactureauth='$d5',
												pre_exami_accpectancedetail='$d7'
										WHERE project_key='$_GET[p]' AND
												lot_no=1 AND
												supplier_key='$d1' AND
												status=0";
																		  
						if(mysqli_query($link,$sql19)){
							echo "<script>
								alert('Successfully Bid Evaluation');
								
							</script>";
						}
						else{
							echo "<script>
								alert('Execute Error');
							</script>";
						}
					}
										
					
				}
			}
			
			$sql22="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
			$result22 = mysqli_query($link,$sql22);
			while($row22=mysqli_fetch_array($result22)){
				
				$rt3=$row22['ncbsec45_bid_eveluate_dtlkey'];
				
				if(isset($_POST['btn_reject'.$rt3])){
					$rt1=$_POST["txt_rejectkey".$rt3];
					$rt2=$_POST["txt_rejectreason".$rt3];
					
					if($row22['pre_exami_reject_bidder']==1){
						$sql24="UPDATE ncbsec45_bid_eveluate_details SET 
														pre_exami_reject_bidder=NULL,
														pre_exami_reject_bidder_reason=NULL
														WHERE ncbsec45_bid_eveluate_dtlkey='$rt1'";
						if(mysqli_query($link,$sql24)){
							echo "<script>
								alert('Successfully Bidder Rejected');
							</script>";
						}
						else{
							echo "<script>
								alert('Execute Error');
							</script>";
						}
					}
					else{
						$sql23="UPDATE ncbsec45_bid_eveluate_details SET 
														pre_exami_reject_bidder=1,
														pre_exami_reject_bidder_reason='$rt2'
														WHERE ncbsec45_bid_eveluate_dtlkey='$rt1'";
						if(mysqli_query($link,$sql23)){
							echo "<script>
								alert('Successfully Bidder Reject Reset');
							</script>";
						}
						else{
							echo "<script>
								alert('Execute Error');
							</script>";
						}
					}
					
				}
				
			}
			
			$sql28="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  pre_exami_reject_bidder IS NULL AND status=0";
			$result28 = mysqli_query($link,$sql28);
			while($row28=mysqli_fetch_array($result28)){
				
				$ra1=$row28['ncbsec45_bid_eveluate_dtlkey'];
				
				if(isset($_POST['btn_fineveluate'.$ra1])){
					$ra2=$_POST["txt_addiommi".$ra1];
					$ra3=$_POST["txt_eveluatebidprice".$ra1];
					$ra4=$_POST["txt_finevelutekey".$ra1];
					
					
						$sql29="UPDATE ncbsec45_bid_eveluate_details SET 
														fin_eveluate_addi_ommi='$ra2',
														fin_eveluate_bidprice='$ra3'
														WHERE ncbsec45_bid_eveluate_dtlkey='$ra4'";
						if(mysqli_query($link,$sql29)){
							echo "<script>
								alert('Successfully Financial Evaluated');
							</script>";
						}
						else{
							echo "<script>
								alert('Execute Error');
							</script>";
						}
				}
				
				if(isset($_POST['btn_tecdiscription'.$ra1])){
					$rq1=$_POST["txt_teceve1key".$ra1];
					$rq2=$_POST["txt_teceve_description".$ra1];
					
					$sql32="UPDATE ncbsec45_bid_eveluate_details SET tec_eveluate_discription='$rq2'
																WHERE ncbsec45_bid_eveluate_dtlkey='$rq1'";
					if(mysqli_query($link,$sql32)){
							echo "<script>
								alert('Successfully Technical Description');
							</script>";
					}
					else{
							echo "<script>
								alert('Execute Error');
							</script>";
					}
				}
				
				if(isset($_POST['btn_responsive'.$ra1])){
					$rp1=$_POST["txt_responsivekey".$ra1];
					
					if($row28['tec_eveluate_responsivness']==1){
							$sql35="UPDATE ncbsec45_bid_eveluate_details SET 
															tec_eveluate_responsivness=NULL
															WHERE ncbsec45_bid_eveluate_dtlkey='$rp1'";
							if(mysqli_query($link,$sql35)){
								echo "<script>
									alert('Successfully Added Responsiveness');
								</script>";
							}
							else{
								echo "<script>
									alert('Execute Error');
								</script>";
							}
					}
					else{
							$sql36="UPDATE ncbsec45_bid_eveluate_details SET 
															tec_eveluate_responsivness=1
															WHERE ncbsec45_bid_eveluate_dtlkey='$rp1'";
							if(mysqli_query($link,$sql36)){
								echo "<script>
									alert('Successfully Update Responsiveness');
								</script>";
							}
							else{
								echo "<script>
									alert('Execute Error');
								</script>";
							}
					}
				}
			}
			
			if(isset($_POST['btn_quification'])){
				
				$sql41="INSERT INTO ncb_postqulification_master (status,
																 ncb_postqulifimas_key,
																		project_key,
																		lot_no,
																		post_qulified_detail)
																	VALUES(0,
																		  NULL,
																		  '$_GET[p]',
																		  1,
																		  '$_POST[txt_qulification]'
																		  )";
																		  
				if(mysqli_query($link,$sql41)){
					
					$sql43="SELECT MAX(ncb_postqulifimas_key) AS maxqulifykey1 FROM ncb_postqulification_master WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
					$result43 = mysqli_query($link,$sql43);
					while($row43=mysqli_fetch_array($result43)){
						$maxqulifykey1=$row43['maxqulifykey1'];
					}
					
					$sql42="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  tec_eveluate_responsivness=1 AND status=0";
					$result42 = mysqli_query($link,$sql42);
					while($row42=mysqli_fetch_array($result42)){
						$rs1=$row42['ncbsec45_bid_eveluate_dtlkey'];
						
						$rs2=$_POST["txt_qulifi_suppkey".$rs1];
						$rs3=$_POST["txt_qulification".$rs1];
						
						$sql44="INSERT INTO ncb_postqulification_details (status,
																  	ncb_postqulifidetail_key,
																		project_key,
																		lot_no,
																		supplier_key,
																		ncb_master_key,
																		qulification)
																	VALUES(0,
																		  NULL,
																		  '$_GET[p]',
																		  '1',
																		  '$rs2',
																		  '$maxqulifykey1',
																		  '$rs3'
																		  )";
						mysqli_query($link,$sql44);
				
					}
							
							echo "<script>
								alert('Successfully Added Post Qualification');
							</script>";
				}
				else{
							echo "<script>
								alert('Execute Error');
							</script>";
				}
				
			}
			
			$sql48="SELECT * FROM ncb_postqulification_master WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
			$result48 = mysqli_query($link,$sql48);
			while($row48=mysqli_fetch_array($result48)){
				$qd1="btn_quification_upd".$row48['ncb_postqulifimas_key'];
				$qd4="txt_qulifikey_ed".$row48['ncb_postqulifimas_key'];
				
				if(isset($_POST[$qd1])){
					
					$sql49="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  tec_eveluate_responsivness=1 AND status=0";
					$result49 = mysqli_query($link,$sql49);
					while($row49=mysqli_fetch_array($result49)){						
						
						$qd2="txt_qulifi_suppkey_ed".$row48['ncb_postqulifimas_key']."_".$row49['ncbsec45_bid_eveluate_dtlkey'];	
						$qd3="txt_qulification_ed".$row48['ncb_postqulifimas_key']."_".$row49['ncbsec45_bid_eveluate_dtlkey'];							
						
						
						$sql50="UPDATE ncb_postqulification_details SET qulification='$_POST[$qd3]'
																	WHERE project_key='$_GET[p]' AND lot_no=1 AND supplier_key='$_POST[$qd2]' AND ncb_master_key='$_POST[$qd4]' AND status=0";
						mysqli_query($link,$sql50);
					}
					
					echo "<script>
								alert('Successfully Update Post Qualification');
					</script>";
				}	
			}
			
			$sql53="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  tec_eveluate_responsivness=1 AND status=0";
			$result53 = mysqli_query($link,$sql53);
			while($row53=mysqli_fetch_array($result53)){
				$rk1=$row53['ncbsec45_bid_eveluate_dtlkey'];
				
				if(isset($_POST['btn_rank'.$rk1])){
					
					$rk2=$_POST["txt_rankingkey".$rk1];
					$rk3=$_POST["txt_eveluaterank".$rk1];
					
					
					$sql54="UPDATE ncbsec45_bid_eveluate_details SET tec_eveluate_rank='$rk3'
																WHERE ncbsec45_bid_eveluate_dtlkey='$rk2'";
					if(mysqli_query($link,$sql54)){
							echo "<script>
								alert('Successfully Ranking Bidder');
							</script>";
					}
					else{
							echo "<script>
								alert('Execute Error');
							</script>";
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
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>


<div class="container" id="main-content">
	<h2>Bid Evaluation Form</h2>
	
	<form name="f1" method="post" >
		<div class="form-group">
			<label for="sel1">Select the Project ID</label>
			<select class="form-control input-sm" id="sel1" name="sele_sell" required>
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
<!-- Pre Process --> 
  <?php
	if(isset($_GET['p'])&& isset($_GET['t'])){
		if($_GET['t']=='NCB'){
  ?>
		<div class="row">
				<div class="col-md-2">
				
				</div>
                <div class="col-md-8">
					<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
								<div class="col-md-2">
										<a href="bid_process.php?p=<?php echo $_GET['p']; ?>&t=NCB" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Previous</div></a>
								</div>
								<div class="col-md-8">
									
									<div style="font-size:20px; color:green; font-weight:bold;" align="center"> Bid Evaluation </div>
									
								</div>
								<div class="col-md-2">
									
								</div>
							</div>
					</section>
				 </div>
		    </div>
			
			
			<div class="row">
				<div class="col-md-2">
						
				</div>
				<div class="col-md-8">
					<label for="ex3">Committee Members</label>
					<br>
					<table class="table table-striped table-bordered display" width="100%">
								<thead>
									<tr>
										<th>Full Name</th>
										<th>Designation</th>
										<th>Department</th>
										<th>Committee</th>
										<th>Capacity</th>
									</tr>
								</thead>
								<tbody>
									<?php
										
										$sql5="SELECT * FROM appoint_tec_details INNER JOIN user_master ON appoint_tec_details.user_key=user_master.user_key
																				 WHERE appoint_tec_details.project_key='$_GET[p]' AND  appoint_tec_details.status=0 AND user_master.status=0";
										$result5 = mysqli_query($link,$sql5);
										while($row5=mysqli_fetch_array($result5)){	
									?>
									<tr>
										<td><?php echo $row5['first_name']." ".$row5['last_name'];?></td>
										<td><?php echo $row5['designation'];?></td>
										<td><?php echo $row5['department'];?></td>
										<td><?php echo $row5['committee'];?></td>
										<td><?php if($row5['chairman_appointtec']=="C"){echo "Chairman";}else{echo "Member";}?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
					</table>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-1">
						
				</div>
				<div class="col-md-10">
					<label for="ex3">Bids Received Before Closing Time-Price Scheduled</label>
					<br>
					<table class="table table-striped table-bordered display" width="100%">
								<thead>
									<tr>
										<th width="5%">S/No</th>
										<th width="65%">Name of the Bidder</th>
										<th width="10%">Qty</th>
										<th width="10%">Unit Price Without VAT (Rs) </th>
										<th width="10%">Total Amount Without VAT </th>
									</tr>
								</thead>
								<tbody>
									<?php
										$r=0;
										$sql9="SELECT DISTINCT(supplier_key) AS dissuppkey FROM ncbsec45_item_bid_details WHERE lot_no=1 AND project_key='$_GET[p]' AND status=0";
										$result9 = mysqli_query($link,$sql9);
										while($row9=mysqli_fetch_array($result9)){
											
											$r++;
											
											$sql10="SELECT * FROM supplier_master WHERE supplierms_key='$row9[dissuppkey]' AND status=0";
											$result10 = mysqli_query($link,$sql10);
											while($row10=mysqli_fetch_array($result10)){
												
												$n1=0;
												$n2=0;
												$n3=0;
												
												$sql11="SELECT SUM(qty) AS totqty,
															   SUM(unit_price_withoutvat) AS totunitpricewithoutvat,
															   SUM(total_price_withoutvat)AS totpricewithoutvat
															FROM ncbsec45_item_bid_details WHERE project_key='$_GET[p]' AND lot_no=1 AND supplier_key='$row9[dissuppkey]' AND status=0";
												$result11 = mysqli_query($link,$sql11);
												while($row11=mysqli_fetch_array($result11)){
													$n1=$row11['totqty'];
													$n2=$row11['totunitpricewithoutvat'];
													$n3=$row11['totpricewithoutvat'];
												}
									?>			
									<tr>
										<td> <?php echo $r;?></td>
										<td> <?php echo $row10['supplier_name'];?></td>
										<td align="right"><?php echo $n1;?></td>
										<td align="right"><?php echo number_format($n2,2);?></td>
										<td align="right"><?php echo number_format($n3,2);?></td>
									</tr>
									<?php
											}
										}
									?>
								</tbody>
					</table>
				</div>
			</div>
			
			<form name="f2" method="post">
				<div class="row">
					<div class="col-md-1">
							
					</div>
					<div class="col-md-10">
						<label for="ex3">Preliminary Examination Of Bids</label>
						<br>
						<table class="table table-striped table-bordered display" width="100%">
								<?php
								$sql14="SELECT * FROM ncbsec03_details WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
								$result14 = mysqli_query($link,$sql14);
								while($row14=mysqli_fetch_array($result14)){
									$heading_lots=$row14['heading_lots'];
								}
								?>
									<thead>
										<tr>
											<td colspan="8"><div style="font-size:18px;"><?php echo $heading_lots; ?></div></td>
										</tr>
										<tr>
											<th width="5%">No</th>
											<th width="35%">Name of the Bidder</th>
											<th width="10%">Bid Bond Guarantee </th>
											<th width="10%">Form of Bid Filled & Signed </th>
											<th width="10%">Price Schedule Filled And Signed</th>
											<th width="10%">Manufacture Authorization </th>
											<th width="10%">Acceptance for Detailed Examination </th>
											<th width="10%">Action </th>
										</tr>
									</thead>
									<tbody>
										<?php
											$q=0;
											$sql12="SELECT DISTINCT(supplier_key) AS dissuppkey FROM ncbsec45_item_bid_details WHERE lot_no=1 AND project_key='$_GET[p]' AND status=0";
											$result12 = mysqli_query($link,$sql12);
											while($row12=mysqli_fetch_array($result12)){
												$q++;
												$sql13="SELECT * FROM supplier_master WHERE supplierms_key='$row12[dissuppkey]' AND status=0";
												$result13 = mysqli_query($link,$sql13);
												while($row13=mysqli_fetch_array($result13)){
													
													$sql17="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND supplier_key='$row12[dissuppkey]' AND status=0";
													$result17 = mysqli_query($link,$sql17);
													if(mysqli_num_rows($result17)==0){
										?>			
														<tr>
															<td> <?php echo $q;?></td>
															<td> <?php echo $row13['supplier_name'];?></td>
															<td><input type="hidden" class="form-control input-sm" name="<?php echo "txt_perliminarykey".$q; ?>" value="<?php echo $row13['supplierms_key'];  ?>">
															<input type="text" class="form-control input-sm" name="<?php echo "txt_bidbondgurantee".$q; ?>" ></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_formfilled".$q; ?>" ></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_priceshedulefill".$q; ?>" ></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_manufactureauth".$q; ?>" ></td>
															<td><input type="checkbox" class="form-control input-sm" name="<?php echo "chk_accpection".$q; ?>" value="1"></td>
															<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_preliminaryadd".$q;?>" value="Add"></td>
														</tr>
										<?php
													}
													else{
														while($row17=mysqli_fetch_array($result17)){
										?>				
														<tr>
															<td> <?php echo $q;?></td>
															<td> <?php echo $row13['supplier_name'];?></td>
															<td><input type="hidden" class="form-control input-sm" name="<?php echo "txt_perliminarykey".$q; ?>" value="<?php echo $row13['supplierms_key'];?>">
															<input type="text" class="form-control input-sm" name="<?php echo "txt_bidbondgurantee".$q; ?>" value="<?php echo $row17['pre_exami_bidbond'];?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_formfilled".$q; ?>" value="<?php echo $row17['pre_exami_bidfilled'];?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_priceshedulefill".$q; ?>" value="<?php echo $row17['pre_exami_priceshedulefill'];?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_manufactureauth".$q; ?>" value="<?php echo $row17['pre_exami_manufactureauth'];?>"></td>
															<td><input type="checkbox" class="form-control input-sm" name="<?php echo "chk_accpection".$q; ?>" value="1" <?php if ($row17['pre_exami_accpectancedetail'] == 1) { echo "checked='checked'"; } ?>></td>
															<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_preliminaryadd".$q;?>" value="Update"></td>
														</tr>	
															
										<?php				
														}
													}
												}
											}
										?>
									</tbody>
						</table>
					</div>
				</div>
			</form>
			
				<?php
				$sql20="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
				$result20 = mysqli_query($link,$sql20);
				if(mysqli_num_rows($result20)>0){
				?>
					<form name="f4" method="post">
						<div class="row">
							<div class="col-md-1">
									
							</div>
							<div class="col-md-10">
								<label for="ex3">Reject Bidders</label>
								<br>
								<table class="table table-striped table-bordered display" width="100%">
											<thead>
												<tr>
													<th width="40%">Name of the Bidder</th>
													<th width="50%">Reject Reason </th>
													<th width="10%">Action </th>
												</tr>
											</thead>
											<tbody>
												<?php
													while($row20=mysqli_fetch_array($result20)){
														$sql21="SELECT * FROM supplier_master WHERE supplierms_key='$row20[supplier_key]' AND status=0";
														$result21 = mysqli_query($link,$sql21);
														while($row21=mysqli_fetch_array($result21)){
															$supps_keu=$row21['supplier_name'];
														}
														
												?>			
																<tr>
																	<td> <?php echo $supps_keu;?></td>
																	<td><input type="hidden" class="form-control input-sm" name="<?php echo "txt_rejectkey".$row20['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row20['ncbsec45_bid_eveluate_dtlkey'];  ?>">
																	<input type="text" class="form-control input-sm" name="<?php echo "txt_rejectreason".$row20['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php if($row20['pre_exami_reject_bidder']==1){echo $row20['pre_exami_reject_bidder_reason'];} ?>"></td>
																	<?php
																	if($row20['pre_exami_reject_bidder']==0){
																	?>
																	<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_reject".$row20['ncbsec45_bid_eveluate_dtlkey'];?>" value="Reject Bidder"></td>
																	<?php
																	}
																	else{
																	?>
																	<td><input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_reject".$row20['ncbsec45_bid_eveluate_dtlkey'];?>" value="Reject Bidder Reset"></td>
																	<?php
																	}
																	?>
																</tr>
												<?php
													}
												?>
											</tbody>
								</table>
							</div>
						</div>
					</form>
				<?php
				}
				?>
				
				<?php
				$sql25="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  pre_exami_reject_bidder IS NULL AND status=0";
				$result25 = mysqli_query($link,$sql25);
				if(mysqli_num_rows($result25)>0){
				?>
				
					<form name="f5" method="post">
						<div class="row">
							<div class="col-md-1">
									
							</div>
							<div class="col-md-10">
								<label for="ex3">Financial Evaluation</label>
								<br>
								<table class="table table-striped table-bordered display" width="100%">
											<thead>
												<tr>
													<th width="30%">Name of the Bidder</th>
													<th width="20%">Bid Price Without VAT (Rs)</th>
													<th width="20%">Additions or <br>Omissions</th>
													<th width="20%">Evaluated Bid Price<br> without VAT (Rs)</th>
													<th width="10%">Action </th>
												</tr>
											</thead>
											<tbody>
												<?php
													while($row25=mysqli_fetch_array($result25)){
														$sql26="SELECT * FROM supplier_master WHERE supplierms_key='$row25[supplier_key]' AND status=0";
														$result26 = mysqli_query($link,$sql26);
														while($row26=mysqli_fetch_array($result26)){
															$supps_keu1=$row26['supplier_name'];
														}
														
														$sumtotwithoutprice1=0;
														$sql27="SELECT SUM(total_price_withoutvat) AS sumtotwithoutprice1 FROM ncbsec45_item_bid_details 
																										WHERE project_key='$_GET[p]' AND 
																											lot_no=1 AND
																											supplier_key='$row25[supplier_key]' AND
																											status=0";
														$result27 = mysqli_query($link,$sql27);
														while($row27=mysqli_fetch_array($result27)){
															$sumtotwithoutprice1=$row27['sumtotwithoutprice1'];
														}
												?>			
																<tr>
																	<td> <?php echo $supps_keu1;?></td>
																	<td align="right"><input type="hidden" class="form-control input-sm" name="<?php echo "txt_finevelutekey".$row25['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row25['ncbsec45_bid_eveluate_dtlkey'];  ?>">
																	<?php echo number_format($sumtotwithoutprice1,2);?></td>
																	<td><input type="text" class="form-control input-sm" name="<?php echo "txt_addiommi".$row25['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row25['fin_eveluate_addi_ommi']; ?>"></td>
																	<td><input type="text" class="form-control input-sm" name="<?php echo "txt_eveluatebidprice".$row25['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row25['fin_eveluate_bidprice']; ?>"></td>
																	<?php
																	if($row25['fin_eveluate_bidprice']==0){
																	?>
																	<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_fineveluate".$row25['ncbsec45_bid_eveluate_dtlkey'];?>" value="Financial Evaluate"></td>
																	<?php
																	}
																	else{
																	?>
																	<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_fineveluate".$row25['ncbsec45_bid_eveluate_dtlkey'];?>" value="Change"></td>
																	<?php
																	}
																	?>
																</tr>
												<?php
													}
												?>
											</tbody>
								</table>
							</div>
						</div>
					</form>
					<?php
					}
					?>
					<?php
					$sql30="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  pre_exami_reject_bidder IS NULL AND status=0";
					$result30 = mysqli_query($link,$sql30);
					if(mysqli_num_rows($result30)>0){
					?>
					<form name="f5" method="post">
						<div class="row">
							<div class="col-md-1">
									
							</div>
							<div class="col-md-10">
								<label for="ex3">Technical Evaluation</label>
								<br>
								<table class="table table-striped table-bordered display" width="100%">
											<thead>
												<tr>
													<th width="30%">Name of the Bidder</th>
													<th width="60%">Description</th>
													<th width="10%">Action </th>
												</tr>
											</thead>
											<tbody>
												<?php
													while($row30=mysqli_fetch_array($result30)){
														$sql31="SELECT * FROM supplier_master WHERE supplierms_key='$row30[supplier_key]' AND status=0";
														$result31 = mysqli_query($link,$sql31);
														while($row31=mysqli_fetch_array($result31)){
															$supps_keu2=$row31['supplier_name'];
														}
														
												?>			
																<tr>
																	<td> <?php echo $supps_keu2;?></td>
																	<td align="right"><input type="hidden" class="form-control input-sm" name="<?php echo "txt_teceve1key".$row30['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row30['ncbsec45_bid_eveluate_dtlkey'];  ?>">
																	<textarea class="form-control input-sm" name="<?php echo "txt_teceve_description".$row30['ncbsec45_bid_eveluate_dtlkey']; ?>"><?php echo $row30['tec_eveluate_discription']; ?></textarea></td>
																	
																	
																	<?php
																	if($row30['tec_eveluate_discription']==NULL){
																	?>
																	<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_tecdiscription".$row30['ncbsec45_bid_eveluate_dtlkey'];?>" value="Technical Description"></td>
																	<?php
																	}
																	else{
																	?>
																	<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_tecdiscription".$row30['ncbsec45_bid_eveluate_dtlkey'];?>" value="Change"></td>
																	<?php
																	}
																	?>
																</tr>
												<?php
													}
												?>
											</tbody>
								</table>
							</div>
						</div>
					</form>
					<?php
					}
					?>
					
					<?php
					$sql34="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  pre_exami_reject_bidder IS NULL AND status=0";
					$result34 = mysqli_query($link,$sql34);
					if(mysqli_num_rows($result34)>0){
					?>
					<form name="f6" method="post">
						<div class="row">
							<div class="col-md-1">
									
							</div>
							<div class="col-md-10">
								<label for="ex3">Bidder Responsiveness</label>
								<br>
								<table class="table table-striped table-bordered display" width="100%">
									<thead>
										<tr>
											<th width="10%">No</th>
											<th width="70%">Bidder</th>
											<th width="20%">Responsiveness</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										$y1=0;
											while($row34=mysqli_fetch_array($result34)){
												
												$sql33="SELECT * FROM supplier_master WHERE supplierms_key='$row34[supplier_key]' AND status=0";
												$result33 = mysqli_query($link,$sql33);
												while($row33=mysqli_fetch_array($result33)){
													$supps_keu3=$row33['supplier_name'];
												}
												$y1++;
										?>		
												<tr>
													<td> <?php echo $y1;?></td>
													<td> <input type="hidden" class="form-control input-sm" name="<?php echo "txt_responsivekey".$row34['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row34['ncbsec45_bid_eveluate_dtlkey'];?>">
														 <?php echo $supps_keu3;?>
													</td>
													
													<?php
														if($row34['tec_eveluate_responsivness']==0){
													?>
														<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_responsive".$row34['ncbsec45_bid_eveluate_dtlkey'];?>" value="Responsive"></td>
													<?php
														}
														else{
													?>
														<td><input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_responsive".$row34['ncbsec45_bid_eveluate_dtlkey'];?>" value="No Responsive"></td>
													<?php
														}
													?>
												</tr>
										<?php	
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</form>
				<?php
				}
				?>
				
				<?php
					$sql37="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  tec_eveluate_responsivness=1 AND status=0";
					$result37 = mysqli_query($link,$sql37);
					if(mysqli_num_rows($result37)>0){
				?>
					<form name="f7" method="post">
						<div class="row">
							<div class="col-md-1">
									
							</div>
							<div class="col-md-10">
								<label for="ex3">Post Qualification AND Qualification Requirements.</label>
								<br>
								<table class="table table-striped table-bordered display" width="100%">
									<thead>
										<tr>
											<th>Qualification</th>
											<?php
												while($row37=mysqli_fetch_array($result37)){
													$sql38="SELECT * FROM supplier_master WHERE supplierms_key='$row37[supplier_key]' AND status=0";
													$result38 = mysqli_query($link,$sql38);
													while($row38=mysqli_fetch_array($result38)){
														$supps_keu4=$row38['supplier_name'];
													}
											?>
												<th><?php echo $supps_keu4; ?></th>	
											<?php	
												}
											?>
											<th>Action</th>	
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><textarea name="txt_qulification" class="form-control input-sm"></textarea></td>
											<?php
												$sql40="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  tec_eveluate_responsivness=1 AND status=0";
												$result40 = mysqli_query($link,$sql40);
												while($row40=mysqli_fetch_array($result40)){
													$sql39="SELECT * FROM supplier_master WHERE supplierms_key='$row40[supplier_key]' AND status=0";
													$result39 = mysqli_query($link,$sql39);
													while($row39=mysqli_fetch_array($result39)){
														$supps_keu5=$row39['supplier_name'];
													}
											?>
												<td>
												<input type="hidden" class="form-control input-sm" name="<?php echo "txt_qulifi_suppkey".$row40['ncbsec45_bid_eveluate_dtlkey'];?>" value="<?php echo $row40['supplier_key'] ?>">
												<input type="text" class="form-control input-sm" name="<?php echo "txt_qulification".$row40['ncbsec45_bid_eveluate_dtlkey'];?>">
												</td>		
												
											<?php
												}
											?>
											<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="btn_quification" value="Add"></td>
										</tr>
										
										<?php
											$sql45="SELECT * FROM ncb_postqulification_master WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
											$result45 = mysqli_query($link,$sql45);
											while($row45=mysqli_fetch_array($result45)){
										?>
											<tr>
												<td><?php echo $row45['post_qulified_detail']; ?>
												<input type="hidden" class="form-control input-sm" name="<?php echo "txt_qulifikey_ed".$row45['ncb_postqulifimas_key'];?>" value="<?php echo $row45['ncb_postqulifimas_key']; ?>">
												</td>
												<?php
												$sql46="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  tec_eveluate_responsivness=1 AND status=0";
												$result46 = mysqli_query($link,$sql46);
												while($row46=mysqli_fetch_array($result46)){
													
													$sql47="SELECT * FROM ncb_postqulification_details WHERE project_key='$_GET[p]' AND lot_no=1 AND supplier_key='$row46[supplier_key]' AND ncb_master_key='$row45[ncb_postqulifimas_key]' AND status=0";
													$result47 = mysqli_query($link,$sql47);
													while($row47=mysqli_fetch_array($result47)){
														
													
												?>
													<td>
														<input type="hidden" class="form-control input-sm" name="<?php echo "txt_qulifi_suppkey_ed".$row45['ncb_postqulifimas_key']."_".$row46['ncbsec45_bid_eveluate_dtlkey'];?>" value="<?php echo $row46['supplier_key']; ?>">
														<input type="text" class="form-control input-sm" name="<?php echo "txt_qulification_ed".$row45['ncb_postqulifimas_key']."_".$row46['ncbsec45_bid_eveluate_dtlkey'];?>" value="<?php echo $row47['qulification'];  ?>">
													</td>	
												<?php
													
													}
												}
												?>
												<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_quification_upd".$row45['ncb_postqulifimas_key'];?>" value="Update"></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</form>	
					
					<form name="f8" method="post">
						<div class="row">
							<div class="col-md-1">
									
							</div>
							<div class="col-md-10">
								<label for="ex3">Bidder Ranking</label>
								<br>
								<table class="table table-striped table-bordered display" width="100%">
									<thead>
										<tr>

											<th width="70%">Bidder</th>
											<th width="20%">Rank</th>
											<th width="10%">Action</th>	
										</tr>
									</thead>
									<tbody>
										<?php
										$sql51="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND  tec_eveluate_responsivness=1 AND status=0";
										$result51 = mysqli_query($link,$sql51);
										while($row51=mysqli_fetch_array($result51)){
												
												$sql52="SELECT * FROM supplier_master WHERE supplierms_key='$row51[supplier_key]' AND status=0";
												$result52 = mysqli_query($link,$sql52);
												while($row52=mysqli_fetch_array($result52)){
													$supps_keu6=$row52['supplier_name'];
												}
												$y1++;
										?>		
												<tr>
													<td> <input type="hidden" class="form-control input-sm" name="<?php echo "txt_rankingkey".$row51['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row51['ncbsec45_bid_eveluate_dtlkey'];?>">
														 <?php echo $supps_keu6;?>
													</td>
													<td><input type="text" class="form-control input-sm" name="<?php echo "txt_eveluaterank".$row51['ncbsec45_bid_eveluate_dtlkey']; ?>" value="<?php echo $row51['tec_eveluate_rank']; ?>"></td>
													<?php
														if($row51['tec_eveluate_rank']==0){
													?>
														<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_rank".$row51['ncbsec45_bid_eveluate_dtlkey'];?>" value="Add"></td>
													<?php
														}
														else{
													?>
														<td><input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_rank".$row51['ncbsec45_bid_eveluate_dtlkey'];?>" value="Update"></td>
													<?php
														}
													?>
												</tr>
										<?php	
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</form>	
				<?php
					}
				?>
				
				<?php
					$sql54="SELECT * FROM ncbsec45_bid_eveluate_details WHERE project_key='$_GET[p]' AND lot_no=1 AND tec_eveluate_rank>0 AND status=0";
					$result54 = mysqli_query($link,$sql54);
					if(mysqli_num_rows($result54)>0){
				?>		
						<div class="row">
							<div class="col-md-1">
									
							</div>
							<div class="col-md-10">
								<?php
								$sql55="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
								WHERE ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
									 ncbsec45_bid_eveluate_details.lot_no=1 AND 
									 ncbsec45_bid_eveluate_details.tec_eveluate_rank=1 AND 
									 ncbsec45_bid_eveluate_details.status=0";
								$result55 = mysqli_query($link,$sql55);
								while($row55=mysqli_fetch_array($result55)){
									$ses_supplier=$row55['supplier_name'];
								}
								?>
								<h2 align="center">Recommendation Bidder</h2>
								<h2 align="center"><?php echo$ses_supplier;?></h2>
							</div>
						</div>
					<a href="ncbbid_eveluation_report.php?p=<?php echo $_GET['p'];?>"><button type="button" class="btn btn-danger">Generate TEC Report For NCB</button></a>	
				<?php		
					}
				?>
				
  <?php
		}
		
  ?>

	<?php
		
	}
	?>
	
</div>

<?php include("includes/footer.php");?>
<script>

var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + ' milion ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    return str;
}

document.getElementById('amount').onkeyup = function () {
    document.getElementById('words').innerHTML = inWords(document.getElementById('amount').value);
};



</script>

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
</body>
</html>