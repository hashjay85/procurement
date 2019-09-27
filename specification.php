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
		
		if($a2=='NCB'){
				echo "<script>
						alert('Specification Started');
						window.location.href='ncb_specification_upload.php?p=$a1';
					</script>";
		}
		if($a2=='Shopping'){
				echo "<script>
						alert('Specification Started');
						window.location.href='shp_specification_upload.php?p=$a1';
					</script>";	
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