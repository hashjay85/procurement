<?php
	
	$b40=null;
	
	$sql60="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
	$result60 = mysqli_query($link,$sql60);
	if(mysqli_num_rows($result60)>0){
		while($row60=mysqli_fetch_array($result60)){	
			$b40=$row60['no_of_lots'];
			$b49=$row60['sec3_fincapable'];
		}
	}
	
	if(isset($_GET['p']) && isset($_GET['t'])){
		if($b40!=null){
			for($i2=1;$i2<=$b40;$i2++){
				if(isset($_POST["btn_add".$i2])){
					
					$b42="txt_sec2key".$i2;
					$b43="txt_headinglots".$i2;
					$b44="txt_expreanceyer".$i2;
					$b45="txt_expireancehandle".$i2;
					$b46="txt_tecnicalsupport".$i2;
					$b47="txt_manufactureauth".$i2;
					$b48="txt_compwarranty".$i2;
					
					$sql62="SELECT * FROM ncbsec03_details WHERE project_key='$_GET[p]' AND lot_no='$_POST[$b42]'";
					$result62 = mysqli_query($link,$sql62);
					if(mysqli_num_rows($result62)==0){
						
						$sql63="INSERT INTO ncbsec03_details (status,
															ncbsec03_details_key,
															project_key,
															lot_no,
															heading_lots,
															expreance_yer,
															expireance_handle,
															tecnical_support,
															manufacture_auth,
															comp_warranty,
															act_person) VALUES
															(0,
															NULL,
															'$_GET[p]',
															'$_POST[$b42]',
															'$_POST[$b43]',
															'$_POST[$b44]',
															'$_POST[$b45]',
															'$_POST[$b46]',
															'$_POST[$b47]',
															'$_POST[$b48]',
															'$ses_ukey')";
						if(mysqli_query($link,$sql63)){
							
							$sql64="UPDATE ncb_details SET sec3_fincapable='$_POST[txt_fincapable]' WHERE project_key='$_GET[p]' AND status=0";
							mysqli_query($link,$sql64);
							
							echo "<script>
									alert('Successfully');
							</script>";
						}
					}
					else{
						
						$sql65="UPDATE ncbsec03_details SET 
														heading_lots='$_POST[$b43]',
														expreance_yer ='$_POST[$b44]',
														expireance_handle='$_POST[$b45]',
														tecnical_support='$_POST[$b46]',
														manufacture_auth='$_POST[$b47]',
														comp_warranty='$_POST[$b48]',
														act_person='$ses_ukey'
													WHERE project_key='$_GET[p]' AND lot_no='$_POST[$b42]' AND status=0";
						if(mysqli_query($link,$sql65)){
							
							$sql64="UPDATE ncb_details SET sec3_fincapable='$_POST[txt_fincapable]' WHERE project_key='$_GET[p]' AND status=0";
							mysqli_query($link,$sql64);
							
							echo "<script>
									alert('Successfully');
							</script>";
						}
					}
				}
			}
		}
	
	}
	
	
	

?>
<hr class="style18">

<h3> Section III - Evaluation and Qualification Criteria </h3>	
<form name="f60" method="post">

	
	<?php
		if($b40!=null){
	?>
			<div class="form-group">
				<label for="comment">Financial Capability</label>
				<input type="text" class="form-control input-sm" name="txt_fincapable" value="<?php echo $b49; ?>">
			</div> 
			<hr class="style18">
			
			 <label for="comment">Post Qualification Requirements </label>
			 
			<?php
				for($i1=1;$i1<=$b40;$i1++){
			?>
					<?php 
					$sql61="SELECT * FROM ncbsec03_details WHERE project_key='$_GET[p]' AND lot_no='$i1' AND status=0";
					$result61 = mysqli_query($link,$sql61);
					if(mysqli_num_rows($result61)==0){
					?>
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>
										<input type="hidden" class="form-control input-sm" name="<?php echo "txt_sec2key".$i1;?>" value="<?php echo $i1; ?>">
										<div align="center" style="font-size:20px;font-weight:bold">Lot No <?php echo $i1; ?></div><br>
										<input type="text" class="form-control input-sm" name="<?php echo "txt_headinglots".$i1;?>" >
										
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_expreanceyer".$i1; ?>" placeholder="experience in years"></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_expireancehandle".$i1; ?>" placeholder="experience of handling 5 Mn worth of works "></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_tecnicalsupport".$i1; ?>" placeholder="Technical support and staff"></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_manufactureauth".$i1; ?>" placeholder="Manufacturer authorization"></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_compwarranty".$i1; ?>" placeholder="comprehensive warranty"></textarea></td>
								</tr>
								<tr>
									<td><input type="submit" class="btn btn-danger btn-lg btn-block" name="<?php echo "btn_add".$i1; ?>" value="Add"></td>
								</tr>
							</tbody>
						</table>
						<br>
					<?php
					}
					else{
						while($row61=mysqli_fetch_array($result61)){	
					?>
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>
										<input type="hidden" class="form-control input-sm" name="<?php echo "txt_sec2key".$i1;?>" value="<?php echo $i1; ?>">
										<div align="center" style="font-size:20px;font-weight:bold">Lot No <?php echo $i1; ?></div><br>
										<input type="text" class="form-control input-sm" name="<?php echo "txt_headinglots".$i1;?>" value="<?php echo $row61['heading_lots']; ?>">
										
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_expreanceyer".$i1; ?>" placeholder="experience in years"><?php echo $row61['expreance_yer']; ?></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_expireancehandle".$i1; ?>" placeholder="experience of handling 5 Mn worth of works "><?php echo $row61['expireance_handle']; ?></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_tecnicalsupport".$i1; ?>" placeholder="Technical support and staff"><?php echo $row61['tecnical_support']; ?></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_manufactureauth".$i1; ?>" placeholder="Manufacturer authorization"><?php echo $row61['manufacture_auth']; ?></textarea></td>
								</tr>
								<tr>
									<td><textarea class="form-control input-sm" name="<?php echo "txt_compwarranty".$i1; ?>" placeholder="comprehensive warranty"><?php echo $row61['comp_warranty']; ?></textarea></td>
								</tr>
								<tr>
									<td><input type="submit" class="btn btn-primary btn-lg btn-block" name="<?php echo "btn_add".$i1; ?>" value="Change"></td>
								</tr>
							</tbody>
						</table>
						<br>
					<?php
						}
					}
					?>
			<?php
				}
			?>
	<?php
		}
	?>
	
	<br>
<br>
</form>
<script type="text_javascript">

</script>