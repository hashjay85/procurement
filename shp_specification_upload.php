<?php 
include("includes/a_config.php");
//error_reporting(0);
?>

<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");
require_once __DIR__.'/simplexlsx/src/SimpleXLSX.php';
?>


<?php
	
		
		$sql102="SELECT * FROM  shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
		$result102 = mysqli_query($link,$sql102);
		while($row102=mysqli_fetch_array($result102)){		
			
		
			$a4="btn_add".$row102['shopping_ini_item_key'];
			$a3="txt_itemkey".$row102['shopping_ini_item_key'];
			$a5="fileupload".$row102['shopping_ini_item_key'];
			
			if(isset($_POST[$a4])){
				if (isset($_FILES[$a5])) {
	
					if ( $xlsx = SimpleXLSX::parse( $_FILES[$a5]['tmp_name'] ) ) {

					
						list( $cols, ) = $xlsx->dimension();

						foreach ( $xlsx->rows() as $k => $r ) {
							//		if ($k == 0) continue; // skip first row
							$sql103="INSERT INTO shopping_itemspec_details (status,
																shopping_itemspec_key,
																project_key,
																item_key,
																specification_detail,
																requirement,
																act_person
																)
																VALUES (
																0,
																NULL,
																'$_GET[p]',
																'$_POST[$a3]',
																'$r[0]',
																'$r[1]',
																'$ses_ukey')";
							mysqli_query($link,$sql103);
							
						}
					
					} else {
						echo SimpleXLSX::parseError();
					}
				}
				
				echo "<script>
						alert('Excel File Upload Successfully');
						window.location.href='shp_specification_upload.php?p=$_GET[p]';
				</script>";
			}
			
			$sql105="SELECT * FROM shopping_itemspec_details WHERE project_key='$_GET[p]' AND item_key='$row102[shopping_ini_item_key]' AND status=0";
			$result105 = mysqli_query($link,$sql105);
			while($row105=mysqli_fetch_array($result105)){
				$b1="txt_itemspeckey".$row105['shopping_itemspec_key'];
				$b2="txt_edspecification".$row105['shopping_itemspec_key'];
				$b6="txt_edminrequirement".$row105['shopping_itemspec_key'];
				$b4="btn_edit".$row105['shopping_itemspec_key'];
				$b5="btn_del".$row105['shopping_itemspec_key'];
				
				if(isset($_POST[$b4])){
					$sql106="UPDATE shopping_itemspec_details SET
																specification_detail='$_POST[$b2]',
																requirement='$_POST[$b6]'
															WHERE 
																shopping_itemspec_key='$_POST[$b1]'";
					if(mysqli_query($link,$sql106)){
						echo "<script>
										alert('Successfully Update Information');
							</script>";
					}
				}
				
				if(isset($_POST[$b5])){
					$sql107="UPDATE shopping_itemspec_details SET
																status=1
															WHERE 
																shopping_itemspec_key='$_POST[$b1]'";
					if(mysqli_query($link,$sql107)){
						echo "<script>
										alert('Successfully Delete Information');
							</script>";
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

	<div class="row">
				<div class="col-md-2">
				
				</div>
                <div class="col-md-8">
					<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
								<div class="col-md-2">
										<a href="documentation.php?p=<?php echo $_GET['p']; ?>&t=Shopping" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Previous</div></a>
								</div>
								<div class="col-md-8">
									
									<div style="font-size:20px; color:green; font-weight:bold;" align="center"> Specification Details </div>
									
								</div>
								<div class="col-md-2">
										<a href="upload_documents.php?p=<?php echo $_GET['p'];?>&t=Shopping" class="btn btn-warning btn-block"><div style="font-size:20px; font-weight:bold;">Next &raquo;</div></a>
								</div>
							</div>
					</section>
				 </div>
	</div>
	
	
	<form name="f1" method="post"  enctype="multipart/form-data">
				<div class="panel panel-default">
					
					<div class="panel-body">
						
						<?php
						$sql101="SELECT * FROM shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
						$result101 = mysqli_query($link,$sql101);
						while($row101=mysqli_fetch_array($result101)){	
						?>
								<h3>SPECIFICATION FOR <?php echo strtoupper($row101['item_nme'])." - ".$row101['qty'] ?>NOS</h3>
								<input type="hidden" class="form-control input-sm" name="<?php echo "txt_itemkey".$row101['shopping_ini_item_key'];?>" value="<?php echo $row101['shopping_ini_item_key']; ?>">
								<?php
									$sql104="SELECT * FROM shopping_itemspec_details WHERE 
																						project_key='$_GET[p]' AND  
																						item_key='$row101[shopping_ini_item_key]' AND 
																						status=0";
									$result104 = mysqli_query($link,$sql104);
									if(mysqli_num_rows($result104)==0){
								?>	
										<div class="form-group">
											<label for="comment">Upload Excel File</label>
										</div>
										
										<div class="form-group">
											<input type="file" name="<?php echo "fileupload".$row101['shopping_ini_item_key']; ?>" class="input-large">
										</div>
										
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_add".$row101['shopping_ini_item_key'];?>" value="Add">
										</div>
								<?php
									}
									else{
								?>
									<table width="100%" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th width="30%">Specification</th>
												<th width="53%">Minimum Requirement</th>
												<th width="6%">Action</th>
											</tr>
										</thead>
										<tbody>
								<?php
										while($row104=mysqli_fetch_array($result104)){
								?>
									
												<tr>
														<td>
														<input type="hidden" class="form-control input-sm" name="<?php echo "txt_itemspeckey".$row104['shopping_itemspec_key'];?>" value="<?php echo $row104['shopping_itemspec_key']; ?>">
														<textarea class="form-control input-sm" name="<?php echo "txt_edspecification".$row104['shopping_itemspec_key']; ?>"><?php echo $row104['specification_detail']; ?></textarea></td>
														<td><textarea class="form-control input-sm" name="<?php echo "txt_edminrequirement".$row104['shopping_itemspec_key']; ?>"><?php echo $row104['requirement']; ?></textarea></td>
														<td><input type="submit" class="btn btn-success btn-sm btn-block" name="<?php echo "btn_edit".$row104['shopping_itemspec_key'];?>" value="Edit">
															<input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_del".$row104['shopping_itemspec_key'];?>" value="Delete"></td>
												</tr>
								<?php
										}
								?>
										</tbody>
									</table>
								<?php
									}
								?>
						<?php
						}
						?>
					</div>
				</div>
	</form>

</div>

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