<?php 
include("includes/a_config.php");
//error_reporting(0);
?>

<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");

?>

<?php
	
	
	
	if(isset($_POST['btn_proceed'])){
		$a1=$_POST['sele_sell'];
		
		$sql2="SELECT * FROM project_master WHERE projmas_key='$a1'";
		$result2 = mysqli_query($link,$sql2);
		while($row2=mysqli_fetch_array($result2)){
			 	$a2=$row2['bid_type'];
		}			
		
				echo "<script>
						alert('Upload Document Started');
						window.location.href='upload_documents.php?p=$a1&t=$a2';
					</script>";
			
	}
		
	if(isset($_GET['p']) && isset($_GET['t'])){
		
		$sql3="SELECT * FROM project_master WHERE projmas_key='$_GET[p]'";
		$result3 = mysqli_query($link,$sql3);
		while($row3=mysqli_fetch_array($result3)){	
			$p_id=$row3['project_id'];
			$p_nme=$row3['project_nme'];
			
		}
	}		
	
	if($_GET['t']=='NCB'){
		$target_dir = "upload_doc/";
		if(isset($_POST['btn_adduploaddoc'])){
					$target_file = $target_dir . basename($_FILES["upload_doc"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$check = getimagesize($_FILES["upload_doc"]["tmp_name"]);
					// Check file size
					if ($_FILES["upload_doc"]["size"] > 50000000) {
						echo "<script>
								alert('Sorry, your file is too large.');
							</script>";
						$uploadOk = 0;
					}
					
					// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							$y1= "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							
							$target_new = $target_dir .$_GET['p']."-003-NCBBidding-Document.".$imageFileType;
							if (file_exists($target_new)) {
								move_uploaded_file($_FILES["upload_doc"]["tmp_name"], $target_new);
								
								$sql5="UPDATE upload_documents SET sys_actperson='$ses_ukey' WHERE project_key='$_GET[p]'";
								if(mysqli_query($link,$sql5)){
										
										echo "<script>
												alert('Documents Replace Successfully.');
												window.location.href='upload_documents.php?p=$_GET[p]&t=$_GET[t]';
											</script>";
								}
							}
							else{
								if (move_uploaded_file($_FILES["upload_doc"]["tmp_name"], $target_new)) {
									$gcr=$_GET['p']."-003-NCBBidding-Document.".$imageFileType;
									$sql4="INSERT INTO upload_documents (status,uploaddoc_key,project_key,doc_type,doc_nme,sys_actperson)
															VALUES(
															0,
															NULL,
															'$_GET[p]',
															'003-NCB_Bidding_Document',
															'$gcr',
															'$ses_ukey'
															)";
									if(mysqli_query($link,$sql4)){
										
										echo "<script>
												alert('Documents Upload Successfully.');
												window.location.href='upload_documents.php?p=$_GET[p]&t=$_GET[t]';
											</script>";
									}
								}
							}
						}
			
		}
	
	}
	if($_GET['t']=='Shopping'){
		$target_dir = "upload_doc/";
		if(isset($_POST['btn_adduploaddoc'])){
					$target_file = $target_dir . basename($_FILES["upload_doc"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$check = getimagesize($_FILES["upload_doc"]["tmp_name"]);
					// Check file size
					if ($_FILES["upload_doc"]["size"] > 50000000) {
						echo "<script>
								alert('Sorry, your file is too large.');
							</script>";
						$uploadOk = 0;
					}
					
					// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							$y1= "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							
							$target_new = $target_dir .$_GET['p']."-Shopping-Bidding-Document.".$imageFileType;
							if (file_exists($target_new)) {
								move_uploaded_file($_FILES["upload_doc"]["tmp_name"], $target_new);
								
								$sql5="UPDATE upload_documents SET sys_actperson='$ses_ukey' WHERE project_key='$_GET[p]'";
								if(mysqli_query($link,$sql5)){
										
										echo "<script>
												alert('Documents Replace Successfully.');
												window.location.href='upload_documents.php?p=$_GET[p]&t=$_GET[t]';
											</script>";
								}
							}
							else{
								if (move_uploaded_file($_FILES["upload_doc"]["tmp_name"], $target_new)) {
									$gcr=$_GET['p']."-Shopping-Bidding-Document.".$imageFileType;
									$sql4="INSERT INTO upload_documents (status,uploaddoc_key,project_key,doc_type,doc_nme,sys_actperson)
															VALUES(
															0,
															NULL,
															'$_GET[p]',
															'Shopping_Bidding_Document',
															'$gcr',
															'$ses_ukey'
															)";
									if(mysqli_query($link,$sql4)){
										
										echo "<script>
												alert('Documents Upload Successfully.');
												window.location.href='upload_documents.php?p=$_GET[p]&t=$_GET[t]';
											</script>";
									}
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
	
	  <meta charset="utf-8">

		<script type="text/javascript" src="js/jquery3.3.1.js"></script>
	
  
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
	<?php
	if(isset($_GET['p']) && isset($_GET['t'])){
	?>
		<?php
		if($_GET['t']=='NCB'){
		?>
				<div class="row">
						<div class="col-md-2">
						
						</div>
						<div class="col-md-8">
							<section class="panel panel-primary panel-transparent">
									<div class="panel-body">
										<div class="col-md-2">
												<a href="ncb_specification_upload.php?p=<?php echo $_GET['p']; ?>&t=NCB" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Previous</div></a>
										</div>
										<div class="col-md-8">
											
											<div style="font-size:20px; color:green; font-weight:bold;" align="center"> Correct and Upload NCB Document </div>
											
										</div>
										<div class="col-md-2">
												<a href="bid_process.php?p=<?php echo $_GET['p'];?>&t=NCB" class="btn btn-warning btn-block"><div style="font-size:20px; font-weight:bold;">Next &raquo;</div></a>
										</div>
									</div>
							</section>
						 </div>
				</div>
				<br>
				<br>
				<form name="f2" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Upload NCB Bidding Document</label>
						<input type="file" class="form-control input-md" name="upload_doc" required>
					</div>
					<div class="form-group">
						<button type="submit" name="btn_adduploaddoc" class="btn btn-primary btn-lg btn-block">Upload Document</button>
					</div>
				</form>
		<?php
		}
		if($_GET['t']=='Shopping'){
		?>
		
				<div class="row">
						<div class="col-md-2">
						
						</div>
						<div class="col-md-8">
							<section class="panel panel-primary panel-transparent">
									<div class="panel-body">
										<div class="col-md-2">
												<a href="shp_specification_upload.php?p=<?php echo $_GET['p']; ?>&t=Shopping" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Previous</div></a>
										</div>
										<div class="col-md-8">
											
											<div style="font-size:20px; color:green; font-weight:bold;" align="center"> Correct and Upload Shopping Document </div>
											
										</div>
										<div class="col-md-2">
												<a href="shp_bid_process.php?p=<?php echo $_GET['p'];?>&t=Shopping" class="btn btn-warning btn-block"><div style="font-size:20px; font-weight:bold;">Next &raquo;</div></a>
										</div>
									</div>
							</section>
						 </div>
				</div>
				<br>
				<br>
				<form name="f2" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Upload Shopping Bidding Document</label>
						<input type="file" class="form-control input-md" name="upload_doc" required>
					</div>
					<div class="form-group">
						<button type="submit" name="btn_adduploaddoc" class="btn btn-primary btn-lg btn-block">Upload Document</button>
					</div>
				</form>
		
		<?php
		}
		?>
	<?php
	}
	?>
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