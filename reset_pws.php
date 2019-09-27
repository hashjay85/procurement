<?php include("includes/a_config.php");?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");

$cur_dte=date("Y-m-d");
?>	

<?php
	$sql1="SELECT * FROM user_master WHERE NOT user_key='$ses_ukey'";
	$result1=mysqli_query($link,$sql1);
	$option1 ="";
	while($row1=mysqli_fetch_array($result1)){
		$option1 = $option1."<option>$row1[user_nme]</option>";
	}
	
	if(isset($_POST['btn_resetpw'])){
		$n1=$_POST['d2'];
		
		
		$pw=MD5($n1);
		$sql3="UPDATE user_master SET password ='$pw' WHERE user_key='$_SESSION[user_keye]'";
		if(mysqli_query($link,$sql3)){
				echo "<script>
						alert('Successfully Reset Password.');
						window.location.href='Index.php';
					</script>";
		}
		
	}
?>

<!DOCTYPE html>
<html>
    <head>
         <?php include("includes/head-tag-contents.php");?>
    </head>
    <body>
        <!-- small navbar -->
       <?php include("includes/design-top.php");?>
		<?php include("includes/navigation.php");?>

		<div class="container" id="main-content">
         
			<div class="row">
				<div class="col-lg-2">
				
				</div>
				<div class="col-lg-8">
					<section class="panel-transparent1">
						<div class="panel-body">
							<form role="form" id="form1" name="form1" method="post" action="">
								
								<div class="form-group" >
									<label class="fheader">Reset Password</label>
									<input type="text" class="form-control input-sm" name="d2" required>
								</div>
								
								<button type="submit" name="btn_resetpw" class="btn btn-lg btn-primary btn-block">Reset Password</button>
							</form>
						</div>
									 
					</section>
				</div>
            </div>
		</div>
    </body>
</html>