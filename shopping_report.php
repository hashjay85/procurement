<?php
 ob_start();
 $cur_dte=date("Y-m-d");
	include("includes/conn.php");
	
	$sql1="SELECT * FROM shopping_details WHERE project_key='$_GET[p]' AND status=0";
	$result1 = mysqli_query($link,$sql1);
	while($row1=mysqli_fetch_array($result1)){	
			$a40=$row1['purchser_nme_1'];
			$a41=$row1['purchser_address_1'];
			$a42=$row1['shp_5_1'];
			$a43=$row1['validdte_8'];
			$a44=$row1['deadlinedte_11'];
			$a45=$row1['deadlinetime_11'];
			$a46=$row1['bidopenplc_13'];
			$a47=$row1['amountbid_21'];
			$a48=$row1['bidsecvalid_21'];
	}
	
	$sql10="SELECT * FROM project_master WHERE projmas_key='$_GET[p]' AND status=0";
	$result10 = mysqli_query($link,$sql10);
	while($row10=mysqli_fetch_array($result10)){
		$projid=$row10['project_id'];
		$projnme=$row10['project_nme'];
		$bidsecuriy_val=$row10['valueofbid_sec'];
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

<h1 align="center" style="font-size:40px;font-weight:bold;">University of Colombo School of Computing</h1>

<div align="center"><img src="gv.png" width="15%" height="20%"></div>
<br>
<div align="center" style="font-size:25px;font-weight:bold;"><?php echo $projnme;?></div><br>
<br>

<div align="center" style="font-size:25px;font-weight:bold;"><?php echo $projid; ?></div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="font-size:18px;font-weight:bold;">Chairman DPC</div>
<div style="font-size:18px;font-weight:bold;">University of Colombo School of Computing</div>
<div style="font-size:18px;font-weight:bold;">No. 35 Reid Avenue Colombo 00700. </div>
<br>
<div align="left" style="font-size:14px;">NPA/SBD/GOODS/01 </div>
<br style="page-break-before: always">
<!-- 1 st page End -->

<h1 align="center" style="font-size:40px;font-weight:bold;">THIS PAGE PURPOSELY LEFT BLANK</h1>
<br style="page-break-before: always">


<!-- 2nd page End -->

<h1 align="left" style="font-size:20px;font-weight:bold;">Section I Instructions to Vendors (ITV)</h1>

<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
	<tbody>
		<tr>
			<td style="font-size:18px;font-weight:bold;background-color:#dbd1d1" align="center" colspan="2">
				<br>A: General
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">1. Scope of Bid</td>
			<td width="80%" style="text-align:justify;">
				<p>1.1 The Purchaser named in the Data Sheet invites you to submit a quotation for the supply of Goods as specified in Section III Schedule of Requirements. Upon receipt of this invitation you are requested to acknowledge the receipt of this invitation and your intention to submit a quotation. The Purchaser may not consider you for inviting quotations in the future, if you failed to acknowledge the receipt of this invitation or not submitting a quotation after expressing the intention as above.</p>
			</td>
		</tr>
		<tr>
			<td style="font-size:18px;font-weight:bold;background-color:#dbd1d1" align="center" colspan="2">
				<br>B: Contents of Documents 
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">2. Contents of Documents</td>
			<td width="80%" style="text-align:justify;">
				<div>2.1 The documents consist of the Sections indicated below.</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section I. Instructions to Vendors (ITV)</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section II. Data Sheet</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section III. Schedule of Requirements</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section IV. Technical Specifications and Compliance with Specifications</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section V. Quotation Submission Form(s)</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section VI. Price schedule</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section VII. Manufacturer&quot;s Authorization</div>
				<br>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Section VIII. Bid Guarantee</div>
				<br>
			</td>
		</tr>
		<tr>
			<td style="font-size:18px;font-weight:bold;background-color:#dbd1d1" align="center" colspan="2">
				<br>C: Preparation of Quotation
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">3. Documents Comprising Your Quotation</td>
			<td width="80%" style="text-align:justify;">
				<div>3.1 The Quotation shall comprise the following:</div>
				<br>
				<div>(a) Quotation Submission Form and the Price Schedules</div>
				<div>(b) Technical Specifications & Compliance with Specifications</div>
				<div>(c) Bid shall include a Bid Security (issued by bank)</div>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">4. Quotation Submission Form and Price Schedules</td>
			<td width="80%" style="text-align:justify;">
				<p>4.1 The vendor shall submit the Quotation Submission Form using the form furnished in Section V. This form must be completed without any alterations to its format, and no substitutes shall be accepted. All blank spaces shall be filled in with the information requested.</p>
				<p>4.2 Alternative offers shall not be considered. The vendors are advised not to quote different options for the same item but furnish the most competitive among the options available to the Bidder.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">5. Prices and Discounts</td>
			<td width="80%" style="text-align:justify;">
				<p>5.1 Unless specifically stated in Data Sheet, all items must be priced Separately in the Price Schedules.</p>
				<p>5.2 The price to be quoted in the Quotation Submission Form shall be The total price of the Quotation, including any discounts offered.</p>
				<p>5.3 The applicable VAT shall be indicated separately. </p>
				<p>5.4 Prices quoted by the vendor shall be fixed during the vendor’s performance of the Contract and not subject to variation on any Account. A Quotation submitted with an adjustable price shall be treated as non responsive and may be rejected.</p>
				
			</td>
		</tr>
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">6. Currency</td>
			<td width="80%" style="text-align:justify;">
				<p>6.1 The vendors shall quote only in Sri Lanka Rupees.</p>
				
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">7. Documents to Establish the Conformity of the Goods</td>
			<td width="80%" style="text-align:justify;">
				<p>7.1 The vendor shall furnish as part of its quotation the documentary evidence that the Goods conform to the technical specifications And standards specified in Section IV, &quot;Technical Specifications and Compliance with Specifications&quot;.</p>
				<p>7.2 The documentary evidence may be in the form of literature, drawings or data, and shall consist of a detailed item by item description of the essential technical and performance characteristics of the Goods, demonstrating substantial responsiveness of the Goods to the technical specifications, and if applicable, a statement of deviations and exceptions to the Provisions of the Technical Specifications given.</p>
				<p>7.3 If stated in the Data Sheet the vendor shall submit a certificate  from the manufacturer to demonstrate that it has been duly authorized by the manufacturer or producer of the Goods to supply these Goods in Sri Lanka.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">8. Period of Validity of quotation</td>
			<td width="80%" style="text-align:justify;">
				<p>8.1 Quotations shall remain valid for the period of Ninety One (91) days After the quotation submission deadline date.</p>
				
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">9.  Format and Signing of Quotation</td>
			<td width="80%" style="text-align:justify;">
				<p>9.1 The quotation shall be typed or written in indelible ink and shall   be signed by a person duly authorized to sign on behalf of the vendor.</p>
			</td>
		</tr>
		
		<tr>
			<td style="font-size:18px;font-weight:bold;background-color:#dbd1d1" align="center" colspan="2">
				<br>D: Submission and Opening of Quotation
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">10. Submission of Quotation</td>
			<td width="80%" style="text-align:justify;">
				<p>10.1 Vendors may submit their quotations by mail or by hand in sealed envelopes addressed to the Purchaser bear the specific identification of the contract number.</p>
				<p>10.2 If the quotation is not sealed and marked as required, the Purchaser will assume no responsibility for the misplacement or premature opening of the quotation.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">11. Deadline for Submission of Quotation</td>
			<td width="80%" style="text-align:justify;">
				<p>11.1  Quotation must be received by the Purchaser at the address set out in Section II, &quot;Data Sheet&quot;, and no later than the date and time as specified in the Data Sheet</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">12. Late Quotation</td>
			<td width="80%" style="text-align:justify;">
				<p>12.1  The Purchaser shall reject any quotation that arrives after the deadline for submission of quotations, in accordance with ITV Clause 11.1 above.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">13. Opening of Quotations</td>
			<td width="80%" style="text-align:justify;">
				<p>13.1 The Purchaser shall conduct the opening of quotation in public at the address, date and time specified in the Data Sheet.</p>
				<p>13.2 A representative of the bidders may be present and mark its Attendance.</p>
			</td>
		</tr>
		
		<tr>
			<td style="font-size:18px;font-weight:bold;background-color:#dbd1d1" align="center" colspan="2">
				<br>E: Evaluation and Comparison of Quotation
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">14. Clarifications</td>
			<td width="80%" style="text-align:justify;">
				<p>14.1 To assist in the examination, evaluation and comparison of the Quotations, the Purchaser may, at its discretion, ask any vendor for a clarification of its quotation. Any clarification submitted by a vendor in respect to its quotation which is not in response to a request by the Purchaser shall not be considered.</p>
				<p>14.2 The Purchasers request for clarification and the response shall be in writing.</p>
				
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">15.Responsiveness of Quotations</td>
			<td width="80%" style="text-align:justify;">
				<p>15.1 The Purchaser will determine the responsiveness of the quotation to the documents based on the contents of the quotation received.</p>
				<p>15.2 if a quotation is evaluated as not substantially responsive to the documents issued, it may be rejected by the Purchaser.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">16. Evaluation of Quotation</td>
			<td width="80%" style="text-align:justify;">
				<p>16.1 The Purchaser shall evaluate each quotation that has been Determined, to be substantially responsive.</p>
				<div>16.2 To evaluate a quotation, the Purchaser may consider the following:</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;a)	The Price as quoted;</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;b)	Price adjustment for correction of arithmetical errors;</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;c)	Price adjustment due to discounts offered.</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;d)	Bidder should have a proven track record in selling and maintaining Laptop computers [Quoted Brands] for a minimum period of 03 Years.</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;e)	Manufacturers Authorization</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;f)	Statement - 03 years comprehensive on- site warranty with battery from Manufacture.</div>
				<p>16.3 The Purchasers evaluation of a quotation may require the consideration of other factors, in addition to the Price quoted if Stated in Section II, Data Sheet. These factors may be related to the characteristics, performance, and terms and conditions of Purchase of the Goods.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">17 Purchasers Right to Accept any Quotation, and to Reject  any or all Quotations</td>
			<td width="80%" style="text-align:justify;">
				<p>17.1 The Purchaser reserves the right to accept or reject any   quotation, and to annul the process and reject all quotations at any time prior to acceptance, without thereby incurring any liability to bidders.</p>
			</td>
		</tr>
		
		<tr>
			<td style="font-size:18px;font-weight:bold;background-color:#dbd1d1" align="center" colspan="2">
				<br>F: Award of Contract
				<br>
				<br>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">18. Acceptance of the Quotation</td>
			<td width="80%" style="text-align:justify;">
				<p>18.1 The Purchaser will accept the quotation of the vendor whose offer has been determined to be the lowest evaluated bid and is Substantially responsive to the documents issued.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">19. Notification of acceptance</td>
			<td width="80%" style="text-align:justify;">
				<p>19.1 Prior to the expiration of the period of validity of quotation, the Purchaser will notify the successful vendor, in writing, that its quotation has been accepted.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">20. Method of Payment And Advance Payment</td>
			<td width="80%" style="text-align:justify;">
				<p>The method and conditions of payment to be made to the Supplier under this Contract shall be as follows:</p>
				<ul>
					<li>Advance payment will not be allowed.</li>
					<li>Payment shall be made in Sri Lanka Rupees within Thirty (30) days of presentation of claim supported by a certificate from the Purchaser declaring that the Goods have been delivered and that all other contracted Services have been performed.</li>
				</ul>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">21. Bid Security</td>
			<td width="80%" style="text-align:justify;">
				<p>21.1 The Vendor shall furnish as part of its quotation, a Bid Security from a Commercial Banks Registered in Central Bank of  operating  in Sri Lanka or Cash Deposit, as specified in the Data Sheet.</p>
				<p>21.2 The Bid Security shall be in the amount specified in the Data Sheet and denominated in Sri Lanka Rupees, and shall:</p>
				<div>&nbsp;&nbsp;&nbsp;(e) be submitted in its original form; copies will not be accepted;</div>
				<div>&nbsp;&nbsp;&nbsp;(f) Remain valid for the period specified in the Data Sheet.</div>
				<p>21.3 Any quotation not accompanied by a substantially responsive Bid Security in accordance with Data Sheet, may be rejected by the Purchaser as non-responsive.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">22. Performance Security</td>
			<td width="80%" style="text-align:justify;">
				<p>A Performance Security shall be 10% of the Bid Value</p>
			</td>
		</tr>
	</tbody>
</table>


<br style="page-break-before: always">
<!-- Section 1 End -->

<h1 align="left" style="font-size:20px;font-weight:bold;">Section II. Data Sheet </h1>


<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
	<tbody>
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB Clause Reference</td>
			<td width="80%" style="text-align:justify;">
				<p>A. General</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 1.1</td>
			<td width="80%" style="text-align:justify;">
				<p>The Purchaser is : <?php echo $a40; ?></p>
				<p>Address : <?php echo $a41; ?></p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 5.1</td>
			<td width="80%" style="text-align:justify;">
				<div>If the bidder is allowed to quote for less than the all the items specified, indicate the details: </div>
				<div><?php echo $a42; ?></div>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 7.3</td>
			<td width="80%" style="text-align:justify;">
				<p>Manufactures Authorization is required</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 8</td>
			<td width="80%" style="text-align:justify;">
				<p>The Quotation shall be valid until:  <?php echo $a43; ?></p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 11.1</td>
			<td width="80%">
				<div>Address for submission of Quotations is:</div>
				<div>Senior Assistant  Bursar – Procurements</div>
				<div>University of Colombo School of Computing</div>
				<div>No 35 Reid Avenue Colombo 00700.</div>
				<br>
				<div>Deadline for submission of quoted items is: </div>
				<div>Date: <?php echo  date("jS F Y", strtotime($a44));?></div>
				<div>Time: <?php echo $a45;?></div>
				
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">IT 3.1</td>
			<td width="80%" style="text-align:justify;">
				<p>The Bidder shall submit the following additional documents:</p>
				<br>
				<p>&nbsp;&nbsp;&nbsp;a)	Bidder should have a proven track record in selling and maintaining Laptop Computers [Quoted Brands] for a minimum period of 03 Years.</p>
				<p>&nbsp;&nbsp;&nbsp;b)	Manufacturers Authorization</p>
				<p>&nbsp;&nbsp;&nbsp;c)	Vendor should provide documentary evidence to substantiate these conditions.</p>
				<p>&nbsp;&nbsp;&nbsp;d)	Statement - 03 years comprehensive on- site warranty with battery from Manufacture.</p>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 13</td>
			<td width="80%" style="text-align:justify;">
				<div>The quotations shall be opened at the following address:</div><br>
				<div><?php echo $a46; ?></div>
				
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 16</td>
			<td width="80%" style="text-align:justify;">
				<div>Other factors that will be considered for evaluation are (List and describe the methodology):</div>
				<div>&nbsp;&nbsp;&nbsp;a)	The Price as quoted;</div>
				<div>&nbsp;&nbsp;&nbsp;b)	Price adjustment for correction of arithmetical errors;</div>
				<div>&nbsp;&nbsp;&nbsp;c)	Price adjustment due to discounts offered.</div>
				<div>&nbsp;&nbsp;&nbsp;d)	Bidder should have a proven track record in selling and maintaining Laptop Computes [Quoted Brands] for a minimum period of 03 Years.</div>
				<div>&nbsp;&nbsp;&nbsp;e)	Statement - 03 years comprehensive on- site warranty with battery from Manufacture.</div>
				<div>&nbsp;&nbsp;&nbsp;f)	Manufacturers Authorization</div>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 20</td>
			<td width="80%" style="text-align:justify;">
				<p>The method and conditions of payment to be made to the Supplier under this Contract shall be as follows:</p>
				<ul>
					<li>Advance payment will not be allowed.</li>
					<li>Payment shall be made in Sri Lanka Rupees within Thirty (30) days of presentation of claim supported by a certificate from the Purchaser declaring that the Goods have been delivered and that all other contracted Services have been performed.</li>
				</ul>
			</td>
		</tr>
		
		<tr>
			<td width="20%" style="font-weight:bold;" valign="top">ITB 21</td>
			<td width="80%" style="text-align:justify;">
				<p>Bid shall include a Bid Security issued from a Commercial Bank Registered in Central Bank of Sri Lanka or Cash Deposit. Specimen Format Included in Section IV Bidding Forms & Bid Security should be addressed in favor of Director University of Colombo School of Computing</p>
				<div>The amount of the bid security shall be : RS.<?php echo number_format($a47,2); ?></div>
				<div>The validity period of the bid security shall be until:  : <?php echo  date("jS F Y", strtotime($a48));?></div>
			</td>
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
<!-- Section 2 End -->
<br style="page-break-before: always">

	<h1 align="left" style="font-size:20px;font-weight:bold;">Letter of Authorization to Sign the Bid</h1>
	<br>
	<br>
	<div>Date:</div>
	<br>
	<div>Chairman  - DPC</div>
	<div>University of Colombo School of Computing</div>
	<div>No 35 Reid Avenue Colombo 00700.</div>
	<br>
	<div>Dear Sir</div>
	<br>
	<p style="text-align:justify; font-weight:bold;"><?php echo $projnme."  [INVITATION NO: ".$projid."]"; ?></p>

	<p style="text-align:justify; ">This is to authorize that Mr/ Miss............................................, bearing National Identity card No:....................................... Whose specimen signature is certified below, to sign the documents pertaining to the above bid on behalf of (Name of the Organization).</p>
	<div>Specimen signature of Authorizee: ..........................................</div>
	<br>
	<br>
	<br>
	<div>Name of the Authorizee: ..........................................</div>
	<br>
	<br>
	<br>
	<div>Designation of the Authorizer :  ..........................................</div>
	<br>
	<br>
	<br>
	<br>
	<div>Company Seal :   ..........................................</div>
	<div>(COMPANY DIRECTOR/S SHOULD BE AUTHORIZED)</div>
	
<br style="page-break-before: always">

	<h1>Section IV: Schedule of Requirements </h1>
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<thead>
			<tr>
				<th width="10%">Serial No.</th>
				<th width="40%">Description of Goods.</th>
				<th width="40%">Quantity</th>
				<th width="10%">Completion Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$y1=0;
			$sql11="SELECT * FROM shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
			$result11 = mysqli_query($link,$sql11);
			while($row11=mysqli_fetch_array($result11)){
				$y1++;
			?>
				<tr>
					<td><?php echo $y1; ?></td>
					<td><?php echo $row11['item_nme']; ?></td>
					<td><?php echo $row11['qty']; ?></td>
					<td><?php echo $row11['completion_dte']; ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	
	<p style="text-align:justify;">Name of the Authorized Person  :..........................................................................................
	
	<p style="text-align:justify;">Signature of the Authorized Person : .....................................................................................</p><br>
	<div>Date: <?php echo $cur_dte;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; .................................................</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company Seal</div>
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
<br style="page-break-before: always">

			<?php
				$sql8="SELECT * FROM shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
				$result8 = mysqli_query($link,$sql8);
				while($row8=mysqli_fetch_array($result8)){
			?>
					<div style="font-weight:bold;font-size:19px;"><u>SPECIFICATION FOR <?php echo strtoupper($row8['item_nme'])." - ".$row8['qty'] ?>NOS </u></div>
					<br>
					
					<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
						<thead>
							<tr>
								<th width="30%" style="font-weight:bold">Specification</th>
								<th width="60%" style="font-weight:bold">Minimum Requirement</th>
								<th width="5%" style="font-weight:bold">Bidders Response <br>(Yes/No)</th>
								<th width="5%" style="font-weight:bold">Remark</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql9="SELECT * FROM shopping_itemspec_details WHERE project_key='$_GET[p]' AND item_key='$row8[shopping_ini_item_key]' AND status=0";
							$result9 = mysqli_query($link,$sql9);
							while($row9=mysqli_fetch_array($result9)){
							?>
							<tr>
								<td width="30%" style="font-weight:bold"><?php echo $row9['specification_detail']; ?></td>
								<td width="55%" > <?php echo $row9['requirement']; ?></td>
								<td width="5%" align="center"></td>
								<td width="5%" align="center"></td>
							</tr>
							<?php
							}
							?>
							
						</tbody>
						
					</table>
				<?php
				}
				?>
<br style="page-break-before: always">

<h1 align="left" style="font-size:20px;font-weight:bold;">Section IV. Quotation Submission Form</h1>

<p style="text-align:justify;">[The Vendor shall fill in this Form in accordance with the instructions indicated No alterations to its format shall be permitted and no substitutions shall be accepted.]</p>
<p style="text-align:justify;">Date: ...............................................</p>
<p style="text-align:justify;">No.: ................................................</p>
<p style="text-align:justify;">To: University of Colombo School of Computing</p>

<p style="text-align:justify;">We, the undersigned, declare that:</p>
<p style="text-align:justify;">&nbsp;&nbsp;(a)	We have examined and have no reservations to the Bidding Documents, including Addenda No.: </p>

<p style="text-align:justify;">&nbsp;&nbsp;(b)We offer to supply in conformity with the Bidding Documents and in accordance with the Delivery Schedules specified in the Schedule of Requirements the following Goods and Related Services </p>
<p style="text-align:justify;"><?php echo $projnme;?> (Invitation No : <?php echo $projid;?>)</p>
	
	
<p style="text-align:justify;">&nbsp;&nbsp;(c) The total price of our Bid without VAT, including any discounts offered is: </p>
<p style="text-align:justify;">..........................................................................................................................................................
					..........................................................................................................................................................</p>
					
<p style="text-align:justify;">&nbsp;&nbsp;(d)	The total price of our Bid including VAT, and any discounts offered is:  </p>
<p style="text-align:justify;">..........................................................................................................................................................
					..........................................................................................................................................................</p>
</p>
		
<p style="text-align:justify;">&nbsp;&nbsp;(e) Our quotation shall be valid for the period of time specified in ITV Sub-Clause 8.1, from the date fixed for the quotation submission deadline in accordance with ITV Sub-Clause 11.1, and it shall remain binding upon us and may be accepted at any time before the expiration of that period;</p>
<p style="text-align:justify;">&nbsp;&nbsp;(f)	If our quotation is accepted, we commit to obtain a performance security in accordance with ITV Clause 22</p>
<p style="text-align:justify;">&nbsp;&nbsp;(h) Our firm, its affiliates or subsidiaries—including any subcontractors or suppliers for any part of the contract—has not been declared blacklisted by the National Procurement Agency;</p>
<p style="text-align:justify;">&nbsp;&nbsp;(k) We understand that this quotation, together with your written acceptance thereof included in your notification of award, shall constitute a binding contract between us, until a formal contract is prepared and executed.</p>
<p style="text-align:justify;">&nbsp;&nbsp;(l) We understand that you are not bound to accept the lowest evaluated quotation or any other quotation that you may receive.</p>

<p style="text-align:justify;">Signed: </p>

<p style="text-align:justify;">In the capacity of </p>

<p style="text-align:justify;">Duly authorized to sign the bid for and on behalf of:  </p>
<p style="text-align:justify;">Dated on _______________________________day of _________________, _______ </p>
<p style="text-align:justify;">Company Seal</p>
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
<br style="page-break-before: always">

	<h1 align="left" style="font-size:20px;font-weight:bold;">Section V Price Schedule </h1>
		
		<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
			<thead>
				<tr>
					<th width="10%" style="font-weight:bold">S No</th>
					<th width="50%" style="font-weight:bold">Item</th>
					<th width="10%" style="font-weight:bold">Quantity</th>
					<th width="10%" style="font-weight:bold">Unit Price  <br>(Without<br> VAT)In <br> figures(Rs.) </th>
					<th width="10%" style="font-weight:bold">Total Price <br>(Without VAT) In<br> figures(Rs.)</th>
					<th width="10%" style="font-weight:bold">Total Price (with<br> VAT) In figures(Rs.)</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$totpricewithoutvat_sec5=0;
				$totpricewithtvat_sec5=0;
				$i3=0;
				$sql5="SELECT * FROM shopping_initial_item_details WHERE project_key='$_GET[p]' AND status=0";
				$result5 = mysqli_query($link,$sql5);
				while($row5=mysqli_fetch_array($result5)){	
					$i3++;
				?>
					<tr>
						<td style="font-weight:bold;font-size:18px;" align="center"><?php echo $i3; ?></td>
						<td><?php echo $row5['item_nme']; ?></td>
						<td><?php echo $row5['qty']; ?></td>
						<td align="right"></td>
						<td align="right"></td>
						<td align="right"></td>
					</tr>
				<?php
				}
				?>
				<tr>
						<td colspan="4" align="center" style="font-weight:bold">Grand Total (Rs)</td>
						<td align="right" style="font-weight:bold"></td>
						<td align="right" style="font-weight:bold"></td>
				</tr>
			</tbody>
		</table>
		
		<p style="text-align:justify;">Total Price Without VAT(In Figures -Rs) : </p>
		<p style="text-align:justify;">..........................................................................................................................................................
		............................................................................................................................................................</p>
		<p style="text-align:justify;">Total Price Without VAT(In Figures -Rs) : </p>
		<p style="text-align:justify;">..........................................................................................................................................................
		............................................................................................................................................................</p>
		<p style="text-align:justify;">Total Price Without  VAT(In Words - SLR) :</p>
		<p style="text-align:justify;">..........................................................................................................................................................
		............................................................................................................................................................</p>
			
		<p style="text-align:justify;">Vat Registration No  (Please attached  VAT Reg: Certificate) : .................................................................</p>
		
		
		<p style="text-align:justify;">Total Price With VAT :</p>
		<p style="text-align:justify;">..........................................................................................................................................................
		............................................................................................................................................................</p>
		<p style="text-align:justify;">Total Price With VAT (In Words - SLR) :</p>
		<p style="text-align:justify;">..........................................................................................................................................................
		............................................................................................................................................................</p>
		
		<p style="text-align:justify;">Name of the Authorized Person :........................................................................................................</p>
		<p  style="text-align:justify;">Signature of the Authorized Person : _______________________________________________</p>
		<br>
		<br>
		<div>.......................... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...................................</div>
		<div>&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Company Seal</div>
		<br>
		<br>
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
	
<!-- Section 5 price list End -->	
	

<br style="page-break-before: always">


	<h2><div style="font-size:22px;font-weight:bold;">Manufacturer&#39;s Authorization</div></h2>
	
	<p style="text-align:justify;">[The Vendor shall require the Manufacturer to fill in this Form in accordance with the instructions indicated. This letter of authorization should be on the letterhead of the Manufacturer and should be signed by a person with the proper authority to sign documents that are binding on the Manufacturer. The Vendor shall include it in its bid, if so indicated in the DS.]</p>
	<div>Date :...................................</div><br>
	<div>No : ...............................................</div><br>
	<div>To: Director, University Of Colombo School of Computing.</div><br>
	<div>WHEREAS</div><br>
	<p style="text-align:justify;">We [insert complete name of Manufacturer], 
	who are official manufacturers of  [insert type of goods manufactured], 
	having factories at   [insert full address of Manufacturer&#39;s factories], 
	do hereby authorize [insert complete name of Bidder] to submit a bid the purpose of which is to provide the following Goods, 
	manufactured by us [insert name and or brief description of the Goods], and to subsequently negotiate and sign the Contract.</p>
	
	<p style="text-align:justify;">We hereby extend our full guarantee and warranty in accordance with Clause 27 of the Conditions of Contract, with respect to the Goods offered by the above firm.</p>
	<div>Signed:: [insert signature(s) of authorized representative(s) of the Manufacturer]</div><br><br><br>
	<div>Name: [insert complete name(s) of authorized representative(s) of the Manufacturer]</div>
	
	<p style="text-align:justify;">Title :[insert title]</p>
	
	<p style="text-align:justify;">Duly authorized to sign this Authorization on behalf of : </p>
	<p style="text-align:justify;">Dated on ______________day of __________________, ____________</p>
	
	

<br style="page-break-before: always">

	<h2><div style="font-size:20px;font-weight:bold;">Section IX. Bid Guarantee</div></h2>
	<br>
	<div style="font-size:16px;font-weight:bold;"><i>[This Bank Guarantee form shall be filled in accordance with the instructions indicated in brackets]</i></div>
	<p style="text-align:justify;">...............................................................................................................................................</p>
	
	<div>[Insert issuing agency&#39;s name and address of issuing branch or office]</div>
	
	<div style="font-weight:bold;">Beneficiary: Director, University of Colombo School of Computing at 35, Reid Avenue, Colombo 07.</div>
	
	<div style="font-weight:bold;">Date: ................... [Insert (by issuing agency) date]</div>
	
	<p style="text-align:justify;"><b>BID GUARANTEE NO.: ...................................</b> [Insert (by issuing agency) number] 
		We have been informed that ................................................ [Insert (by issuing agency) name of the bidder]
		(Hereinafter called &quot;the Bidder&quot;) has submitted to you its bid dated .......................... [Insert (by issuing agency) date]
		(Hereinafter called &quot;the Bid&quot;) for execution of the contract for ....................................... (Contract No: ..........................) 
		under Invitation for Bids No.  .............................. (&quot;The IFB&quot;).</p>
	
	<p style="text-align:justify;">Furthermore, we understand that, according to your conditions, Bids must be supported by a Bid Guarantee.</p>
	
	<p style="text-align:justify;">At the request of the Bidder, we ....................................................................... [Insert name of issuing agency] hereby irrevocably undertake to pay you any sum or sums not exceeding in 
				total an amount of ................................................................................................................................................................................................................. [Insert amount in words] 
				...................................... [insert amount in figures] 
				upon receipt by us of your first demand in writing accompanied by a written statement stating that the bidder is in breach of its obligation(s) under the bid conditions, because the Bidder:
	</p>
	
	<div>&#9;(a)	has withdrawn its Bid during the period of bid validity specified; or</div><br>
	<div>&#9;(b)	does not accept the correction of errors in accordance with the Instructions to Bidders &#9;(hereinafter &quot;the  ITB&quot;); or</div><br>
	<div>&#9;(c)	having been notified of the acceptance of its Bid by the Employer during the period of &#9;bid validity, (i) fails to refuses to execute the Contract Form, if required, or (ii) fails &#9;to refuses to furnish a Performance Security, in accordance with the ITB.</div><br>
	
	<p style="text-align:justify;">This guarantee shall expire: (a) if the Bidder is the successful bidder, upon our receipt of copies of the Contract signed by the Bidder and of the Performance Security issued to you by the Bidder; or (b) if the Bidder is not the successful bidder, upon the earlier of (i) the successful bidder furnishing the performance security, otherwise it will remain in force up to ..................................... </p>
	<p style="text-align:justify;">Consequently, any demand for payment under this Guarantee must be received by us at this office on or before that date.</p>
	<br>
	<br>
	<div align="center" style="font-weight:bold">...............................................................................................................</div>
	<div align="center" style="font-weight:bold">[Signature of authorized representative(s)]</div>
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
<br style="page-break-before: always">

	<h1 align="left" style="font-size:20px;font-weight:bold;">Letter of Authorization to Sign the Bid</h1>
	<br>
	<br>
	<div>Date:</div>
	<br>
	<div>Chairman  - DPC</div>
	<div>University of Colombo School of Computing</div>
	<div>No 35 Reid Avenue Colombo 00700.</div>
	<br>
	<div>Dear Sir</div>
	<br>
	<p style="text-align:justify; font-weight:bold;"><?php echo $projnme."  [INVITATION NO: ".$projid."]"; ?></p>

	<p style="text-align:justify; ">This is to authorize that Mr/ Miss............................................, bearing National Identity card No:....................................... Whose specimen signature is certified below, to sign the documents pertaining to the above bid on behalf of (Name of the Organization).</p>
	<div>Specimen signature of Authorizee: ..........................................</div>
	<br>
	<br>
	<br>
	<div>Name of the Authorizee: ..........................................</div>
	<br>
	<br>
	<br>
	<div>Thank You</div>
	<br>
	<br>
	<br>
	<br>
	<div>Yours sincerely</div>
	<div>(Name of the Organization)</div>
	
<br style="page-break-before: always">	
</div>
</body>
</html>

<?php
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=Shopping_Bidding_Document_".$projid.".doc");   
?>