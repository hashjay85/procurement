<?php include("includes/a_config.php");?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");
?>
<?php

$cur_dte=date("Y-m-d");

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
	
	<h2>Welcome Procurement Management System</h2>
	<p>This project was developped for the university of Colombo School of computing</p>

	<p> Main Expectation of this System is to simplify the Procurementsystem and systematic the same. Through the system we are expecting to evaluate BOQs, Products and servives </p>
	
	<div class="row">
		<div class="col-md-12">
			<section class="panel panel-primary  panel-transparent ">
				 <div class="panel-heading">
					<label style="font-size:20px;">Direct Purchasing </label>
				 </div>
				<div class="panel-body">
					
						<table id="tb1" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th width="20%">Date </th>
										<th width="20%">Project ID</th>
										<th width="30%">Project Name</th>
										<th width="30%">Supplier Name</th>
										
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th width="20%">Date </th>
										<th width="20%">Project ID</th>
										<th width="30%">Project Name</th>
										<th width="30%">Supplier Name</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
										$sql1="SELECT * FROM direct_purches_master INNER JOIN supplier_master
												ON direct_purches_master.supplier_key=supplier_master.supplierms_key
												WHERE 
												direct_purches_master.status=0";
										$result1 = mysqli_query($link,$sql1);
										while($row1=mysqli_fetch_array($result1)){
									?>	
											<tr>
												<td width="20%"><?php echo $row1['date']; ?></td>
												<td width="20%"><a href="direct_purchase_ed.php?p=<?php echo $row1['direct_mas_key']; ?>"><?php echo $row1['direct_id']; ?></a></td>
												<td width="20%"><?php echo $row1['heading']; ?></td>
												<td width="20%"><?php echo $row1['supplier_name'];?></td>
												
											</tr>	
									<?php
											
										}
									?>
								</tbody>
						</table>
				</div>
			</section>
		</div>
	</div>
	<!--initialize Projects-->
	
	
	
	
</div>

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
					$('#tb2 tfoot th').each( function () {
							var title = $(this).text();
							$(this).html( '<input type="text" placeholder="'+title+'" style="color:black" class="form-control input-sm" />' );
						} );
					 
						// DataTable
						var table = $('#tb2').DataTable();
					 
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
//............................................................. table 2 Jaquery
						$('#tb3 tfoot th').each( function () {
							var title = $(this).text();
							$(this).html( '<input type="text" placeholder="'+title+'" style="color:black" class="form-control input-sm" />' );
						} );
					 
						// DataTable
						var table = $('#tb3').DataTable();
					 
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
//............................................................. table 3 Jaquery
			});
</script>
</body>
</html>