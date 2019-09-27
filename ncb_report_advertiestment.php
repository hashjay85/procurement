<?php
 ob_start();
 $cur_dte=date("Y-m-d");
	include("includes/conn.php");
	$sql1="SELECT * FROM ncb_details WHERE project_key='$_GET[p]' AND status=0";
	$result1 = mysqli_query($link,$sql1);
	while($row1=mysqli_fetch_array($result1)){	
			$a40=$row1['sec2_itb1_1'];
			$projid=$row1['sec2_itb1_1_tenderno'];
			$a42=$row1['sec2_itb2_1'];
			$a43=$row1['sec2_itb4_4'];
			$a44=$row1['sec2_itb7_1_attention'];
			$a45=$row1['sec2_itb7_1_address'];
			$a46=$row1['sec2_itb7_1_telephone'];
			$a47=$row1['sec2_itb7_1_facimaileno'];
			$a48=$row1['sec2_itb7_1_Eelectornicmail'];
			$a49=$row1['no_of_lots'];
			$a50=$row1['sec2_itb11_1e'];
			$a51=$row1['sec2_itb14_3'];
			$a52=$row1['sec2_itb15_1'];
			$a53=$row1['sec2_itb17_3'];
			$a54=$row1['sec2_itb18_1b'];
			$a55=$row1['sec2_itb19_1'];
			$a56=$row1['sec2_itb20_2'];
			$a57=$row1['sec2_itb20_2_date'];
			$a58=$row1['sec2_itb22_2c'];
			$a59=$row1['sec2_itb23_1_date'];
			$a60=$row1['sec2_itb23_1_time'];
			$a61=$row1['sec2_itb26_1_address'];
			$a62=$row1['sec2_itb26_1_date'];
			$a63=$row1['sec2_itb26_1_time'];
			$a64=$row1['sec2_itb35_4'];
			$a65=$row1['sec2_itb35_5'];
			$a100=$row1['procument_title'];
			
			//Section 1
			
			$a66=$row1['sec3_fincapable'];
			// Section 3
			
			$a67=$row1['sec4_dte'];
			$a68=$row1['sec4_no'];
			// Section 4
			
			$a69=$row1['sec5_manufacturedte'];
			$a70=$row1['sec5_manufactureprocess'];
			$a71=$row1['sec5_nameofmanufactor'];
			$a72=$row1['sec5_typeofmanufactor'];
			$a73=$row1['sec5_fulladdressmanufactor'];
			$a74=$row1['sec5_completenmeofbidder'];
			$a75=$row1['sec5_title'];
			$a76=$row1['sec5_dteofsign'];
			$a77=$row1['sec5_nameofauthperson'];
			$a78=$row1['sec5_discreptionofgood'];
			// Section 5
			
			$a80=$row1['sec7_conagreementdayofno'];
			$a81=$row1['sec7_conagreementmon'];
			$a82=$row1['sec7_conagreementyer'];
			$a83=$row1['sec7_nameofpurchaser'];
			$a84=$row1['sec7_discriptionlegal'];
			$a85=$row1['sec7_nmeofsupplier'];
			$a86=$row1['sec7_addressofsupplier'];
			$a87=$row1['sec7_bri_dis_serv_purc'];
			$a88=$row1['sec7_contractprice'];
			$a89=$row1['sec7_refnoofcontract'];
			$a90=$row1['sec7_contrctdte'];
			$a91=$row1['sec7_briefdescontract'];
			$a92=$row1['sec7_profomanceguranteeno'];
			$a93=$row1['sec7_nmeadressissueagancy'];
			$a94=$row1['sec7_nameadrresofemp'];
			$a95=$row1['sec7_payamount'];
			$a96=$row1['sec7_gexedayofno'];
			$a97=$row1['sec7_gexemon'];
			$a98=$row1['sec7_gexeyer'];
			$a99=$row1['sec7_contryofsupplier'];
			// Section 7
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

	<h1 align="center" style="font-size:0px;">PROCUREMENT NOTICE</h1>
	<div style="border: 1px black solid">
	<div align="center" style="font-size:16px; font-weight:bold;">PROCUREMENT NOTICE</div>
	<div align="center" style="font-size:14px;">(<?php echo $a42;  ?> FUNDS)</div>
	<!--<div align="center"><img src="gv.png" width="8%" height="10%"></div>-->
	<div align="center" style="font-weight:bold;">UNIVERSITY OF COLOMBO SCHOOL OF COMPUTING (UCSC)</div>
	<br>
	<div align="center" style="font-weight:bold; font-size:14px;"><?php echo $a100; ?></div>
	<br>
	<div align="center" style="font-weight:bold; font-size:14px;"><u>(PROC NO: <?php echo $projid; ?>)</u></div>
	<p style="text-align:justify;font-size:14px; ">1.	The Chairman, Department Procurement Committee of University of Colombo School of Computing (UCSC) invites sealed bids from eligible bidders for 
	<b><?php echo $a100; ?></b>. 
	The bidders may submit  bids for <b><?php
						for($i6=1;$i6<=$a49;$i6++){
					?>
						Lot No <?php echo $i6;?>,
					<?php
						}
					?></b>separately. 
	The bids will be evaluated on separate lot basis. </p>
	
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
	<thead>
		<tr style="font-size:15px; font-weight:bold;">	
			<th width="20%">Procurement No</th>
			<th width="10%">Lot  No</th>
			<th width="40%">Description of Goods</th>
			<th width="10%">Quantity</th>
			<th width="20%">Bid Bond Amount (Rs)</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql7="SELECT MIN(ncbsec45_ini_item_key)AS mininiitem_key FROM ncbsec45_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
		$result7 = mysqli_query($link,$sql7);
		while($row7=mysqli_fetch_array($result7)){
			$r1=$row7['mininiitem_key'];
		}
		
		$sql6="SELECT * FROM ncbsec45_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
		$result6 = mysqli_query($link,$sql6);
		$allitem=mysqli_num_rows($result6);
		while($row6=mysqli_fetch_array($result6)){
			//for($i7=1;$i7<=$a49;$i7++){
		?>
			<?php
			if($r1==$row6['ncbsec45_ini_item_key']){
			?>
			<tr style="font-size:14px;">
				<td rowspan="<?php echo $allitem; ?>"><?php echo $projid; ?></td>
				<td><b>Lot <?php echo $row6['lot_no'];?></b></td>
				<td><b><?php echo $row6['item_nme'];?></b></td>
				<td><b><?php echo $row6['qty'];?> NOS</b></td>
				<td align="center"><b><?php echo number_format($row6['bidbond_amount'],2);?></b></td>
			</tr>
			<?php
			}
			else{
			?>
			<tr style="font-size:14px;">
				<td><b>Lot <?php echo $row6['lot_no'];?></b></td>
				<td><b><?php echo $row6['item_nme'];?></b></td>
				<td><b><?php echo $row6['qty'];?> NOS</b></td>
				<td align="center"><b><?php echo number_format($row6['bidbond_amount'],2);?></b></td>
			</tr>
			<?php
			}
			?>
		<?php
		}
		?>
	</tbody>
	</table>
	
	<p style="text-align:justify;font-size:14px; ">2.	Bidding will be conducted through the National Competitive Bidding (NCB) Procedures.</p>
	<p style="text-align:justify;font-size:14px; ">3.	A complete set of bidding documents in English Language may be purchased by interested bidders on the submission of written application to the Senior Assistant Bursar - Procurements UCSC No 35 Reid Avenue Colombo 00700 and upon payment of a non-refundable fee of 
	<b>Rs.5, 000.00 </b>for each Bidding Document. The method of payment will be in cash to the Shroff Counter at the UCSC during working hours from 
	<b><?php echo date("jS F Y", strtotime($a55));?>  to <?php echo date("jS F Y", strtotime($a59));?> </b>. Bidding documents may be inspected free of charge at the Finance Division at the UCSC during working hours.</p>
	
	<p style="text-align:justify;font-size:14px; ">4.	The duly completed Sealed bids  with Duplicate, addressed to the 
	<b>&quot;Chairman DPC University of Colombo School of Computing(UCSC)&quot;</b>  should be deposited to the Tender Box at the Finance Branch 1st Floor of the UCSC No 35, Reid Avenue, Colombo 07 
	<b>on or before <?php echo $a63;?> on <?php echo date("jS F Y", strtotime($a62));?> </b>. Bids will be opened in the presence of the bidders or bidder’s representatives who choose to attend at the address below, immediately after closing of bids. Late bids will be rejected. All bids must be accompanied by a bid security for each lot as mentioned in above table, which shall be 
	valid up to <b><?php echo date("jS F Y", strtotime($a57));?></b>.</p>
	
	<div align="center" style="font-size:13px;">Director/ Chairman DPC</div>
	<div align="center" style="font-size:13px;">University of Colombo School of Computing (UCSC)</div>
	<div align="center" style="font-size:13px;">No 35 Reid Avenue Colombo 00700.</div>
	<div align="center" style="font-size:13px;">Tel: (0112) 581 245/Ex-8934  Fax: (0112) 587 239</div>
</div>
</body>
</html>

<?php
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=NCB_Bidding_Advertiestment_".$projid.".doc");   
?>