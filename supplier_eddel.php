<?php include("includes/a_config.php");?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");
?>

<?php
	
	$sql1="SELECT * FROM supplier_master WHERE status=0 ORDER BY supplier_name ASC";
	$result1 = mysqli_query($link,$sql1);
	while($row1=mysqli_fetch_array($result1)){
		
		if(isset($_POST['btn_supupd'.$row1['supplierms_key']])){
			$d1=$_POST["txt_supkey".$row1['supplierms_key']];
			$d2=$_POST["txt_address".$row1['supplierms_key']];
			$d3=$_POST["txt_tpno".$row1['supplierms_key']];
			$d4=$_POST["txt_faxno".$row1['supplierms_key']];
			$d5=$_POST["txt_email".$row1['supplierms_key']];
			
			$sql2="UPDATE supplier_master SET
											address='$d2',
											tp_no='$d3',
											fax_no='$d4',
											email_address='$d5'
											WHERE supplierms_key='$d1'";
			if(mysqli_query($link,$sql2)){
				echo "<script>
					alert('Successfully Update Supplier Information');
					window.location.href='supplier_eddel.php';			
				</script>";
			}
		}
		
		if(isset($_POST['btn_supdel'.$row1['supplierms_key']])){
			$d1=$_POST["txt_supkey".$row1['supplierms_key']];
			
			$sql3="UPDATE supplier_master SET
											status=1
											WHERE supplierms_key='$d1'";
			if(mysqli_query($link,$sql3)){
				echo "<script>
					alert('Successfully Remove Supplier Information');
					window.location.href='supplier_eddel.php';			
				</script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
	
	<link rel="stylesheet" type="text/css" href="datatable/dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="datatable/jquery-ui.css"/>
	<script type="text/javascript" src="datatable/dataTables.min.js"></script> 

</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
<form method="POST" name="f1" >
		<div class="row">
				
				<div class="col-md-12">
					<label for="ex3">Edit and Delete Supplier Information</label>
					<br>
					<form name="f1" method="post">
						<table id="tb1" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Registration No</th>
											<th>Supplier Name</th>
											<th>Address</th>
											<th>Telephone No</th>
											<th>Fax No</th>
											<th>Email</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Registration No</th>
											<th>Supplier Name</th>
											<th>Address</th>
											<th>Telephone No</th>
											<th>Fax No</th>
											<th>Email</th>
											<th>Action</th>
											
										</tr>
									</tfoot>
									<tbody>
										<?php
											
											$sql5="SELECT * FROM supplier_master WHERE status=0 ORDER BY supplier_name ASC";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){	
										?>
										<tr>
											<td>
											<input type="hidden" class="form-control input-sm" name="<?php echo "txt_supkey".$row5['supplierms_key']; ?>" value="<?php echo $row5['supplierms_key'];  ?>">
											<?php echo $row5['registration_no'];?></td>
											<td><?php echo $row5['supplier_name'];?></td>
											<td><textarea name="<?php echo "txt_address".$row5['supplierms_key'];?>" class="form-control input-sm"><?php echo $row5['address'];?></textarea></td>
											<td><input type="text" name="<?php echo "txt_tpno".$row5['supplierms_key'];?>" class="form-control input-sm" value="<?php echo $row5['tp_no'];?>"></td>
											<td><input type="text" name="<?php echo "txt_faxno".$row5['supplierms_key'];?>" class="form-control input-sm" value="<?php echo $row5['fax_no'];?>"></td>
											<td><input type="text" name="<?php echo "txt_email".$row5['supplierms_key'];?>" class="form-control input-sm" value="<?php echo $row5['email_address'];?>"></td>
											<td>
												<input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_supupd".$row5['supplierms_key'];?>" value="Update"><br>
												<input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_supdel".$row5['supplierms_key'];?>" value="Delete">
											</td>
											
										</tr>
										<?php
											}
										?>
									</tbody>
						</table>
					</form>
				</div>
		</div>
</form>

</div>
<!-- Footer -->

<?php include("includes/footer.php");?>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
					$('#tb1 tfoot th').each( function () {
							var title = $(this).text();
							$(this).html( '<input type="text" placeholder="'+title+'" style="color:black" class="form-control input-sm" />' );
						} );
					 
						// DataTable
						var table = $('#tb1').DataTable();
					 
						// Apply the search
						table.columns().every( function () {
							var that = this;
					 
							$( 'input', this.footer() ).on( 'keyup change', function () {
								if ( that.search() !== this.value ) {
									that
										.search( this.value )
										.draw();
								}
							} );
						} );
//............................................................. table 1 Jaquery
			});
</script>

</body>
</html>