<?php 
include("includes/a_config.php");
error_reporting(0);
?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");
?>

<?php
	
	$sql14="SELECT * FROM supplier_master WHERE status=0";
	$result14 = mysqli_query($link,$sql14);
	$option1="";
	while($row14=mysqli_fetch_array($result14)){
		$option1 = $option1."<option value='$row14[supplierms_key]'>$row14[supplier_name]</option>";	
	}
	
	if(isset($_POST['btn_proceed'])){
		$a1=$_POST['sele_sell'];
			
	
			echo "<script>
					window.location.href='boq_ec.php?p=$a1&b=1';
				</script>";
	
		
	}
	
	if(isset($_GET['p']) && isset($_GET['b'])){
		
		$sql3="SELECT * FROM boq_master INNER JOIN project_master ON boq_master.projmas_key=project_master.projmas_key
						WHERE boq_master.projmas_key='$_GET[p]'";
		$result3 = mysqli_query($link,$sql3);
		while($row3=mysqli_fetch_array($result3)){	
			$p_id=$row3['project_id'];
			$p_nme=$row3['project_nme'];
			
		}
		
		$sql5="SELECT * FROM boq_master WHERE projmas_key='$_GET[p]' AND boq_code='$_GET[b]'";
		$result5 = mysqli_query($link,$sql5);
		while($row5=mysqli_fetch_array($result5)){	
			$boq_key=$row5['boqmas_key'];
		}
		
		$sql2="SELECT MAX(boq_code) AS maxboqcode1 FROM boq_master WHERE projmas_key='$_GET[p]' AND status=0";
		$result2 = mysqli_query($link,$sql2);
		while($row2=mysqli_fetch_array($result2)){
				$maxboqcode=$row2['maxboqcode1'];
		}		
		
		if(isset($_POST['btn_submitboq'])){

			$ni2=$_POST['sele_supplier'];
					
					$sql6="SELECT * FROM boq_details WHERE boqmaster_key='$boq_key' AND status=0";
					$result6 = mysqli_query($link,$sql6);
					$noofrows1=mysqli_num_rows($result6);
					$i3=0;
					if($noofrows1>0){
						while($row6=mysqli_fetch_array($result6)){	
							
							$nw3="txt_price".$i3;
							$nw4="txt_qty".$i3;
							$nw6="txt_keyos".$i3;
							
							
							$nd3=$_POST[$nw3];
							$nd4=$_POST[$nw4];
							$nd6=$_POST[$nw6];
							
							$sql8="UPDATE boq_details SET price='$nd3',qty='$nd4' WHERE boqdetail_key='$nd6'";
							mysqli_query($link,$sql8);
							
							$i3++;
						}
					}		
				
					
					$sql16="UPDATE boq_master SET supplier_key='$ni2' WHERE boqmas_key='$boq_key'";
					mysqli_query($link,$sql16);
			
			
			$s1=$_GET['b'];
			$s2=$s1+1;
			
			
			if($_GET['b']==$maxboqcode){
				echo "<script>
					window.location.href='finishboq_ec.php?p=$_GET[p]';
				</script>";
			}
			else{
				echo "<script>
					window.location.href='boq_ec.php?p=$_GET[p]&b=$s2';
				</script>";
			}
			
		}
			
		if(isset($_POST['btn_finishboq'])){

				$ni3=$_POST['sele_supplier'];

					$sql7="SELECT * FROM boq_details WHERE boqmaster_key='$boq_key' AND status=0";
					$result7 = mysqli_query($link,$sql7);
					$noofrows2=mysqli_num_rows($result7);
					$i2=0;
					if($noofrows2>0){
						while($row7=mysqli_fetch_array($result7)){	
							
							$na3="txt_price".$i2;
							$na4="txt_qty".$i2;
							$na6="txt_keyos".$i2;
							
							
							$nb3=$_POST[$na3];
							$nb4=$_POST[$na4];
							$nb6=$_POST[$na6];
							
							$sql8="UPDATE boq_details SET price='$nb3',qty='$nb4' WHERE boqdetail_key='$nb6'";
							mysqli_query($link,$sql8);
							
							$i3++;
						}
					}		
				
					
					$sql16="UPDATE boq_master SET supplier_key='$ni3' WHERE boqmas_key='$boq_key'";
					mysqli_query($link,$sql16);
			
			
			echo "<script>
					window.location.href='finishboq_ec.php?p=$_GET[p]';
				</script>";
		}
		
		if(isset($_POST['btn_priviousboq'])){
			
			$s1=$_GET['b'];
			$s2=$s1-1;
			if($s1>1){
				echo "<script>
						window.location.href='boq_ec.php?p=$_GET[p]&b=$s2';
					</script>";
			}
		}
		
		if(isset($_POST['btn_submitboqread'])){
			
			$s1=$_GET['b'];
			$s2=$s1+1;
			
			if($_GET['b']==$maxboqcode){
				echo "<script>
					window.location.href='finishboq_ec.php?p=$_GET[p]';
				</script>";
			}
			else{
				echo "<script>
					window.location.href='boq_ec.php?p=$_GET[p]&b=$s2';
				</script>";
			}
		}
		
		if(isset($_POST['btn_finishboqread'])){
			echo "<script>
					window.location.href='finishboq_ec.php?p=$_GET[p]';
				</script>";
		}
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
	
	  <meta charset="utf-8">

  
	
  
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">

	<h2> Will Edit Or Confirm the BOQ here </h2>
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
			<button type="submit" class="btn btn-success" name="btn_proceed">Edit Or Confirm >></button>
		<?php
			}
		?>
	</form>
	</br>
	
	<?php
	$statuspermission=0;
		if($ses_ulevel=="Data Entry"){
			$sql10="SELECT * FROM user_activities INNER JOIN boq_master ON user_activities.boqmas_key = boq_master.boqmas_key 
																	 INNER JOIN user_master ON user_activities.user_key=user_master.user_key
																	WHERE user_activities.activity='confirm' AND boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_master.status=0 AND NOT user_master.user_level='Data Entry'";
			$result10 = mysqli_query($link,$sql10);
			if(mysqli_num_rows($result10)==0){
				$sql9="SELECT * FROM user_activities INNER JOIN boq_master ON user_activities.boqmas_key = boq_master.boqmas_key 
																		 INNER JOIN user_master ON user_activities.user_key=user_master.user_key
																		WHERE user_activities.activity='confirm' AND boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_master.status=0 AND user_master.user_level='Data Entry'";
				$result9 = mysqli_query($link,$sql9);
				if(mysqli_num_rows($result9)==0){
					$statuspermission=0;
				}
				else{
					$statuspermission=1;
				}
			}
			else{
				$statuspermission=1;
			}
		}
		
		if($ses_ulevel=="View Only"){
			$statuspermission=1;
		}
	?>
	<?php
		if($statuspermission==0){
	?>
			<form name="f2" id="f2" method="post">
							
								<div class="form-group">
									<label for="sel1">Supplier</label>
									<select class="form-control input-sm"  name="sele_supplier" required>
										<?php
										
											$sql20="SELECT * FROM boq_master INNER JOIN supplier_master ON boq_master.supplier_key=supplier_master.supplierms_key 
																			 WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_master.status=0";
											$result20 = mysqli_query($link,$sql20);
											while($row20=mysqli_fetch_array($result20)){
												$supp_key=$row20['supplierms_key'];
												$supp_nme=$row20['supplier_name'];
											}
											echo '<option value='.$supp_key.'>'.$supp_nme.'</option>';	
											echo $option1;
															
										?>					
									</select>
								</div>

									<table class="table table-striped table-bordered display" width="100%">
										<thead>
											<tr>
												<th>Item Code</th>
												<th>Item Name</th>
												<th>Price</th>
												<th>qty</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$r=0;
												$sql11="SELECT * FROM boq_master INNER JOIN boq_details ON boq_master.boqmas_key=boq_details.boqmaster_key
																				WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_details.status=0";
												$result11 = mysqli_query($link,$sql11);
												while($row11=mysqli_fetch_array($result11)){
															$nj1="txt_itemcode".$r;
															$nj2="txt_itemnme".$r;
															$nj3="txt_price".$r;
															$nj4="txt_qty".$r;
															$nj5="txt_total".$r;
															$nj6="txt_keyos".$r;
															$totalnj=$row11['price']*$row11['qty'];
															
											?>
													<tr>
														<td>
															<input type="hidden" class="form-control input-sm" name="<?php echo $nj6;?>" id="<?php echo $nj6;?>" value="<?php echo $row11['boqdetail_key'];?>">
															<?php echo $row11['item_code']; ?>
														</td>
														<td><?php echo $row11['item_nme']; ?></td>
														<td><input type="text" class="form-control input-sm" name="<?php echo $nj3;?>" id="<?php echo $nj3;?>" value="<?php echo $row11['price']; ?>"></td>
														<td><input type="text" class="form-control input-sm" name="<?php echo $nj4;?>" id="<?php echo $nj4;?>" value="<?php echo $row11['qty']; ?>"></td>
														<td align="right"><div id="<?php echo $nj5;?>"><?php echo number_format($totalnj,2); ?></div></td>							
													</tr>
											<?php
													$r++;
												}
											?>
										</tbody>
									</table>

							<div class="col-md-4">
								<?php
									if($_GET['b']>1){
								?>
									<button type="submit" class="btn btn-primary btn-lg" name="btn_priviousboq">Previous BOQ</button>							
								<?php
									}
								?>
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-primary btn-lg" name="btn_submitboq"><?php if($_GET['b']==$maxboqcode){ ?>Edit<?php }else{?>Edit And Next BOQ<?php } ?></button>
							</div>
							
							<div class="col-md-4">
								<button type="submit" class="btn btn-primary btn-lg" name="btn_finishboq">Project Summery</button>
							</div>
							
						</form>	
	<?php
				
			}
			else{
	?>
				<form name="f3" id="f3" method="post">
						
							<div class="form-group">
								<label for="sel1">Supplier :</label>
								<label>
									<?php
									
										$sql20="SELECT * FROM boq_master INNER JOIN supplier_master ON boq_master.supplier_key=supplier_master.supplierms_key 
																		 WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_master.status=0";
										$result20 = mysqli_query($link,$sql20);
										while($row20=mysqli_fetch_array($result20)){
											$supp_key=$row20['supplierms_key'];
											$supp_nme=$row20['supplier_name'];
										}
										echo $supp_nme;
										
									?>					
								</label>
							</div>

								<table class="table table-striped table-bordered display" width="100%">
									<thead>
										<tr>
											<th>Item Code</th>
											<th>Item Name</th>
											<th>Price</th>
											<th>qty</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$r=0;
											$sql11="SELECT * FROM boq_master INNER JOIN boq_details ON boq_master.boqmas_key=boq_details.boqmaster_key
																			WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_details.status=0";
											$result11 = mysqli_query($link,$sql11);
											while($row11=mysqli_fetch_array($result11)){
														$nj1="txt_itemcode".$r;
														$nj2="txt_itemnme".$r;
														$nj3="txt_price".$r;
														$nj4="txt_qty".$r;
														$nj5="txt_total".$r;
														$nj6="txt_keyos".$r;
														$totalnj=$row11['price']*$row11['qty'];
														
										?>
												<tr>
													<td><?php echo $row11['item_code']; ?></td>
													<td><?php echo $row11['item_nme']; ?></td>
													<td><?php echo $row11['price']; ?></td>
													<td><?php echo $row11['qty']; ?></td>
													<td align="right"><div id="<?php echo $nj5;?>"><?php echo number_format($totalnj,2); ?></div></td>							
												</tr>
										<?php
												$r++;
											}
										?>
									</tbody>
								</table>

						<div class="col-md-4">
							<?php
								if($_GET['b']>1){
							?>
								<button type="submit" class="btn btn-primary btn-lg" name="btn_priviousboq">Previous BOQ</button>							
							<?php
								}
							?>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-primary btn-lg" name="btn_submitboqread">Next BOQ</button>
						</div>
						
						<div class="col-md-4">
							<button type="submit" class="btn btn-primary btn-lg" name="btn_finishboqread">Project Summery</button>
						</div>
						
				</form>	
	<?php
			}
		
		
	?>

<!-- Footer -->

<?php include("includes/footer.php");?>
	<script type="text/javascript" src="js/jquery3.3.1.js"></script>
	<script type="text/javascript">
		<?php
				if(isset($_GET['p'])){

			
					$b1=0;
					$sql4="SELECT * FROM boq_master INNER JOIN boq_details ON boq_master.boqmas_key=boq_details.boqmaster_key
															WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_details.status=0";
					$result4 = mysqli_query($link,$sql4);
					while($row4=mysqli_fetch_array($result4)){
						
		?>
					
						$( "#txt_qty<?php echo $b1;?>" ).keyup(function( event ) {
							var qtv = $( this ).val();
							var prv = $("#txt_price<?php echo $b1;?>").val();
							var totv= prv*qtv;
							$( "#txt_total<?php echo $b1; ?>" ).text(totv.toFixed(2));
						});
						
						$( "#txt_price<?php echo $b1;?>" ).keyup(function( event ) {
							var qtv = $("#txt_qty<?php echo $b1;?>").val();
							var prv = $( this ).val();
							var totv= prv*qtv;
							$( "#txt_total<?php echo $b1; ?>" ).text(totv.toFixed(2));
						});
		<?php
						$b1++;
					}
				}
			
		?>
	</script>
	
	
</body>
</html>