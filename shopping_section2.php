<?php
	
	if(isset($_GET['p']) && isset($_GET['t'])){
		
				
				if(isset($_POST['btn_shp_priceadd'])){
					
					$sql86="INSERT INTO shopping_initial_item_details (status,
															   shopping_ini_item_key,
															   project_key,
															   item_nme,
															   qty,
															   completion_dte)
													   VALUES (0,
															   NULL,
															   '$_GET[p]',
															   '$_POST[txt_item]',
															   '$_POST[txt_qty]',
															   '$_POST[txt_completedte]'
															   )";
					if(mysqli_query($link,$sql86)){
						
					}
				}
				
				$sql88="SELECT * FROM shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
				$result88 = mysqli_query($link,$sql88);
				while($row88=mysqli_fetch_array($result88)){
					$c80="txt_ed45pricekey".$row88['shopping_ini_item_key'];
					$c81="txt_edqty".$row88['shopping_ini_item_key'];
					$c82="txt_edcompletedate".$row88['shopping_ini_item_key'];
					$c85="btn_45priceedit".$row88['shopping_ini_item_key'];
					$c86="btn_45pricedel".$row88['shopping_ini_item_key'];
					
					if(isset($_POST[$c85])){
						$sql89="UPDATE shopping_initial_item_details SET 
																qty='$_POST[$c81]',
																completion_dte='$_POST[$c82]'
															WHERE shopping_ini_item_key='$_POST[$c80]'";
						if(mysqli_query($link,$sql89)){
							echo "<script>
									alert('Successfully Change Item');
							</script>";
						}
					}
					
					if(isset($_POST[$c86])){
						$sql90="UPDATE shopping_initial_item_details SET status=1 WHERE shopping_ini_item_key='$_POST[$c80]'";
						if(mysqli_query($link,$sql90)){
							echo "<script>
									alert('Successfully Delete Item');
							</script>";
						}
					}
				}
	}
			

?>
<hr class="style18">

<h3>Add Item </h3>
<form name="f80" method="post">

				<div class="panel panel-default">
					<div class="panel-body">
						
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th width="45%">Item</th>
										<th width="10%">Qty</th>
										<th width="40%">Completion Date</td>
										<th width="5%">Action</th>
									</tr>
								</thead>
								<tbody>
									
									<tr>
										<td><input type="text" class="form-control input-sm" name="<?php echo "txt_item"; ?>"></td>
										<td><input type="text" class="form-control input-sm" name="<?php echo "txt_qty"; ?>"></td>
										<td><input type="text" class="form-control input-sm" name="<?php echo "txt_completedte"; ?>"></td>
										<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_shp_priceadd";?>" value="Add"></td>
									</tr>
									<?php
										$sql87="SELECT * FROM shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
										$result87 = mysqli_query($link,$sql87);
										while($row87=mysqli_fetch_array($result87)){
									?>
											<tr>
												<td>
												<input type="hidden" class="form-control input-sm" name="<?php echo "txt_ed45pricekey".$row87['shopping_ini_item_key']; ?>" value="<?php echo $row87['shopping_ini_item_key'];?>">
												<?php echo $row87['item_nme']; ?></td>
												<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edqty".$row87['shopping_ini_item_key']; ?>" value="<?php echo $row87['qty'];?>"></td>
												<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edcompletedate".$row87['shopping_ini_item_key']; ?>" value="<?php echo $row87['completion_dte'];?>"></td>
												<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_45priceedit".$row87['shopping_ini_item_key'];?>" value="Edit">
													<input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_45pricedel".$row87['shopping_ini_item_key'];?>" value="Delete">
												</td>
											</tr>
									<?php
										}
									?>
								</tbody>
							</table>
							
					</div>
				</div>
			
	
	<br>
<br>
</form>
<script type="text_javascript">

</script>