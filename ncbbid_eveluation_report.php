<?php
 ob_start();
 $cur_dte=date("Y-m-d");
	include("includes/conn.php");
	$sql1="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
	$result1 = mysqli_query($link,$sql1);
	while($row1=mysqli_fetch_array($result1)){	
			$a1=$row1['procument_title'];
			$a2=$row1['sec2_itb20_2_date'];
			$a3=$row1['sec2_itb19_1'];
			$a4=$row1['sec2_itb23_1_date'];
			$a5=$row1['sec2_itb26_1_date'];
			$a6=$row1['sec2_itb26_1_time'];
			$a7=$row1['sec2_itb23_1_time'];
	}
	
	$sql2="SELECT * FROM ncbsec03_details WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
	$result2 = mysqli_query($link,$sql2);
	while($row2=mysqli_fetch_array($result2)){	
			$b1=$row2['heading_lots'];
	}
	
	$sql3="SELECT * FROM ncbsec45_bid_eveluate_details WHERE 
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
	
	$sql6="SELECT * FROM ncbsec03_details WHERE 
											project_key='$_GET[p]' AND 
											lot_no=1 AND 
											status=0";
	$result6 = mysqli_query($link,$sql6);
	while($row6=mysqli_fetch_array($result6)){	
			$d1=$row6['heading_lots'];
	}
	
	$sql10="SELECT * FROM project_master WHERE projmas_key='$_GET[p]' AND status=0";
	$result10 = mysqli_query($link,$sql10);
	while($row10=mysqli_fetch_array($result10)){
		$projid=$row10['project_id'];
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
			<td colspan="4"><div align="center"><b>TEC MEETING MINUTES</b></div></td>
		</tr>
		<tr>
			<td colspan="4"><div align="center"><b>REPORT OF THE TEC MEETING</b></div></td>
		</tr>
		<tr>
			<td><b>Nature of the Procurement Committee</b></td>
			<td>Department Procurement Committee (Major)</td>
			<td><b>Name of the Procurement Entity</b></td>
			<td>University of Colombo School of Computing</td>
		</tr>
		
		<tr>
			<td rowspan="2"><b>Title of Procurement</b></td>
			<td colspan="3"><b><?php echo $a1; ?></b></td>
		</tr>
		<tr>
			<td colspan="3"><b><?php echo $b1; ?></b></td>
		</tr>
		<tr>
			<td rowspan="2">MEETING NO -01</td>
			<td rowspan="2">(TENDER NO: <?php echo $projid; ?>)</td>
			<td>Date </td>
			<td> <b><?php echo $c1; ?></b> </td>
		</tr>
		<tr>
			<td>Estimate Cost </td>
			<td> <b><?php echo number_format($d2,2); ?>(Without VAT)</b></td>
		</tr>
		<tr>
			<td colspan="4"><div align="center"><b>Present</b></div></td>
		</tr>
		
		<?php
			$r1=0;
			$sql5="SELECT * FROM appoint_tec_details INNER JOIN user_master ON appoint_tec_details.user_key=user_master.user_key
																				 WHERE appoint_tec_details.project_key='$_GET[p]' AND  appoint_tec_details.status=0 AND user_master.status=0";
			$result5 = mysqli_query($link,$sql5);
			while($row5=mysqli_fetch_array($result5)){
				$r2=$r1+1;
		?>
				
					<?php
						if($r1 % 2==0){
					?>
					<tr>
						<td colspan="2">
						
								<?php echo $r2." . ".$row5['first_name']." ".$row5['last_name'];?><br>
								[<?php echo $row5['designation'];?>]
						</td>
					
					<?php
						}
						if($r1 % 2==1){
					?>
					
							<td colspan="2">
							
									<?php echo $r2." . ".$row5['first_name']." ".$row5['last_name'];?><br>
									[<?php echo $row5['designation'];?>]
							</td>
					</tr>
					<?php
						}
					?>
				
		<?php
				$r1++;
			}
		?>
		
		<tr>
			<td colspan="4" style="text-align:justify;"> <b>INTRODUCTION:</b><br>
			According to the request made by the Deputy Director and the Assistant Manager Network Operations Center and under the approval of the Director, the Chairman of Department Procurement Committee (DPC), No.35 Reid Avenue, Colombo 07 through National Competitive Bidding Procedure on 27.08.2018, called bids. 
			The bids were called for the procurement of <?php echo $d1; ?>             
			which are required for the Network Operations Center of UCSC.
			</td>
		</tr>
	</table>
	
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<thead>
			<tr>
				<th width="8%">S No</th>
				<th width="25%">Procurement Description</th>
				<th width="67%">Process</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><div align="center">01</div></td>
				<td><?php echo $d1; ?></td>
				<td> a)	The TEC met on <?php echo $a2;?> and recommended the Bidding Document, Cost Estimate, Procurement Method and the Paper Advertisement
				<br>
				<br>
					b)	DPC approved the bidding document and Paper Advertisement on <?php echo $a2;?>. 
				<br>
				<br>
					c)	Paper Advertisement published on <?php echo date("jS F Y", strtotime($a2));?>
				<br>
				<br>
					d)	Bidding Documents issuing from <?php echo date("jS F Y", strtotime($a3));?>  to <?php echo date("jS F Y", strtotime($a4));?>.
				<br>
				<br>
				<?php
					$sql7="SELECT * FROM ncbsec45_bid_eveluate_details WHERE 
											project_key='$_GET[p]' AND 
											lot_no=1 AND 
											status=0";
					$result7 = mysqli_query($link,$sql7);
					$numberofbidders=mysqli_num_rows($result7);
				?>
					e)	<?php echo convertNumber($numberofbidders); ?> (<?php echo $numberofbidders; ?>)Nos  Bidding Documents Issued for Lot No 01 to the following prospective bidders.
					<br>
					<br>
					<?php
					$nq1=1;
					$sql8="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
											ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
											WHERE 
											ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
											ncbsec45_bid_eveluate_details.lot_no=1 AND 
											ncbsec45_bid_eveluate_details.status=0";
					$result8 = mysqli_query($link,$sql8);
					while($row8=mysqli_fetch_array($result8)){
						
					?>
						<div>&nbsp;&nbsp;&nbsp; <?php echo $nq1.". ".$row8['supplier_name']?></div>
					<?php
					 $nq1++;
					}
					?>
					<br>
					<br>
					f)	Bid opening committee held on  <?php echo $a6;?>  <?php echo date("jS F Y", strtotime($a5));?>.
					<br>
					<br>
					g)	<?php echo convertNumber($numberofbidders); ?> (<?php echo $numberofbidders; ?>) Nos Bids were received at the closing time of bids for all lots.
				</td>
			</tr>
		</tbody>
	</table>
	
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<tr>
			<td>
				1.	Documents Forwarded and discussed: <br><br>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;I.	Paper Advertisement </div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;II.	Approved Bidding document</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;III.       Bid opening minutes.</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;IV.	Bids received  from <?php echo $numberofbidders; ?> Bidders for lot No 01.</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;V.        TEC Meeting Minutes (TEC No 1)</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;VI.       Specifications</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;VII.      Warranty  and  Manufacturer&#39;s Authorization</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;VIII.      Audited financial statement of  last 03 years.</div><br><br>
				2.	Documents Forwarded and discussed: <br><br>
				
						<div>&nbsp;&nbsp;&nbsp;&nbsp;I.	 Paper Advertisement published on <?php echo date("jS F Y", strtotime($a3));?></div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;II.	<?php echo $numberofbidders; ?> Nos Bidding document issued for LOT No.01</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;III.	 <?php echo $numberofbidders; ?> Nos Bids were received before the closing time for LOT No.01</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;IV.	 Bids were opened on  <?php echo $a6; ?> <?php echo date("jS F Y", strtotime($a5));?>.</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;V.	 The TEC checked the qualification requirements and specifications. </div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;VI.	 Total Cost Estimate : LKR <?php echo number_format($d2,2);?> (Excluding VAT).</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;VII.	Completion Period :08 - 10 weeks from  the start date [start date of the contract as stated in the   Letter of Acceptance] </div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;VIII.	Proceedings of the meeting and follow up actions from previous meeting: No</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;IX.	Comments on presence and absence of members: No</div>
						<div>&nbsp;&nbsp;&nbsp;&nbsp;X.	Comments on entire procurement Process: No</div><br><br>
						
				3.	Any special features/ methods adopted: No

			</td>
			
		</tr>
		<tr>
			<td>
				<u><b>4.	RECEIPT AND OPENING OF BIDS</b></u><br><br>
				<div style="text-align:justify;"><?php echo $numberofbidders; ?> Nos Bidding document were received prior to the deadline fixed for submission of bids.  
				Bids were opened immediately after the deadline for closing of bids (i.e. at <?php echo $a7; ?>. on <?php echo date("jS F Y", strtotime($a4));?>) at the office of Finance Division, University of Colombo School of Computing at 35, Reid Avenue, Colombo 07Nos. 
				in the presence of the representatives of the bidders. 
				The read prices (as stated in the form of bid) of the bids are listed in Table below.</div>

			
			</td>
		</tr>
		<tr>
			<td>
				<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
					<thead>
						<tr style="background-color:#b2af9d;">
							<th colspan="5" align="center">BIDS RECEIVED BEFORE CLOSING TIME-PRICE SCHEDUAL</th>
						</tr>
						<tr style="background-color:#b2af9d;">
							<th width="5%">S/No </th>
							<th width="50%">Name of the Bidder</th>
							<th width="15%">QTY</th>
							<th width="15%">Unit Price Without VAT (Rs) </th>
							<th width="15%">Total Amount Without VAT  </th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ne1=0;
						$sql9="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
											ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
											WHERE 
											ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
											ncbsec45_bid_eveluate_details.lot_no=1 AND 
											ncbsec45_bid_eveluate_details.status=0";
						$result9 = mysqli_query($link,$sql9);
						while($row9=mysqli_fetch_array($result9)){
							$ne1++;
						?>	
							
							<?php
							$ka1=0;
							$ka2=0;
							$ka3=0;
								$sql11="SELECT SUM(qty)AS totqty,
												SUM(unit_price_withoutvat)AS totunitprice,
												SUM(total_price_withoutvat)AS totprice
												FROM ncbsec45_item_bid_details WHERE 
																project_key='$_GET[p]' AND 
																lot_no=1 AND
																supplier_key='$row9[supplierms_key]' AND 
																status=0";
								$result11 = mysqli_query($link,$sql11);
								while($row11=mysqli_fetch_array($result11)){
									$ka1=$row11['totqty'];
									$ka2=$row11['totunitprice'];
									$ka3=$row11['totprice'];
									
								}
							
							?>
						
							<tr>
								<td><?php echo $ne1; ?></td>
								<td><?php echo $row9['supplier_name']; ?></td>
								<td align="center"><?php echo $ka1; ?></td>
								<td align="right"><?php echo number_format($ka2,2); ?></td>
								<td align="right"><?php echo number_format($ka3,2); ?></td>
							</tr>
						
						<?php	
						}
						?>
					</tbody>
				</table>
				<br>
				<br>
				a.) <u><b>BID EVALUATION </b></u><br><br>
				<p style="text-align:justify;">Bid Evaluation was carried out in accordance with the procedures stipulated in chapter of the procurement Guidelines 2006, Goods and works, published by the National Procurement Agency(NPA) and the relevant clauses in the instructions to bidders(ITB). </p>
				
				<div>Accordingly bid evaluation was carried out in 2 stages as follows.</div>
				<div>Stage 1:  Bid Examination </div>
				<div>Stage 2 : Detailed Bid Evaluation</div>
				<br>
				<br>
				b.) <u><b>BID EXAMINATION </b></u><br><br>
				<p style="text-align:justify;">Before detailed evaluation, all bids received were examined in order to ascertain  whether they comply with following requirements stipulated in Bidding Document.</p>
				
				<div>i.	Whether the form of bid is properly completed and signed. </div>
				<div>ii.	Whether the bid is legally valid. </div>
				<div>iii.	Whether the bid is accompanied by the required bid security. </div>
				<div>iii.	Whether the bid is accompanied by the required bid security. </div>
				<div>iv.	Whether bid is generally in order for evaluation.  </div>
				<p style="text-align:justify;">The TEC checked the bid documents at the Bid Examination Stage and checked the Preliminary qualification of the responsive bidders as follows.</p>
				<br>
			
				
				<u><b>5.1.1  PRELIMINARY EXAMINATION OF BIDS</b></u>
				<br>
				<br>
				<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
					<thead>
						<tr style="background-color:#b2af9d;">
							<th colspan="7" align="center"><?php echo $b1; ?></th>
						</tr>
						<tr>
							<th width="5%">No </th>
							<th width="45%">Name of the Bidder</th>
							<th width="10%">Bid Bond Guarantee </th>
							<th width="10%">Form of Bid Filled And Signed </th>
							<th width="10%">Price Schedule Filled And Signed</th>
							<th width="10%">Manufacture Authorization</th>
							<th width="10%">Acceptance for Detailed Examination(Yes/No)</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ks1=0;
						$sql12="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
											ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
											WHERE 
											ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
											ncbsec45_bid_eveluate_details.lot_no=1 AND 
											ncbsec45_bid_eveluate_details.status=0";
						$result12 = mysqli_query($link,$sql12);
						while($row12=mysqli_fetch_array($result12)){
							$ks1++;
						?>
							<tr>
								<td><?php echo $ks1;?></td>
								<td><?php echo $row12['supplier_name']; ?></td>
								<td><?php echo $row12['pre_exami_bidbond']; ?></td>
								<td><?php echo $row12['pre_exami_bidbond']; ?></td>
								<td><?php echo $row12['pre_exami_priceshedulefill']; ?></td>
								<td><?php echo $row12['pre_exami_manufactureauth']; ?></td>
								<td><?php if ($row12['pre_exami_accpectancedetail'] == 1) { echo "Yes";} else {echo "No";} ?></td>
							</tr>
						<?php
						}
						?>
						<tr>
							<td colspan="7"><b>REASONS FOR REJECTING BIDDERS [PRELIMINARY BID EXAMINATION STAGE]</b></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td colspan="2"><b>Bidder</b></td>
							<td colspan="3"><b>Reason</b></td>
						</tr>
						<?php
						$sql13="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
											ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
											WHERE 
											ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
											ncbsec45_bid_eveluate_details.lot_no=1 AND
											ncbsec45_bid_eveluate_details.pre_exami_reject_bidder=1 AND
											ncbsec45_bid_eveluate_details.status=0";
						$result13 = mysqli_query($link,$sql13);
						while($row13=mysqli_fetch_array($result13)){
						?>
						<tr>
							<td colspan="2"></td>
							<td colspan="2"><?php echo $row13['supplier_name']; ?></td>
							<td colspan="3"><?php echo $row13['pre_exami_reject_bidder_reason']; ?></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				<br>
				<p style="text-align:justify;">Short-listed which are complied the above requirements stipulated in the bidding document in initial bid examination by TEC are listed in Table as follows.</p>
				
				<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="70%">
					<thead>
						
						<tr>
							<th width="5%">No </th>
							<th width="65%">Selected bidders for preliminary Bid Examination by TEC</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$ks2=0;
						$sql14="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
											ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
											WHERE 
											ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
											ncbsec45_bid_eveluate_details.lot_no=1 AND
											ncbsec45_bid_eveluate_details.pre_exami_reject_bidder IS NULL AND
											ncbsec45_bid_eveluate_details.status=0";
						$result14 = mysqli_query($link,$sql14);
						while($row14=mysqli_fetch_array($result14)){
							$ks2++;
					?>
						<tr>
							<td width="5%"><?php echo $ks2; ?></td>
							<td width="65%"><?php echo $row14['supplier_name']; ?></td>
							
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
				<br>
				<br>
				
				<u><b>5.2 DETAILED EVALUATION </u></b>
				<br>
				<br>
				<div><b>5.2.1 Financial Evaluation </b></div>
				<p style="text-align:justify;">All the substantially responsive bids were examined for their correctness and arithmetic corrections. Corrections of the material deviation, reservation, additional or omissions were made in accordance with clause 29 and clause 30 of the instructions to bidders.</p>
				
				<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
					<thead>
						<tr style="background-color:#b2af9d;">
							<th colspan="5" align="center"><b>Detail Evaluation of Responsive Bids</b></th>
						</tr>
						<tr>
							<th width="5%">No </th>
							<th width="50%">Name of the Bidder</th>
							<th width="15%">Bid Price Without VAT (Rs) </th>
							<th width="15%">Additions or Omissions </th>
							<th width="15%">Evaluated Bid Price without VAT (Rs)</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						$ks3=0;
						$sql15="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
											ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
											WHERE 
											ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
											ncbsec45_bid_eveluate_details.lot_no=1 AND 
											ncbsec45_bid_eveluate_details.pre_exami_reject_bidder IS NULL AND
											ncbsec45_bid_eveluate_details.status=0";
						$result15 = mysqli_query($link,$sql15);
						while($row15=mysqli_fetch_array($result15)){
							$ks3++;
							
							$sumtotwithoutprice1=0;
							$sql16="SELECT SUM(total_price_withoutvat) AS sumtotwithoutprice1 FROM ncbsec45_item_bid_details 
																				WHERE project_key='$_GET[p]' AND 
																					lot_no=1 AND
																					supplier_key='$row15[supplier_key]' AND
																					status=0";
							$result16 = mysqli_query($link,$sql16);
							while($row16=mysqli_fetch_array($result16)){
								$sumtotwithoutprice1=$row16['sumtotwithoutprice1'];
							}
						?>
							<tr>
								<td><?php echo $ks3;?></td>
								<td><?php echo $row15['supplier_name']; ?></td>
								<td align="right"><?php echo number_format($sumtotwithoutprice1,2); ?></td>
								<td align="center"><?php echo $row15['fin_eveluate_addi_ommi']; ?></td>
								<td align="right"><?php echo number_format($row15['fin_eveluate_bidprice'],2); ?></td>
								
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				<br>
				<div><b>5.2.2	Technical Evaluation </b></div>
				<p style="text-align:justify;">Technical  details of the offered equipment and material are attached (Please refer attachment for filled Technical  Schedule)</p>
				
				<ul>
					<?php
						
						$sql17="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
											ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
											WHERE 
											ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
											ncbsec45_bid_eveluate_details.lot_no=1 AND 
											ncbsec45_bid_eveluate_details.pre_exami_reject_bidder IS NULL AND
											ncbsec45_bid_eveluate_details.status=0";
						$result17 = mysqli_query($link,$sql17);
						while($row17=mysqli_fetch_array($result17)){
					?>
								<li>
									<b><?php echo $row17['supplier_name']; ?></b>
									<p style="text-align:justify;"><?php echo $row17['tec_eveluate_discription']; ?></p>
								</li>
					
					<?php
						}
					?>
				</ul>
				
				<br>
				    <p style="text-align:justify;"><i>A summary of finding In respect of each Financial and technically responsive bidder are given in table</i></p>
				
						<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="70%">
							<thead>
								
								<tr>
									<th width="5%">No </th>
									<th width="50%">Bidder</th>
									<th width="15%">Responsiveness </th>
								</tr>
							</thead>
							<tbody>
							<?php
								$ks4=0;
								$sql18="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
													ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
													WHERE 
													ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
													ncbsec45_bid_eveluate_details.lot_no=1 AND
													ncbsec45_bid_eveluate_details.pre_exami_reject_bidder IS NULL AND
													ncbsec45_bid_eveluate_details.status=0";
								$result18 = mysqli_query($link,$sql18);
								while($row18=mysqli_fetch_array($result18)){
									$ks4++;
							?>
								<tr>
									<td width="5%"><?php echo $ks4; ?></td>
									<td width="50%"><?php echo $row18['supplier_name']; ?></td>
									<td width="15%" align="center"><?php if ($row18['tec_eveluate_responsivness'] == 1) { echo "Yes";} else {echo "No";} ?> </td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
						
						<p style="text-align:justify;">Based on the above evaluation it is recommended to accept the evaluate for Post Qualification and qualification requirements  of responsive bidders.<i></i></p>
						<br>
						
						<u><b>6. POST QUALIFICATION AND QUALIFICATION REQUIREMENTS. </u></b>
						
						<p style="text-align:justify;">For the evaluation of eligibility criteria and other qualification requirements, according to the ITB, following qualification requirements are carefully evaluated. Especially for this evaluation, data is absorbed from client’s statements, audited statement which can be acceptable proven documents than the information provided by the bidder directly in his table format.</p>
						
						<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
									<thead>
										<tr>
											<th>Qualification</th>
											<?php
												$sql18="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
													ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
													WHERE 
													ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
													ncbsec45_bid_eveluate_details.lot_no=1 AND
													ncbsec45_bid_eveluate_details.tec_eveluate_responsivness=1 AND
													ncbsec45_bid_eveluate_details.status=0";
												$result18 = mysqli_query($link,$sql18);
												while($row18=mysqli_fetch_array($result18)){
													
											?>
												<th><?php echo $row18['supplier_name']; ?></th>	
											<?php	
												}
											?>
										</tr>
									</thead>
									<tbody>

										<?php
											$sql19="SELECT * FROM ncb_postqulification_master WHERE project_key='$_GET[p]' AND lot_no=1 AND status=0";
											$result19 = mysqli_query($link,$sql19);
											while($row19=mysqli_fetch_array($result19)){
										?>
											<tr>
												<td><?php echo $row19['post_qulified_detail']; ?></td>
												<?php
												$sql20="SELECT * FROM ncbsec45_bid_eveluate_details WHERE 
																										project_key='$_GET[p]' AND 
																										lot_no=1 AND  
																										tec_eveluate_responsivness=1 AND 
																										status=0";
												$result20 = mysqli_query($link,$sql20);
												while($row20=mysqli_fetch_array($result20)){
													
													$sql21="SELECT * FROM ncb_postqulification_details WHERE 
																							project_key='$_GET[p]' AND 
																							lot_no=1 AND 
																							supplier_key='$row20[supplier_key]' AND 
																							ncb_master_key='$row19[ncb_postqulifimas_key]' AND 
																							status=0";
													$result21 = mysqli_query($link,$sql21);
													while($row21=mysqli_fetch_array($result21)){
														
													
												?>
													<td align="center"><?php echo $row21['qulification'];  ?></td>	
												<?php
													
													}
												}
												?>
												
											</tr>
										<?php
											}
										?>
									</tbody>
						</table>
						
						
						<?php
								$sql22="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
															WHERE ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
																 ncbsec45_bid_eveluate_details.lot_no=1 AND 
																 ncbsec45_bid_eveluate_details.tec_eveluate_rank=1 AND 
																 ncbsec45_bid_eveluate_details.status=0";
								$result22 = mysqli_query($link,$sql22);
								while($row22=mysqli_fetch_array($result22)){
									$ses_supplier=$row22['supplier_name'];
								}
						?>
						<p style="text-align:justify;">Note- <?php echo $ses_supplier; ?>
						The bidder has complied fully with our specifications in quality and performance. 
						Therefore, the TEC  has recommended the  above 8 years experience requirement as a minor deviation.</p>
						
						<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="85%">
							<thead>
								<tr>
									<td colspan="4" align="center" style="background-color:#b2af9d; font-size:13px;"><b>AFTER EVALUATION SUBSTANTIALLY RESPONSIVE BIDDER RANKING </b></td>
								</tr>
								<tr>
									<th width="5%">No </th>
									<th width="50%">Bidder</th>
									<th width="15%">Evaluated Bid Price without VAT (Rs) </th>
									<th width="15%">Ranking </th>
								</tr>
							</thead>
							<tbody>
							<?php
								$ks5=0;
								$sql23="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master
													ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
													WHERE 
													ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
													ncbsec45_bid_eveluate_details.lot_no=1 AND
													ncbsec45_bid_eveluate_details.tec_eveluate_responsivness=1 AND
													ncbsec45_bid_eveluate_details.status=0
													ORDER BY tec_eveluate_rank ASC";
								$result23 = mysqli_query($link,$sql23);
								while($row23=mysqli_fetch_array($result23)){
									$ks5++;
							?>
								<tr>
									<td width="5%"><?php echo $ks5; ?></td>
									<td width="50%"><?php echo $row23['supplier_name']; ?></td>
									<td width="15%" align="center"></th>
									<td width="15%" align="center"><?php echo $row23['tec_eveluate_rank'];?></td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
						<br>
						<?php
								$sql24="SELECT * FROM ncbsec45_bid_eveluate_details INNER JOIN supplier_master ON ncbsec45_bid_eveluate_details.supplier_key=supplier_master.supplierms_key
															WHERE ncbsec45_bid_eveluate_details.project_key='$_GET[p]' AND 
																 ncbsec45_bid_eveluate_details.lot_no=1 AND 
																 ncbsec45_bid_eveluate_details.tec_eveluate_rank=1 AND 
																 ncbsec45_bid_eveluate_details.status=0";
								$result24 = mysqli_query($link,$sql24);
								while($row24=mysqli_fetch_array($result24)){
									$ses_supplier1=$row24['supplier_name'];
									$ses_supplierkey1=$row24['supplier_key'];
									$ses_address=$row24['address'];
								}
								
								$sql25="SELECT SUM(total_price_withoutvat) AS selectedbidamou FROM ncbsec45_item_bid_details WHERE 
																					project_key='$_GET[p]' AND
																					lot_no=1 AND
																					supplier_key='$ses_supplierkey1' AND
																					status=0";
								$result25 = mysqli_query($link,$sql25);
								while($row25=mysqli_fetch_array($result25)){
									$selectedbidamou=$row25['selectedbidamou'];
								}
								
						?>
						<u><b>7. TECHNICAL EVALUATION COMMITTEE RECOMMENDATION  </u></b>
						<p style="text-align:justify;">The TEC observed the bid values according to the bid opening and checked the preliminary qualification correction of the material deviation, reservation, additional or omissions, evaluated bid price, Technical Specification requirements and other requirement & post qualification requirement of the bidders. </p>
						<p style="text-align:justify;">Lowest evaluated substantially responsive bid is offered by <?php echo $ses_supplier1; ?> for amounting of Rs. <?php echo number_format($selectedbidamou,2); ?> has given in this bid are checked with  estimate and it is in the acceptable and workable range.</p>
						<p style="text-align:justify;">Accordingly the lowest evaluated substantially responsive bid submitted by <?php echo $ses_supplier1; ?> complied with preliminary qualification, Technical Qualification, Post Qualification and other qualifications requirements mentioned in the bidding document.</p>
						<p style="text-align:justify;">Hence, the TEC recommended the  lowest evaluated substantially responsive bidder 
																<?php echo $ses_supplier1; ?> (<?php echo $ses_address; ?>) to award the procurement of 
																<?php echo $a1; ?>
																for Rs <?php echo number_format($selectedbidamou,2); ?> [<?php echo convertNumber($selectedbidamou); ?>] </p>
						<ul>
							<li><?php echo $ses_supplier1; ?> (<?php echo $ses_address; ?>)</li>
						</ul>
						<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
							<thead>
								<tr>
									<th width="5%">No </th>
									<th width="50%">Description</th>
									<th width="15%">Quantity  </th>
									<th width="15%">Unit Price (Rs) </th>
									<th width="15%">Total Amount (Rs) </th>
								</tr>
							</thead>
							<tbody>
							<?php
								$ks6=0;
								$withoutvat_tot=0;
								$withvat_tot=0;
								$netvat=$withvat_tot-$withoutvat_tot;
								$sql26="SELECT * FROM ncbsec45_initial_item_details INNER JOIN ncbsec45_item_bid_details
													ON ncbsec45_initial_item_details.ncbsec45_ini_item_key=ncbsec45_item_bid_details.item_key
													WHERE 
													ncbsec45_item_bid_details.project_key='$_GET[p]' AND 
													ncbsec45_item_bid_details.lot_no=1 AND
													ncbsec45_item_bid_details.supplier_key='$ses_supplierkey1' AND
													ncbsec45_item_bid_details.status=0";
								$result26 = mysqli_query($link,$sql26);
								while($row26=mysqli_fetch_array($result26)){
									$ks6++;
										$withoutvat_tot+=$row26['total_price_withoutvat'];
									 	$withvat_tot+=$row26['total_price_withvat'];
							?>
								<tr>
									<td width="5%"><?php echo $ks6; ?></td>
									<td width="50%"><?php echo $row26['item_nme']; ?></td>
									<td width="15%" align="center"><?php echo $row26['qty']; ?></th>
									<td width="15%" align="right"><?php echo number_format($row26['unit_price_withoutvat'],2); ?></td>
									<td width="15%" align="right"><?php echo number_format($row26['total_price_withoutvat'],2); ?></td>
								</tr>
							<?php
								}
							?>
								<tr>
									<td colspan="4" align="center">V A T 15%</td>
									<td align="right"><?php echo number_format($netvat,2);?></td>
								</tr>
								<tr>
									<td colspan="4" align="center">Total Amount with Taxes (Rs)</td>
									<td align="right"><?php echo number_format($withvat_tot,2); ?></td>
								</tr>
							</tbody>
						</table>
						<br>
						<div>1.	For Intermediate decisions: No.</div>
						<div>2.	Justifications for their decision/s the TEC wishes to add: No.</div>
						<br>
						
						<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
							<thead>
								<tr style="background-color:#b2af9d;">
									<th width="50%">Name </th>
									<th width="20%">Capacity</th>
									<th width="15%">Agree with the above decision/s  </th>
									<th width="15%">Signature </th>
									
								</tr>
							</thead>
							<tbody>
							<?php
								
								$sql27="SELECT * FROM appoint_tec_details INNER JOIN user_master ON appoint_tec_details.user_key=user_master.user_key
																				 WHERE appoint_tec_details.project_key='$_GET[p]' AND  
																				 appoint_tec_details.status=0 AND 
																				 user_master.status=0";
								$result27 = mysqli_query($link,$sql27);
								while($row27=mysqli_fetch_array($result27)){
									
							?>
								<tr>
									
									<td width="50%"><?php echo $row27['first_name']." ".$row27['last_name'];?><br> [<?php echo  $row27['designation']."-".$row27['department'];?>]</td>
									<td width="15%"><?php if($row27['chairman_appointtec']=="C"){echo "Chairman";}else{echo "Member";}?></th>
									<td width="15%"></td>
									<td width="15%"></td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
			</td>
		</tr>
		
	</table>
	
	
	
</body>
</html>

<?php
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=005-NCB_TEC_Report_".$projid.".doc");   
?>