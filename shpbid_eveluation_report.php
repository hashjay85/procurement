<?php
 ob_start();
 $cur_dte=date("Y-m-d");
	include("includes/conn.php");
	$sql1="SELECT * FROM shopping_details WHERE project_key='$_GET[p]' AND status=0";
	$result1 = mysqli_query($link,$sql1);
	while($row1=mysqli_fetch_array($result1)){	
			$a1=$row1['purchser_nme_1'];
			$a2=$row1['purchser_address_1'];
			$a3=$row1['shp_5_1'];
			$a4=$row1['validdte_8'];
			$a5=$row1['deadlinedte_11'];
			$a6=$row1['deadlinetime_11'];
			$a7=$row1['bidopenplc_13'];
			$a8=$row1['amountbid_21'];
			$a9=$row1['bidsecvalid_21'];
	}
	
	$sql2="SELECT * FROM project_master WHERE projmas_key='$_GET[p]' AND status=0";
	$result2 = mysqli_query($link,$sql2);
	while($row2=mysqli_fetch_array($result2)){	
			$proj_nme=$row2['project_nme'];
			$proj_id=$row2['project_id'];
			$proj_discription=$row2['description'];
	}
	
	/*$sql3="SELECT * FROM ncbsec45_bid_eveluate_details WHERE 
											project_key='$_GET[p]' AND 
											tec_eveluate_rank=1 AND 
											lot_no=1 AND 
											status=0";
	$result3 = mysqli_query($link,$sql3);
	while($row3=mysqli_fetch_array($result3)){	
			$c1=$row3['sys_enterdte'];
	}
	
	$sql4="SELECT SUM(bidbond_amount) AS estimatecost FROM ncbsec45_initial_item_details WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
	$result4 = mysqli_query($link,$sql4);
	while($row4=mysqli_fetch_array($result4)){
		$d2=$row4['estimatecost'];
	}
	
	*/
	
	
	$sql10="SELECT SUM(qty) AS totqty FROM shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
	$result10 = mysqli_query($link,$sql10);
	while($row10=mysqli_fetch_array($result10)){
		$totqty=$row10['totqty'];
	}
	
	
	function convertNumber($num = false)
		{
			$num = str_replace(array(',', ''), '' , trim($num));
			if(! $num) {
				return false;
			}
			$num = (int) $num;
			$words = array();
			$list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
				'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
			);
			$list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
			$list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
				'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
				'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
			);
			$num_length = strlen($num);
			$levels = (int) (($num_length + 2) / 3);
			$max_length = $levels * 3;
			$num = substr('00' . $num, -$max_length);
			$num_levels = str_split($num, 3);
			for ($i = 0; $i < count($num_levels); $i++) {
				$levels--;
				$hundreds = (int) ($num_levels[$i] / 100);
				$hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '');
				$tens = (int) ($num_levels[$i] % 100);
				$singles = '';
				if ( $tens < 20 ) {
					$tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '' );
				} elseif ($tens >= 20) {
					$tens = (int)($tens / 10);
					$tens = ' and ' . $list2[$tens] . ' ';
					$singles = (int) ($num_levels[$i] % 10);
					$singles = ' ' . $list1[$singles] . ' ';
				}
				$words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
			} //end for loop
			$commas = count($words);
			if ($commas > 1) {
				$commas = $commas - 1;
			}
			$words = implode(' ',  $words);
			$words = preg_replace('/^\s\b(and)/', '', $words );
			$words = trim($words);
			$words = ucfirst($words);
			$words = $words;
			return $words;
		}
?> 


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
</head>
	<script type="text/javascript" src="number_to_words/numberToWords.min.js"></script>
<body>
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<tr>
			<td colspan="3" style="background-color:#c2bebe;"><div align="center"><b>BID EVALUATION REPORT</b></div></td>
		</tr>
		<tr>
			<td colspan="3" style="background-color:#c2bebe;"><div align="center"><b>BACKGROUND</b></div></td>
		</tr>
		<tr>
			<td>Tender  Name And Number</td>
			<td colspan="2"><?php echo $proj_nme."  [".$proj_id."]"; ?></td>
		</tr>
		
		<tr>
			<td><b>Brief Description of Goods/ Works</b></td>
			<td><b><?php echo $proj_discription; ?></b></td>
			<td align="center"><b><?php echo $totqty; ?>Nos</b></td>
		</tr>
	</table>
	<br>
	<br>
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<tr>
			<td colspan="4" style="background-color:#c2bebe;"><div align="center"><b>NAMES OF EVALUATION COMMITTEE MEMBERS</b></div></td>
		</tr>
		<tr>
			<td style="background-color:#c2bebe;">S No</td>
			<td style="background-color:#c2bebe;">Name</td>
			<td style="background-color:#c2bebe;">Designation</td>
			<td style="background-color:#c2bebe;">Capacity</td>
		</tr>
		<?php
			$m1=0;
			$sql10="SELECT * FROM appoint_tec_details INNER JOIN user_master ON appoint_tec_details.user_key=user_master.user_key
																				 WHERE appoint_tec_details.project_key='$_GET[p]' AND  appoint_tec_details.status=0 AND user_master.status=0";
			$result10 = mysqli_query($link,$sql10);
			while($row10=mysqli_fetch_array($result10)){
				$m1++;
		?>
				<tr>
					<td><?php echo $m1; ?></td>
					<td><?php echo $row10['first_name']." ".$row10['last_name'];?></td>
					<td><?php echo  $row10['designation']."-".$row10['department'];?></td>
					<td><?php if($row10['chairman_appointtec']=="C"){echo "Chairman";}else{echo "Member";}?></td>
				</tr>
		<?php
		}
		?>
	</table>
	<br>
	<br>
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
								<thead>
									<tr>
										<th width="5%">S/No</th>
										<th width="30%">Name of the Bidder</th>
										<th width="10%">Qty</th>
										<th width="15%">Unit Price Without VAT (Rs) </th>
										<th width="15%">Total Amount Without VAT </th>
										<th width="15%">Brand </th>
										<th width="10%">Rank </th>
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
											
														<tr <?php if($r==1){ echo "style='background-color:#65e662;'";} ?>>
																<td> <?php echo $r;?></td>
																<td> <?php echo $row10['supplier_name'];?></td>
																<td align="right"><?php echo $n1;?></td>
																<td align="right"><?php echo number_format($n2,2);?></td>
																<td align="right"><?php echo number_format($n3,2);?></td>
																<?php
																$sql17="SELECT * FROM shopping_bid_eveluate_details WHERE 
																									project_key='$_GET[p]' AND 
																									supplier_key='$row9[supplier_key]' AND 
																									status=0";
																$result17 = mysqli_query($link,$sql17);
																while($row17=mysqli_fetch_array($result17)){
																	$edbrk=$row17['brand'];
																	$edrnk=$row17['rank'];
																}
																?>
																<td><?php echo $edbrk;?></td>
																<td><?php echo $edrnk;?></td>
														</tr>
									<?php	
											}
										}
									?>
								</tbody>
	</table>
	<br>
	<br>
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<tbody>
			<tr>
				<td colspan="3"><div align="center"><b>REASONS FOR REJECTING LOWEST QUOTATIONS</b></div></td>
			</tr>
			<tr>
				<th width="30%">  </th>
				<th width="30%"> Bidder</th>
				<th width="40%"> Reason</th>
			</tr>
			<?php
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
				<tr>
					<td width="30%">The Lowest Bidder</td>
					<td width="30%"> <?php echo $reject_supplier_nme; ?></td>
					<td width="40%"> <?php echo $reject_reason; ?></td>
				</tr>
			<?php
				}
				else{
			?>
				<tr>
					<td width="30%">The Lowest Bidder</td>
					<td width="30%"> Not Rejected</td>
					<td width="40%"> Not Rejected</td>
				</tr>
			<?php
				}
			?>
			<tr>
				<td width="30%">Any other comments</td>
				<td width="30%"> No</td>
				<td width="40%"> No</td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<tbody>
			<tr>
				<td colspan="2"><div align="center"><b>CONTRACT AWARD RECOMMENDATION</b></div></td>
			</tr>
			<?php
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
				$select_address=$row15['address'];
			}

			$sql12="SELECT SUM(total_price_withoutvat) AS withoutvat1,
						   SUM(total_price_withvat) AS withvat1
						FROM shopping_item_bid_details WHERE project_key='$_GET[p]' AND supplier_key='$select_supplier_key' AND status=0";
			$result12 = mysqli_query($link,$sql12);
			while($row12=mysqli_fetch_array($result12)){
				 	$select_withoutvat=$row12['withoutvat1'];
				 	$select_withvat=$row12['withvat1'];
			}
			
			$select_netvat=$select_withvat-$select_withoutvat;
			?>
			<tr>
				<td width="30%" align="left"> Reasons for Recommendation </td>
				<td width="70%" align="left"> <?php echo $select_reason;?></td>
			</tr>
			<tr>
				<td width="30%" align="left"> Name of the contractor/ Supplier </td>
				<td width="70%" align="left"> <?php echo $select_supplier_nme;?></td>
			</tr>
			<tr>
				<td width="30%" align="left"> Address </td>
				<td width="70%" align="left"> <?php echo $select_address;?></td>
			</tr>
			<tr>
				<td width="30%" align="left"> Contract Amount with Taxes (Rs) </td>
				<td width="70%" align="left"> Rs. <?php echo number_format($select_withoutvat,2)."  [".convertNumber($select_withoutvat)." Rupees only without VAT] and Rs.".number_format($select_netvat,2)." VAT"; ?> </td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<br>
	<table border="0" width="100%">
		<?php
			$t1=0;
			$sql10="SELECT * FROM appoint_tec_details INNER JOIN user_master ON appoint_tec_details.user_key=user_master.user_key
																				 WHERE appoint_tec_details.project_key='$_GET[p]' AND  appoint_tec_details.status=0 AND user_master.status=0";
			$result10 = mysqli_query($link,$sql10);
			while($row10=mysqli_fetch_array($result10)){
				$t2=$t1+1;
		?>
				
					<?php
						if($t1 % 2==0){
					?>
					<tr>
						<td>
								
								<div>...................................... </div>
								<?php echo $t2." . ".$row10['first_name']." ".$row10['last_name'];?><br>
								[<?php echo  $row10['designation']."-".$row10['department'];?>]<br>
								<?php if($row10['chairman_appointtec']=="C"){echo "Chairman";}else{echo "Technical Committee Member";}?>
						</td>
					
					<?php
						}
						if($t1 % 2==1){
					?>
					
							<td colspan="2">
							
								
								<div>...................................... </div>
								<?php echo $t2." . ".$row10['first_name']." ".$row10['last_name'];?><br>
								[<?php echo  $row10['designation']."-".$row10['department'];?>]<br>
								<?php if($row10['chairman_appointtec']=="C"){echo "Chairman";}else{echo "Technical Committee Member";}?>
							</td>
					</tr>
					<?php
						}
					?>
				
		<?php
				$t1++;
			}
		?>	

	</table>
</body>
</html>

<?php
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=Shopping_TEC_Report_".$proj_id.".doc");   
?>