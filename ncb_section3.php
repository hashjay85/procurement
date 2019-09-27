<?php
	
	$c40=null;
	
	$sql80="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
	$result80 = mysqli_query($link,$sql80);
	if(mysqli_num_rows($result80)>0){
		while($row80=mysqli_fetch_array($result80)){	
			$c40=$row80['no_of_lots'];
			$c54=$row80['sec4_dte'];
			$c55=$row80['sec4_no'];
			
			$c87=$row80['sec5_manufacturedte'];
			$c88=$row80['sec5_manufactureprocess'];
			$c89=$row80['sec5_nameofmanufactor'];
			$c90=$row80['sec5_typeofmanufactor'];
			$c91=$row80['sec5_fulladdressmanufactor'];
			$c92=$row80['sec5_completenmeofbidder'];
			$c93=$row80['sec5_title'];
			$c94=$row80['sec5_dteofsign'];
			$c95=$row80['sec5_nameofauthperson'];
			$c96=$row80['sec5_discreptionofgood'];
		}
	}
	
	if(isset($_GET['p']) && isset($_GET['t'])){
		if($c40!=null){
			for($i4=1;$i4<=$c40;$i4++){
				
				
				if(isset($_POST["btn_45priceadd".$i4])){
					$c71="txt_item".$i4;
					$c72="txt_qty".$i4;
					$c73="txt_bidbondamou".$i4;
					$c76="txt_sec45key".$i4;
					
					
					$sql86="INSERT INTO ncbsec45_initial_item_details (status,
															   ncbsec45_ini_item_key,
															   project_key,
															   lot_no,
															   item_nme,
															   qty,
															   bidbond_amount,
															   act_person)
													   VALUES (0,
															   NULL,
															   '$_GET[p]',
															   '$_POST[$c76]',
															   '$_POST[$c71]',
															   '$_POST[$c72]',
															   '$_POST[$c73]',
															   '$ses_ukey')";
					if(mysqli_query($link,$sql86)){
						
					}
				}
				
				$sql88="SELECT * FROM ncbsec45_initial_item_details WHERE project_key='$_GET[p]' AND lot_no='$i4' AND status=0";
				$result88 = mysqli_query($link,$sql88);
				while($row88=mysqli_fetch_array($result88)){
					$c80="txt_ed45pricekey".$row88['ncbsec45_ini_item_key'];
					$c81="txt_edqty".$row88['ncbsec45_ini_item_key'];
					$c82="txt_edbidbondamount".$row88['ncbsec45_ini_item_key'];
					$c85="btn_45priceedit".$row88['ncbsec45_ini_item_key'];
					$c86="btn_45pricedel".$row88['ncbsec45_ini_item_key'];
					
					if(isset($_POST[$c85])){
						$sql89="UPDATE ncbsec45_initial_item_details SET 
																qty='$_POST[$c81]',
																bidbond_amount='$_POST[$c82]'
															WHERE ncbsec45_ini_item_key='$_POST[$c80]'";
						if(mysqli_query($link,$sql89)){
							echo "<script>
									alert('Successfully');
							</script>";
						}
					}
					
					if(isset($_POST[$c86])){
						$sql90="UPDATE ncbsec45_initial_item_details SET status=1 WHERE ncbsec45_ini_item_key='$_POST[$c80]'";
						if(mysqli_query($link,$sql90)){
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

<h3>Add Item </h3>
<form name="f80" method="post">

	
	<?php
		if($c40!=null){
			
	?>
			
			<?php
				for($i3=1;$i3<=$c40;$i3++){
			?>
				<div class="panel panel-default">
					<div class="panel-heading"><div style="font-size:15px;font-weight:bold;">Lot No <?php echo $i3; ?></div></div>
					<div class="panel-body">
						<input type="hidden" class="form-control input-sm" name="<?php echo "txt_sec45key".$i3;?>" value="<?php echo $i3; ?>">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th width="45%">Item</th>
										<th width="10%">Qty</th>
										<th width="10%">Bid Bond Amount</th>
										<th width="5%">Action</th>
									</tr>
								</thead>
								<tbody>
									
									<tr>
										<td><input type="text" class="form-control input-sm" name="<?php echo "txt_item".$i3; ?>"></td>
										<td><input type="text" class="form-control input-sm" name="<?php echo "txt_qty".$i3; ?>"></td>
										<td><input type="text" class="form-control input-sm" name="<?php echo "txt_bidbondamou".$i3; ?>"></td>
										<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_45priceadd".$i3;?>" value="Add"></td>
									</tr>
									<?php
										$sql87="SELECT * FROM ncbsec45_initial_item_details WHERE project_key='$_GET[p]' AND lot_no='$i3' AND status=0";
										$result87 = mysqli_query($link,$sql87);
										while($row87=mysqli_fetch_array($result87)){
									?>
											<tr>
												<td>
												<input type="hidden" class="form-control input-sm" name="<?php echo "txt_ed45pricekey".$row87['ncbsec45_ini_item_key']; ?>" value="<?php echo $row87['ncbsec45_ini_item_key'];?>">
												<?php echo $row87['item_nme']; ?></td>
												<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edqty".$row87['ncbsec45_ini_item_key']; ?>" value="<?php echo $row87['qty'];?>"></td>
												<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edbidbondamount".$row87['ncbsec45_ini_item_key']; ?>" value="<?php echo $row87['bidbond_amount'];?>"></td>
												<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_45priceedit".$row87['ncbsec45_ini_item_key'];?>" value="Edit">
													<input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_45pricedel".$row87['ncbsec45_ini_item_key'];?>" value="Delete">
												</td>
											</tr>
									<?php
										}
									?>
								</tbody>
							</table>
							
					</div>
				</div>
			<?php
				}
			?>
			<br>
	<?php
		}
	?>
	
	<br>
<br>
</form>
<script type="text_javascript">

</script>