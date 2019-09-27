<!DOCTYPE html>

<?php include("../includes/a_config.php");?>
<?php 
include("../includes/conn.php");
include("../includes/sessionconfig.php");
?>

<?php
	$sql1="SELECT * FROM event_calender_master ORDER BY start DESC";
	$result1 = mysqli_query($link,$sql1);
	while($row1=mysqli_fetch_array($result1)){
		if(isset($_POST['btn_caleventdel'.$row1['event_calender_key']])){
			$d1=$_POST["txt_key".$row1['event_calender_key']];
			
			$sql2="DELETE FROM event_calender_master WHERE event_calender_key='$d1'";
			if(mysqli_query($link,$sql2)){
				echo "<script>
					alert('Successfully Delete Calender Event');
					window.location.href='remove_events.php';			
				</script>";
			}
		}
	}
?>
<html>

<head>

	<?php include("../includes/head-tag-contents.php");?>

</head>
<body>
	
	<?php include("../includes/design-top.php");?>
	<?php //include("../includes/navigation.php");?>
	<div class="container" id="main-content">
		<div class="row">
				<div class="col-md-2">
				
				</div>
                <div class="col-md-8">
					
								<div class="col-md-2">
									<a href="index.php" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Event Calender</div></a>	
								</div>
								<div class="col-md-8">
									
									
									
								</div>
								
						
				</div>
		</div>

		<div class="row">
				<div class="col-md-2">
						
				</div>
				<div class="col-md-8">
					<label for="ex3">Event Calender</label>
					<br>
					<form name="f1" method="post">
						<table class="table table-striped table-bordered display" width="100%">
									<thead>
										<tr>
											<th>Title</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
											
											$sql5="SELECT * FROM event_calender_master ORDER BY start DESC";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){	
										?>
										<tr>
											<td>
											<input type="hidden" class="form-control input-sm" name="<?php echo "txt_key".$row5['event_calender_key']; ?>" value="<?php echo $row5['event_calender_key'];  ?>">
											<?php echo $row5['title'];?></td>
											<td><?php echo $row5['start'];?></td>
											<td><?php echo $row5['end'];?></td>
											<td><input type="submit" class="btn btn-danger btn-sm btn-block" name="<?php echo "btn_caleventdel".$row5['event_calender_key'];?>" value="Delete"></td>
											
										</tr>
										<?php
											}
										?>
									</tbody>
						</table>
					</form>
				</div>
		</div>
		<?php include("../includes/footer.php");?>
	</div>
</body>


</html>