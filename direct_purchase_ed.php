<?php 
include("includes/a_config.php");
include("includes/conn.php");
include("includes/sessionconfig.php");?>


<?php
	$cur_dte=date("Y-m-d");
	$cr_yer=date("Y");
	
	if(isset($_POST['btn_adddirectpurches'])){
		
		
		$sql7="SELECT MAX(direct_mas_key)AS maxprojkeyos FROM direct_purches_master";
		$result7 = mysqli_query($link,$sql7);
		while($row7=mysqli_fetch_array($result7)){
			$maxprojkeyos=$row7['maxprojkeyos'];
		}
		$nextprojkey=$maxprojkeyos+1;
		$new_code="UCSC|PROC|D|".$cr_yer."|".$nextprojkey;
		
		
		$sql1="INSERT INTO direct_purches_master (status,direct_mas_key,date,direct_id,heading,supplier_key)
										VALUES(0,NULL,'$_POST[txt_dte]','$new_code','$_POST[txt_pronme]','$_POST[sele_supplier]')";
										
		if(mysqli_query($link,$sql1)){
			$sql2="SELECT * FROM direct_purches_master WHERE date='$_POST[txt_dte]' AND heading='$_POST[txt_pronme]' AND supplier_key='$_POST[sele_supplier]' AND status=0";
			$result2 = mysqli_query($link,$sql2);
			while($row2=mysqli_fetch_array($result2)){
				 	$p_id=$row2['direct_mas_key'];
			}
			
			echo "<script>
						alert('Process Started');
						window.location.href='direct_purchase.php?p=$p_id';
			</script>";
		}
	}

	if(isset($_GET['p'])){
	
		if(isset($_POST['btn_dir_add'])){
						
			$sql86="INSERT INTO direct_item_master (status,
													dir_item_key,
													dir_master_key,
													item_name,
													qty,
													unit_price,
													total_amount,
													vat)
											VALUES (0,
													NULL,
													'$_GET[p]',
													'$_POST[txt_item]',
													'$_POST[txt_qty]',
													'$_POST[txt_unitprice]',
													'$_POST[txt_totamount]',
													'$_POST[txt_vat]'
													)";
			if(mysqli_query($link,$sql86)){
							
			}
		}
		
		$sql88="SELECT * FROM direct_item_master WHERE dir_master_key='$_GET[p]' AND status=0";
		$result88 = mysqli_query($link,$sql88);
		while($row88=mysqli_fetch_array($result88)){
						$c80="txt_pricekey".$row88['dir_item_key'];
						$c81="txt_edqty".$row88['dir_item_key'];
						$c82="txt_edunitprice".$row88['dir_item_key'];
						$c83="txt_edtotprice".$row88['dir_item_key'];
						$c84="txt_edvat".$row88['dir_item_key'];
						$c85="btn_edit".$row88['dir_item_key'];
						$c86="btn_del".$row88['dir_item_key'];
						
						if(isset($_POST[$c85])){
							$sql89="UPDATE direct_item_master SET 
																	qty='$_POST[$c81]',
																	unit_price='$_POST[$c82]',
																	total_amount='$_POST[$c83]',
																	vat='$_POST[$c84]'
																WHERE dir_item_key='$_POST[$c80]'";
							if(mysqli_query($link,$sql89)){
								echo "<script>
										alert('Successfully Change Item');
								</script>";
							}
						}
						
						if(isset($_POST[$c86])){
							$sql90="UPDATE direct_item_master SET status=1 WHERE dir_item_key='$_POST[$c80]'";
							if(mysqli_query($link,$sql90)){
								echo "<script>
										alert('Successfully Delete Item');
								</script>";
							}
						}
		}
		
	
		if(isset($_POST['btn_remove'])){
			$nm1=$_POST['txt_remove'];
			
			$sql1="UPDATE direct_purches_master SET status=1,remove_reason='$nm1' WHERE direct_mas_key='$_GET[p]'";
			if(mysqli_query($link,$sql1)){
					echo "<script>
						alert('Delete Successfully');
						window.location.href='direct_purchase_menu.php';
					</script>";
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
	<h2>Direct Purchasing</h2>
	
	<?php
	if(isset($_GET['p'])){
		
	}
	else{
	?>
	<form name="f1" method="post">
		<div class="form-group row">
			<label for="ex3">Date</label>     
			<input class="form-control" id="ex3" type="text" name="txt_dte"  required>
		</div>
		<div class="form-group row">
			<label for="ex3">Purchasing Heading</label>     
			<input class="form-control" id="ex3" type="text" name="txt_pronme"  required>
		</div>
		<div class="form-group row">
			
			<label for="sel1">Supplier</label>
			<select class="form-control input-sm"  name="sele_supplier" required>
			<?php
					$sql4="SELECT * FROM supplier_master WHERE status=0";
					$result4 = mysqli_query($link,$sql4);
					while($row4=mysqli_fetch_array($result4)){
						$supp_key=$row4['supplierms_key'];
						$supp_nme=$row4['supplier_name'];
						echo '<option value="" disabled selected hidden>Please Choose.............</option>';
						echo '<option value='.$supp_key.'>'.$supp_nme.'</option>';
					}
			?>
			</select>
		</div>
		<div class="form-group row">
				<input type="submit" class="btn btn-success btn-lg btn-block" name="<?php echo "btn_adddirectpurches";?>" value="New Direct Purchasing">
		</div>
	</form>
	<?php
	}
	?>
	
	<?php
	if(isset($_GET['p'])){
	?>
		<?php
		$sql3="SELECT * FROM direct_purches_master INNER JOIN supplier_master
								ON direct_purches_master.supplier_key=supplier_master.supplierms_key
								WHERE 
								direct_purches_master.direct_mas_key='$_GET[p]' AND direct_purches_master.status=0";
		$result3 = mysqli_query($link,$sql3);
		while($row3=mysqli_fetch_array($result3)){
				$dte=$row3['date'];
				$p_code=$row3['direct_id'];
				$p_heading=$row3['heading'];
				$supp_nme=$row3['supplier_name'];
				$supp_address=$row3['address'];
		}
		?>
			<div class="row">
				<div class="col-md-2">
				
				</div>
                <div class="col-md-8">
					<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
							
								<div align="center" style="font-size:20px;font-weight:bold;">Purchasing ID : <?php echo $p_code ?></div>
								<div align="center" style="font-size:20px;font-weight:bold;"><?php echo $p_heading; ?></div>
								<div align="center" style="font-size:20px;font-weight:bold;">Supplier : <?php echo $supp_nme; ?> </div>
							</div>
					</section>
				 </div>
		    </div>
			
			<h3>Add Item </h3>
			
			<div class="row">
				<div class="col-md-1">
				
				</div>
                <div class="col-md-10">
					<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
							<form name="f80" method="post">
								<table width="100%" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="45%">Item</th>
													<th width="10%">Qty</th>
													<th width="10%">Unit Price (Without VAT)</td>
													<th width="20%">Total Amount Without VAT (Rs)</th>
													<th width="10%">Vat</th>
													<th width="5%">Action</th>
												</tr>
											</thead>
											<tbody>
												
												<tr>
													<td><input type="text" class="form-control input-sm" name="<?php echo "txt_item"; ?>"></td>
													<td><input type="text" class="form-control input-sm" name="<?php echo "txt_qty"; ?>"></td>
													<td><input type="text" class="form-control input-sm" name="<?php echo "txt_unitprice"; ?>"></td>
													<td><input type="text" class="form-control input-sm" name="<?php echo "txt_totamount"; ?>"></td>
													<td><input type="text" class="form-control input-sm" name="<?php echo "txt_vat"; ?>"></td>
													<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_dir_add";?>" value="Add"></td>
												</tr>
												<?php
													$sql87="SELECT * FROM direct_item_master WHERE dir_master_key='$_GET[p]' AND status=0";
													$result87 = mysqli_query($link,$sql87);
													while($row87=mysqli_fetch_array($result87)){
												?>
														<tr>
															<td>
															<input type="hidden" class="form-control input-sm" name="<?php echo "txt_pricekey".$row87['dir_item_key']; ?>" value="<?php echo $row87['dir_item_key'];?>">
															<?php echo $row87['item_name']; ?></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edqty".$row87['dir_item_key']; ?>" value="<?php echo $row87['qty'];?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edunitprice".$row87['dir_item_key']; ?>" value="<?php echo $row87['unit_price'];?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edtotprice".$row87['dir_item_key']; ?>" value="<?php echo $row87['total_amount'];?>"></td>
															<td><input type="text" class="form-control input-sm" name="<?php echo "txt_edvat".$row87['dir_item_key']; ?>" value="<?php echo $row87['vat'];?>"></td>
															<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_edit".$row87['dir_item_key'];?>" value="Edit">
																<input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_del".$row87['dir_item_key'];?>" value="Delete">
															</td>
														</tr>
												<?php
													}
												?>
											</tbody>
								</table>
							</form>
							</div>
					</section>
				</div>
			</div>
			<br>
			
			<a href="direct_report.php?p=<?php echo $_GET['p'];?>"><button type="button" class="btn btn-primary">Generate Direct Purchasing Report</button></a>
			<br>
			<br>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<form name="f2" method="post">	
						<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
								<div class="form-group">
									<label for="sel1">Remove Reason</label>
									<textarea class="form-control input-sm" name="txt_remove" required></textarea>
								</div>
								<div class="form-group">
									
									<button type="submit" class="btn btn-danger btn-block" name="btn_remove">Remove</button>
								</div>
							</div>
						</section>
					</form>
				</div>
			</div>
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