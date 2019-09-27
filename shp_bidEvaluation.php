<?php 
include("includes/a_config.php");
include("includes/conn.php");
include("includes/sessionconfig.php");?>


<?php
	$cur_dte=date("Y-m-d");
	
	if(isset($_POST['btn_proceed'])){
		$a1=$_POST['sele_sell'];
		
		$sql8="SELECT * FROM project_master WHERE projmas_key='$a1'";
		$result8 = mysqli_query($link,$sql8);
		while($row8=mysqli_fetch_array($result8)){
			 	$a2=$row8['bid_type'];
		}
		
		if($a2=='NCB'){
			echo "<script>
					window.location.href='bidEvaluation.php?p=$a1&t=$a2';
				</script>";
		}
		if($a2=='Shopping'){
				echo "<script>
						window.location.href='shp_bidEvaluation.php?p=$a1&t=$a2';
					</script>";
		}
		
	}
	
	if(isset($_GET['p'])){
		$sql3="SELECT * FROM project_master WHERE projmas_key='$_GET[p]'";
		$result3 = mysqli_query($link,$sql3);
		while($row3=mysqli_fetch_array($result3)){	
			$p_id=$row3['project_id'];
			$p_nme=$row3['project_nme'];
			
		}
		
		if($_GET['t']=='Shopping'){
			
			$s=0;
			$sql2="SELECT supplier_key,SUM(total_price_withoutvat) AS f1 FROM shopping_item_bid_details WHERE  project_key='$_GET[p]' AND status=0 GROUP BY supplier_key ORDER BY f1 ASC";
			$result2 = mysqli_query($link,$sql2);
			while($row2=mysqli_fetch_array($result2)){
				
				$s++;
				
				if(isset($_POST['btn_eveluateadd'.$s])){
					
					$d1=$_POST["txt_brand".$s];
					$d2=$_POST["txt_rank".$s];
					$d3=$_POST["txt_suppkey".$s];
					
					
					$sql4="SELECT * FROM shopping_bid_eveluate_details WHERE project_key='$_GET[p]' AND supplier_key='$d3' AND status=0";
					$result4 = mysqli_query($link,$sql4);
					if(mysqli_num_rows($result4)==0){
						
						if($s==1){
							$sql12="INSERT INTO shopping_bid_eveluate_details(status,shp_bid_eveluate_dtlkey,project_key,supplier_key,brand,rank,lowest_status)
													VALUES (0,NULL,'$_GET[p]','$d3','$d1','$d2',1)";
						}
						else{
							$sql12="INSERT INTO shopping_bid_eveluate_details(status,shp_bid_eveluate_dtlkey,project_key,supplier_key,brand,rank)
													VALUES (0,NULL,'$_GET[p]','$d3','$d1','$d2')";
						}
						if(mysqli_query($link,$sql12)){
							echo "<script>
									alert('Successfully Added Information');
									
								</script>";
						}
						else{
							echo "<script>
									alert('Execute Error');
								</script>";
						}
					}
					else{
						$sql6="UPDATE shopping_bid_eveluate_details SET
																		brand='$d1',
																		rank='$d2'
																	WHERE project_key='$_GET[p]' AND
																		supplier_key='$d3' AND 
																		status=0";
						if(mysqli_query($link,$sql6)){
							echo "<script>
									alert('Successfully Update Information');
									
								</script>";
						}
						else{
							echo "<script>
									alert('Execute Error');
								</script>";
						}
					}
					
					
				}
			}
			
			if(isset($_POST['btn_rejectbidder'])){
				
				$sql16="UPDATE shopping_bid_eveluate_details SET reject_reason='$_POST[txt_rejectreason]' 
											WHERE project_key='$_GET[p]' AND supplier_key='$_POST[txt_rejectsuppkey]' AND status=0";
				if(mysqli_query($link,$sql16)){
							echo "<script>
									alert('Successfully Update Information');
									
								</script>";
				}
				else{
							echo "<script>
									alert('Execute Error');
								</script>";
				}
				
			}
			
			if(isset($_POST['btn_selectbidder'])){
				
				$sql18="UPDATE shopping_bid_eveluate_details SET reason_recommended='$_POST[txt_recommededreason]' 
											WHERE project_key='$_GET[p]' AND supplier_key='$_POST[txt_recommendedsuppkey]' AND status=0";
				if(mysqli_query($link,$sql18)){
							echo "<script>
									alert('Successfully Update Information');
									
								</script>";
				}
				else{
							echo "<script>
									alert('Execute Error');
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
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>


<div class="container" id="main-content">
	<h2>Bid Evaluation Form</h2>
	
	<form name="f1" method="post" >
		<div class="form-group">
			<label for="sel1">Select the Project ID</label>
			<select class="form-control input-sm" id="sel1" name="sele_sell" required>
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
<!-- Pre Process --> 
  <?php
	if(isset($_GET['p'])&& isset($_GET['t'])){
		if($_GET['t']=='Shopping'){
  ?>
			<div class="row">
					<div class="col-md-2">
					
					</div>
					<div class="col-md-8">
						<section class="panel panel-primary panel-transparent">
								<div class="panel-body">
									<div class="col-md-2">
											<a href="shp_bid_process.php?p=<?php echo $_GET['p']; ?>&t=Shopping" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Previous</div></a>
									</div>
									<div class="col-md-8">
										
										<div style="font-size:20px; color:green; font-weight:bold;" align="center"> Bid Evaluation </div>
										
									</div>
									<div class="col-md-2">
										
									</div>
								</div>
						</section>
					 </div>
			</div>
			
			
			<div class="row">
				<div class="col-md-2">
						
				</div>
				<div class="col-md-8">
					<label for="ex3">Committee Members</label>
					<br>
					<table class="table table-striped table-bordered display" width="100%">
								<thead>
									<tr>
										<th>Full Name</th>
										<th>Designation</th>
										<th>Department</th>
										<th>Committee</th>
										<th>Capacity</th>
									</tr>
								</thead>
								<tbody>
									<?php
										
										$sql5="SELECT * FROM appoint_tec_details INNER JOIN user_master ON appoint_tec_details.user_key=user_master.user_key
																				 WHERE appoint_tec_details.project_key='$_GET[p]' AND  appoint_tec_details.status=0 AND user_master.status=0";
										$result5 = mysqli_query($link,$sql5);
										while($row5=mysqli_fetch_array($result5)){	
									?>
									<tr>
										<td><?php echo $row5['first_name']." ".$row5['last_name'];?></td>
										<td><?php echo $row5['designation'];?></td>
										<td><?php echo $row5['department'];?></td>
										<td><?php echo $row5['committee'];?></td>
										<td><?php if($row5['chairman_appointtec']=="C"){echo "Chairman";}else{echo "Member";}?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
					</table>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-1">
						
				</div>
				<div class="col-md-10">
					<label for="ex3">Bids Received Before Closing Time-Price Scheduled</label>
					<br>
					<form name="f2" method="post">
					<table class="table table-striped table-bordered display" width="100%">
								<thead>
									<tr>
										<th width="5%">S/No</th>
										<th width="30%">Name of the Bidder</th>
										<th width="10%">Qty</th>
										<th width="10%">Unit Price Without VAT (Rs) </th>
										<th width="10%">Total Amount Without VAT </th>
										<th width="15%">Brand </th>
										<th width="10%">Rank </th>
										<th width="10%">Action </th>
									</tr>
								</thead>
								<tbody>
									<?php
										$r=0;
										$sql9="SELECT supplier_key,SUM(total_price_withoutvat) AS f1 FROM shopping_item_bid_details WHERE  project_key='$_GET[p]' AND status=0 GROUP BY supplier_key ORDER BY f1 ASC";
										$result9 = mysqli_query($link,$sql9);
										while($row9=mysqli_fetch_array($result9)){
											
											$r++;
											
											$sql10="SELECT * FROM supplier_master WHERE supplierms_key='$row9[supplier_key]' AND status=0";
											$result10 = mysqli_query($link,$sql10);
											while($row10=mysqli_fetch_array($result10)){
												
												$n1=0;
												$n2=0;
												$n3=0;
												
												$sql11="SELECT SUM(qty) AS totqty,
															   SUM(unit_price_withoutvat) AS totunitpricewithoutvat,
															   SUM(total_price_withoutvat)AS totpricewithoutvat
															FROM shopping_item_bid_details WHERE project_key='$_GET[p]' AND supplier_key='$row9[supplier_key]' AND status=0";
												$result11 = mysqli_query($link,$sql11);
												while($row11=mysqli_fetch_array($result11)){
													$n1=$row11['totqty'];
													$n2=$row11['totunitpricewithoutvat'];
													$n3=$row11['totpricewithoutvat'];
												}
									?>	
											<?php
												$sql17="SELECT * FROM shopping_bid_eveluate_details WHERE 
																									project_key='$_GET[p]' AND 
																									supplier_key='$row9[supplier_key]' AND 
																									status=0";
												$result17 = mysqli_query($link,$sql17);
												if(mysqli_num_rows($result17)==0){
											?>
															<tr <?php if($r==1){ echo "style='background-color:#65e662;'";} ?>>
																<td> <?php echo $r;?>
																	<input type="hidden" class="form-control input-sm" name="<?php echo "txt_suppkey".$r; ?>" value="<?php echo $row9['supplier_key'];?>">
																</td>
																<td> <?php echo $row10['supplier_name'];?></td>
																<td align="right"><?php echo $n1;?></td>
																<td align="right"><?php echo number_format($n2,2);?></td>
																<td align="right"><?php echo number_format($n3,2);?></td>
																<td><input type="text" class="form-control input-sm" name="<?php echo "txt_brand".$r; ?>"></td>
																<td><input type="text" class="form-control input-sm" name="<?php echo "txt_rank".$r; ?>" value="<?php echo $r;?>"></td>
																<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_eveluateadd".$r;?>" value="Add"></td>
															</tr>
									<?php
												}
												else{
													
									?>
														<tr <?php if($r==1){ echo "style='background-color:#65e662;'";} ?>>
																<td> <?php echo $r;?>
																	<input type="hidden" class="form-control input-sm" name="<?php echo "txt_suppkey".$r; ?>" value="<?php echo $row9['supplier_key'];?>">
																</td>
																<td> <?php echo $row10['supplier_name'];?></td>
																<td align="right"><?php echo $n1;?></td>
																<td align="right"><?php echo number_format($n2,2);?></td>
																<td align="right"><?php echo number_format($n3,2);?></td>
																<?php
																while($row17=mysqli_fetch_array($result17)){
																	$edbrk=$row17['brand'];
																	$edrnk=$row17['rank'];
																}
																?>
																<td><input type="text" class="form-control input-sm" name="<?php echo "txt_brand".$r; ?>" value="<?php echo $edbrk;?>"></td>
																<td><input type="text" class="form-control input-sm" name="<?php echo "txt_rank".$r; ?>" value="<?php echo $edrnk;?>"></td>
																<td><input type="submit" class="btn btn-primary btn-sm btn-block" name="<?php echo "btn_eveluateadd".$r;?>" value="Add"></td>
														</tr>
									
									<?php
													
												
												}
												
											}
										}
									?>
								</tbody>
					</table>
					</form>
				</div>
			</div>
			
			<?php
					$sql13="SELECT * FROM shopping_bid_eveluate_details WHERE project_key='$_GET[p]' AND lowest_status=1 AND status=0";
					$result13 = mysqli_query($link,$sql13);
					if(mysqli_num_rows($result13)>0){
			?>
						<?php
						// Reject Reason start
						
						$sql7="SELECT * FROM shopping_bid_eveluate_details WHERE project_key='$_GET[p]' AND lowest_status=1 AND rank=1 AND status=0";
						$result7 = mysqli_query($link,$sql7);
						if(mysqli_num_rows($result7)==0){
							
							$sql14="SELECT * FROM shopping_bid_eveluate_details INNER JOIN supplier_master 
													ON shopping_bid_eveluate_details.supplier_key= supplier_master.supplierms_key
															WHERE 
															shopping_bid_eveluate_details.project_key='$_GET[p]' AND 
															shopping_bid_eveluate_details.lowest_status=1 AND 
															shopping_bid_eveluate_details.status=0";
							$result14 = mysqli_query($link,$sql14);
							while($row14=mysqli_fetch_array($result14)){
								$reject_supplier_key=$row14['supplier_key'];
								$reject_supplier_nme=$row14['supplier_name'];
								$reject_reason=$row14['reject_reason'];
							}
							
							
						?>
						<div class="row">
							<div class="col-md-2">
							
							</div>
							<div class="col-md-8">
								<section class="panel panel-primary panel-transparent">	
									<h3 align="center"> Reasons for rejecting lowest quotations </h3>
									<br>
									<h4 align="center">Lowest Bidder : <?php echo $reject_supplier_nme; ?></h4>
										
										<form name="f3" method="post">
											<div class="form-group">
												<input type="hidden" class="form-control input-sm" name="<?php echo "txt_rejectsuppkey"; ?>" value="<?php echo $reject_supplier_key;?>">
												<label for="formGroupExampleInput2">Reject Reason</label>
												<textarea class="form-control input-sm"  name="txt_rejectreason"><?php if($reject_reason!=NULL){echo $reject_reason;} ?></textarea>
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-danger btn-lg btn-block" name="<?php echo "btn_rejectbidder";?>" value="Reject Reason">
											</div>
										</form>
										
								</section>
							</div>
						</div>
						<?php
						}
						// Reject Reason end
						?>
						
						
						<?php
						// Recommended Reason start
							$sql15="SELECT * FROM shopping_bid_eveluate_details INNER JOIN supplier_master 
													ON shopping_bid_eveluate_details.supplier_key= supplier_master.supplierms_key
															WHERE 
															shopping_bid_eveluate_details.project_key='$_GET[p]' AND 
															shopping_bid_eveluate_details.rank=1 AND 
															shopping_bid_eveluate_details.status=0";
							$result15 = mysqli_query($link,$sql15);
							while($row15=mysqli_fetch_array($result15)){
								$select_supplier_key=$row15['supplier_key'];
								$select_supplier_nme=$row15['supplier_name'];
								$select_reason=$row15['reason_recommended'];
							}
							
							
						?>
						<div class="row">
							<div class="col-md-2">
							
							</div>
							<div class="col-md-8">
								<section class="panel panel-primary panel-transparent">	
									<h3 align="center"> Reasons for Recommendation </h3>
									<br>
									<h4 align="center" style="color:green">Selected Bidder : <?php echo $select_supplier_nme; ?></h4>
										
										<form name="f4" method="post">
											<div class="form-group">
												<input type="hidden" class="form-control input-sm" name="<?php echo "txt_recommendedsuppkey"; ?>" value="<?php echo $select_supplier_key;?>">
												<label for="formGroupExampleInput2">Recommended Reason</label>
												<textarea class="form-control input-sm"  name="txt_recommededreason"><?php if($select_reason!=NULL){echo $select_reason;} ?></textarea>
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-primary btn-lg btn-block" name="<?php echo "btn_selectbidder";?>" value="Recommended Reason">
											</div>
										</form>
										
								</section>
							</div>
						</div>
						<?php
						}
						//  Recommended Reason end
						?>
		
					<a href="shpbid_eveluation_report.php?p=<?php echo $_GET['p'];?>"><button type="button" class="btn btn-danger">Generate TEC Report For Shopping</button></a>	
		<?php		
		}
		?>
				
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