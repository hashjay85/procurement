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
	while($row14=mysqli_fetch_array($result14)){
		$option1 = $option1."<option value='$row14[supplierms_key]'>$row14[supplier_name]</option>";	
	}
	
	if(isset($_POST['btn_proceed'])){
		$a1=$_POST['sele_sell'];
		
		$sql21="SELECT * FROM boq_master WHERE projmas_key='$a1' AND status=0";
		$result21 = mysqli_query($link,$sql21);
		if(mysqli_num_rows($result21)==0){
			$sql2="INSERT INTO boq_master (status,boqmas_key,projmas_key,boq_code)
									VALUES (0,NULL,'$a1',1)";
			if(mysqli_query($link,$sql2)){
				echo "<script>
						alert('BOQ Started');
						window.location.href='boq.php?p=$a1&b=1&n=4';
					</script>";
			}
		}
		else{
			$sql22="SELECT MAX(boq_code) AS maxboqcd1 FROM boq_master WHERE projmas_key='$a1' AND status=0";
			$result22 = mysqli_query($link,$sql22);
			while($row22=mysqli_fetch_array($result22)){
				$maxboqcd1=$row22['maxboqcd1'];
			}
			$newboqcd=$maxboqcd1+1;
			
			
				echo "<script>
						alert('BOQ Started');
						window.location.href='boq.php?p=$a1&b=$newboqcd';
					</script>";
			
		}
		
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
		
		if(isset($_POST['btn_moreadd'])){
			
			$ni1=$_POST['sele_supplier'];
			
			$sql6="SELECT * FROM boq_details WHERE boqmaster_key='$boq_key' AND status=0";
			$result6 = mysqli_query($link,$sql6);
			$noofrows1=mysqli_num_rows($result6);
			$i3=0;
			if($noofrows1>0){
				while($row6=mysqli_fetch_array($result6)){	
					$nw1="txt_itemcode".$i3;
					$nw2="txt_itemnme".$i3;
					$nw3="txt_price".$i3;
					$nw4="txt_qty".$i3;
					$nw5="txt_total".$i3;
					$nw6="txt_keyos".$i3;
					
					$nd1=$_POST[$nw1];
					$nd2=$_POST[$nw2];
					$nd3=$_POST[$nw3];
					$nd4=$_POST[$nw4];
					$nd5=$_POST[$nw5];
					$nd6=$_POST[$nw6];
					
					$sql8="UPDATE boq_details SET item_code='$nd1',item_nme='$nd2',price='$nd3',qty='$nd4' WHERE boqdetail_key='$nd6'";
					mysqli_query($link,$sql8);
					
					$i3++;
				}
			}		
			for($i4=$i3;$i4<$_GET['n'];$i4++){
				$nf1="txt_itemcode".$i4;
				$nf2="txt_itemnme".$i4;
				$nf3="txt_price".$i4;
				$nf4="txt_qty".$i4;
				$nf5="txt_total".$i4;
				
				$ng1=$_POST[$nf1];
				$ng2=$_POST[$nf2];
				$ng3=$_POST[$nf3];
				$ng4=$_POST[$nf4];
				$ng5=$_POST[$nf5];
				
				if($ng1==null||$ng2==null||$ng3==null||$ng4==null){
					
				}
				else{
					$sql9="INSERT INTO boq_details (status,boqdetail_key,boqmaster_key,item_code,item_nme,price,qty)
											VALUES (0,NULL,'$boq_key','$ng1','$ng2','$ng3','$ng4')";
					mysqli_query($link,$sql9);
				}
			}
			
			$sql15="UPDATE boq_master SET supplier_key='$ni1' WHERE boqmas_key='$boq_key'";
			mysqli_query($link,$sql15);
			
			//$sql24="INSERT INTO user_activities (status,useractivity_key,boqmas_key,user_key,activity)VALUES(0,NULL,'$boq_key','$ses_ukey','Entered')";
			//mysqli_query($link,$sql24);
			
			$a2=$_GET['n'];
			$a3=$a2+$_POST['txt_moreadd'];
			echo "<script>
					window.location.href='boq.php?p=$_GET[p]&b=1&n=$a3';
				</script>";
		}
		
		if(isset($_POST['btn_submitboq'])){

			if($_GET['b']==1){
					$ni2=$_POST['sele_supplier'];
					
					$sql6="SELECT * FROM boq_details WHERE boqmaster_key='$boq_key' AND status=0";
					$result6 = mysqli_query($link,$sql6);
					$noofrows1=mysqli_num_rows($result6);
					$i3=0;
					if($noofrows1>0){
						while($row6=mysqli_fetch_array($result6)){	
							$nw1="txt_itemcode".$i3;
							$nw2="txt_itemnme".$i3;
							$nw3="txt_price".$i3;
							$nw4="txt_qty".$i3;
							$nw5="txt_total".$i3;
							$nw6="txt_keyos".$i3;
							
							$nd1=$_POST[$nw1];
							$nd2=$_POST[$nw2];
							$nd3=$_POST[$nw3];
							$nd4=$_POST[$nw4];
							$nd5=$_POST[$nw5];
							$nd6=$_POST[$nw6];
							
							$sql8="UPDATE boq_details SET item_code='$nd1',item_nme='$nd2',price='$nd3',qty='$nd4' WHERE boqdetail_key='$nd6'";
							mysqli_query($link,$sql8);
							
							$i3++;
						}
					}		
					for($i4=$i3;$i4<$_GET['n'];$i4++){
						$nf1="txt_itemcode".$i4;
						$nf2="txt_itemnme".$i4;
						$nf3="txt_price".$i4;
						$nf4="txt_qty".$i4;
						$nf5="txt_total".$i4;
						
						$ng1=$_POST[$nf1];
						$ng2=$_POST[$nf2];
						$ng3=$_POST[$nf3];
						$ng4=$_POST[$nf4];
						$ng5=$_POST[$nf5];
						
						if($ng1==null||$ng2==null||$ng3==null||$ng4==null){
							
						}
						else{
							$sql9="INSERT INTO boq_details (status,boqdetail_key,boqmaster_key,item_code,item_nme,price,qty)
													VALUES (0,NULL,'$boq_key','$ng1','$ng2','$ng3','$ng4')";
							mysqli_query($link,$sql9);
						}
					}
					
					$sql16="UPDATE boq_master SET supplier_key='$ni2' WHERE boqmas_key='$boq_key'";
					mysqli_query($link,$sql16);
					
					$sql24="INSERT INTO user_activities (status,useractivity_key,boqmas_key,user_key,activity)VALUES(0,NULL,'$boq_key','$ses_ukey','Entered')";
					mysqli_query($link,$sql24);
			}
			else{
				$ni2=$_POST['sele_supplier'];
				
				$sql10="INSERT INTO boq_master (status,boqmas_key,projmas_key,boq_code,supplier_key)
									VALUES (0,NULL,'$_GET[p]','$_GET[b]','$ni2')";
				if(mysqli_query($link,$sql10)){
					$sql23="SELECT * FROM boq_master WHERE projmas_key='$_GET[p]' AND boq_code='$_GET[b]'";
					$result23 = mysqli_query($link,$sql23);
					while($row23=mysqli_fetch_array($result23)){	
						$boq_key1=$row23['boqmas_key'];
					}
					
					$sql24="INSERT INTO user_activities (status,useractivity_key,boqmas_key,user_key,activity)VALUES(0,NULL,'$boq_key1','$ses_ukey','Entered')";
					mysqli_query($link,$sql24);
					
					$r1=0;
					$sql12="SELECT * FROM boq_master INNER JOIN boq_details ON boq_master.boqmas_key=boq_details.boqmaster_key
																WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='1' AND boq_details.status=0";
					$result12 = mysqli_query($link,$sql12);
					while($row12=mysqli_fetch_array($result12)){
						$nk1="txt_itemcode".$r1;
						$nk2="txt_itemnme".$r1;
						$nk3="txt_price".$r1;
						$nk4="txt_qty".$r1;
						$nk5="txt_total".$r1;
						
						$nl1=$_POST[$nk1];
						$nl2=$_POST[$nk2];
						$nl3=$_POST[$nk3];
						$nl4=$_POST[$nk4];
						$nl5=$_POST[$nk5];
						
						if($nl1==null||$nl2==null||$nl3==null||$nl4==null){
								
						}
						else{
							$sql13="INSERT INTO boq_details (status,boqdetail_key,boqmaster_key,item_code,item_nme,price,qty)
														VALUES (0,NULL,'$boq_key1','$nl1','$nl2','$nl3','$nl4')";
							mysqli_query($link,$sql13);
														
						}
						
						$r1++;
					}
				}
			}
			
			$s1=$_GET['b'];
			$s2=$s1+1;
				echo "<script>
							window.location.href='boq.php?p=$_GET[p]&b=$s2&n=0';
					</script>";
			
		}
			
		if(isset($_POST['btn_finishboq'])){
			
			if($_GET['b']==1){
					$ni3=$_POST['sele_supplier'];
					
				
					$sql6="SELECT * FROM boq_details WHERE boqmaster_key='$boq_key' AND status=0";
					$result6 = mysqli_query($link,$sql6);
					$noofrows1=mysqli_num_rows($result6);
					$i3=0;
					if($noofrows1>0){
						while($row6=mysqli_fetch_array($result6)){	
							$nw1="txt_itemcode".$i3;
							$nw2="txt_itemnme".$i3;
							$nw3="txt_price".$i3;
							$nw4="txt_qty".$i3;
							$nw5="txt_total".$i3;
							$nw6="txt_keyos".$i3;
							
							$nd1=$_POST[$nw1];
							$nd2=$_POST[$nw2];
							$nd3=$_POST[$nw3];
							$nd4=$_POST[$nw4];
							$nd5=$_POST[$nw5];
							$nd6=$_POST[$nw6];
							
							$sql8="UPDATE boq_details SET item_code='$nd1',item_nme='$nd2',price='$nd3',qty='$nd4' WHERE boqdetail_key='$nd6'";
							mysqli_query($link,$sql8);
							
							$i3++;
						}
					}		
					for($i4=$i3;$i4<$_GET['n'];$i4++){
						$nf1="txt_itemcode".$i4;
						$nf2="txt_itemnme".$i4;
						$nf3="txt_price".$i4;
						$nf4="txt_qty".$i4;
						$nf5="txt_total".$i4;
						
						$ng1=$_POST[$nf1];
						$ng2=$_POST[$nf2];
						$ng3=$_POST[$nf3];
						$ng4=$_POST[$nf4];
						$ng5=$_POST[$nf5];
						
						if($ng1==null||$ng2==null||$ng3==null||$ng4==null){
							
						}
						else{
							$sql9="INSERT INTO boq_details (status,boqdetail_key,boqmaster_key,item_code,item_nme,price,qty)
													VALUES (0,NULL,'$boq_key','$ng1','$ng2','$ng3','$ng4')";
							mysqli_query($link,$sql9);
						}
					}
					
					$sql18="UPDATE boq_master SET supplier_key='$ni3' WHERE boqmas_key='$boq_key'";
					mysqli_query($link,$sql18);
					
					$sql24="INSERT INTO user_activities (status,useractivity_key,boqmas_key,user_key,activity)VALUES(0,NULL,'$boq_key','$ses_ukey','Entered')";
					mysqli_query($link,$sql24);
			}
			else{
				$ni3=$_POST['sele_supplier'];
				
				if($ni3!=null && $_POST['txt_price1']!==null && $_POST['txt_qty1']!==null){
					$sql10="INSERT INTO boq_master (status,boqmas_key,projmas_key,boq_code,supplier_key)
										VALUES (0,NULL,'$_GET[p]','$_GET[b]','$ni3')";
					if(mysqli_query($link,$sql10)){
						
						$sql23="SELECT * FROM boq_master WHERE projmas_key='$_GET[p]' AND boq_code='$_GET[b]'";
						$result23 = mysqli_query($link,$sql23);
						while($row23=mysqli_fetch_array($result23)){	
							$boq_key1=$row23['boqmas_key'];
						}
						
						$sql24="INSERT INTO user_activities (status,useractivity_key,boqmas_key,user_key,activity)VALUES(0,NULL,'$boq_key1','$ses_ukey','Entered')";
						mysqli_query($link,$sql24);
						
						$r1=0;
						$sql12="SELECT * FROM boq_master INNER JOIN boq_details ON boq_master.boqmas_key=boq_details.boqmaster_key
																	WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='1' AND boq_details.status=0";
						$result12 = mysqli_query($link,$sql12);
						while($row12=mysqli_fetch_array($result12)){
							$nk1="txt_itemcode".$r1;
							$nk2="txt_itemnme".$r1;
							$nk3="txt_price".$r1;
							$nk4="txt_qty".$r1;
							$nk5="txt_total".$r1;
							
							$nl1=$_POST[$nk1];
							$nl2=$_POST[$nk2];
							$nl3=$_POST[$nk3];
							$nl4=$_POST[$nk4];
							$nl5=$_POST[$nk5];
							
							if($nl1==null||$nl2==null||$nl3==null||$nl4==null){
									
							}
							else{
								$sql13="INSERT INTO boq_details (status,boqdetail_key,boqmaster_key,item_code,item_nme,price,qty)
															VALUES (0,NULL,'$boq_key1','$nl1','$nl2','$nl3','$nl4')";
								mysqli_query($link,$sql13);
															
							}
							
							$r1++;
						}
					}
				}
			
			}
			
			
			echo "<script>
					window.location.href='finishboq.php?p=$_GET[p]';
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

	<form name="f2" id="f2" method="post">
		<?php
			if($_GET['b']==1){
		?>
			<div class="form-group">
				<label for="sel1">Supplier</label>
				<select class="form-control input-sm"  name="sele_supplier" required>
					<?php
					if($_GET['n']==4){
						echo '<option value="" disabled selected hidden>Please Choose.............</option>';	
						echo $option1;
					}
					else{
						$sql20="SELECT * FROM boq_master INNER JOIN supplier_master ON boq_master.supplier_key=supplier_master.supplierms_key 
														 WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='$_GET[b]' AND boq_master.status=0";
						$result20 = mysqli_query($link,$sql20);
						while($row20=mysqli_fetch_array($result20)){
							$supp_key=$row20['supplierms_key'];
							$supp_nme=$row20['supplier_name'];
						}
						echo '<option value='.$supp_key.'>'.$supp_nme.'</option>';	
						echo $option1;
					}
					?>					
				</select>
			</div>
			<div class="row">
				<div class="col-md-4">
											
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control input-sm" name="txt_moreadd" value="1">
				</div>
				<div class="col-md-2">
					<input type="submit" class="btn btn-success btn-sm btn-block" name="btn_moreadd" value="Add More">
				</div>
				<div class="col-md-4">
											
				</div>
			</div>
			
				<br>
				<br>
										
			
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
							$noofrows=0;
							$sql7="SELECT * FROM boq_details WHERE boqmaster_key='$boq_key' AND status=0";
							$result7 = mysqli_query($link,$sql7);
							$noofrows=mysqli_num_rows($result7);
							$i2=0;
								if($noofrows>0){
									while($row7=mysqli_fetch_array($result7)){	
											$ns1="txt_itemcode".$i2;
											$ns2="txt_itemnme".$i2;
											$ns3="txt_price".$i2;
											$ns4="txt_qty".$i2;
											$ns5="txt_total".$i2;
											$ns6="txt_keyos".$i2;
											
											$nhj2=$row7['price']*$row7['qty'];
								?>	
											<tr>
													<td>
													<input type="hidden" class="form-control input-sm" name="<?php echo $ns6;?>" id="<?php echo $ns6;?>" value="<?php echo $row7['boqdetail_key'];?>">
													<input type="text" class="form-control input-sm" name="<?php echo $ns1;?>" id="<?php echo $ns1;?>" value="<?php echo $row7['item_code'];?>"></td>
													<td><input type="text" class="form-control input-sm" name="<?php echo $ns2;?>" id="<?php echo $ns2;?>" value="<?php echo $row7['item_nme'];?>"></td>
													<td><input type="text" class="form-control input-sm" name="<?php echo $ns3;?>" id="<?php echo $ns3;?>" value="<?php echo $row7['price'];?>"></td>
													<td><input type="text" class="form-control input-sm" name="<?php echo $ns4;?>" id="<?php echo $ns4;?>" value="<?php echo $row7['qty'];?>"></td>
													<td align="right"><div id="<?php echo $ns5;?>"><?php echo number_format($nhj2,2) ?></div></td>						
											</tr>
								<?php
										$i2++;
									}
								}
									
								for($i1=$i2;$i1<$_GET['n'];$i1++){
										$ns1="txt_itemcode".$i1;
										$ns2="txt_itemnme".$i1;
										$ns3="txt_price".$i1;
										$ns4="txt_qty".$i1;
										$ns5="txt_total".$i1;
								?>
											<tr>
												<td><input type="text" class="form-control input-sm" name="<?php echo $ns1;?>" id="<?php echo $ns1;?>"></td>
												<td><input type="text" class="form-control input-sm" name="<?php echo $ns2;?>" id="<?php echo $ns2;?>"></td>
												<td><input type="text" class="form-control input-sm" name="<?php echo $ns3;?>" id="<?php echo $ns3;?>"></td>
												<td><input type="text" class="form-control input-sm" name="<?php echo $ns4;?>" id="<?php echo $ns4;?>"></td>
												<td align="right"><div id="<?php echo $ns5;?>"></div></td>						
											</tr>
								<?php		
								}
								
								?>				
					</tbody>
				</table>
		
		</br>
		</br>	
		<?php
			}
			else if($_GET['b']>1){
		?>
				
			<div class="form-group">
				<label for="sel1">Supplier</label>
				<select class="form-control input-sm"  name="sele_supplier" required>
					<?php
						echo '<option value="" disabled selected hidden>Please Choose.............</option>';
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
															WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='1' AND boq_details.status=0";
							$result11 = mysqli_query($link,$sql11);
							while($row11=mysqli_fetch_array($result11)){
										$nj1="txt_itemcode".$r;
										$nj2="txt_itemnme".$r;
										$nj3="txt_price".$r;
										$nj4="txt_qty".$r;
										$nj5="txt_total".$r;
										
										
						?>
								<tr>
									<td><input type="text" class="form-control input-sm" name="<?php echo $nj1;?>" id="<?php echo $nj1;?>" value="<?php echo $row11['item_code']; ?>"></td>
									<td><input type="text" class="form-control input-sm" name="<?php echo $nj2;?>" id="<?php echo $nj2;?>" value="<?php echo $row11['item_nme']; ?>"></td>
									<td><input type="text" class="form-control input-sm" name="<?php echo $nj3;?>" id="<?php echo $nj3;?>"></td>
									<td><input type="text" class="form-control input-sm" name="<?php echo $nj4;?>" id="<?php echo $nj4;?>"></td>
									<td align="right"><div id="<?php echo $nj5;?>"></div></td>							
								</tr>
						<?php
								$r++;
							}
						?>
					</tbody>
				</table>
		<?php
			}
			else{
		?>
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
							<tr>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>						
							</tr>
							<tr>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>						
							</tr>
							<tr>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>						
							</tr>
							<tr>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>
									<td><input type="text" class="form-control input-sm"></td>						
							</tr>
					</tbody>
				</table>
		
		<?php
			}
		?>
		<div class="col-md-4">
			<button type="submit" class="btn btn-primary btn-lg" name="btn_submitboq">Submit a BOQ</button>							
		</div>
		<div class="col-md-4">
		
		</div>
		<div class="col-md-4">
			<button type="submit" class="btn btn-primary btn-lg" id="btn_finishboq" name="btn_finishboq">Finish</button>
		</div>
	</form>	




<!-- Footer -->

<?php include("includes/footer.php");?>
	<script type="text/javascript" src="js/jquery3.3.1.js"></script>
	<script type="text/javascript">
		<?php
			if(isset($_GET['p'])){
				if($_GET['b']==1){
					for($b1=0;$b1<$_GET['n'];$b1++){
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
					}
				}
				if($_GET['b']>1){
					$b1=0;
					$sql4="SELECT * FROM boq_master INNER JOIN boq_details ON boq_master.boqmas_key=boq_details.boqmaster_key
															WHERE boq_master.projmas_key='$_GET[p]' AND boq_master.boq_code='1' AND boq_details.status=0";
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
			}
		?>
		
		$('#btn_finishboq').click(function() {
		  
			$('[name=sele_supplier]').removeAttr('required');
			$('form').submit();
		  
		});
	</script>
	
	
</body>
</html>