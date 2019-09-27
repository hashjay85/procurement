<?php
 ob_start();
 $cur_dte=date("Y-m-d");
	include("includes/conn.php");
	
?> 


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
</head>
	<script type="text/javascript" src="number_to_words/numberToWords.min.js"></script>
<body>
	<h2 align="center">Supplier Information</h2>
	<br>
	<br>
	
	<table border="1" style=" border: 1px solid black;border-collapse: collapse;" width="100%">
		<thead>
				<tr>
					<th>Registration No</th>
					<th>Supplier Name</th>
					<th>Address</th>
					<th>Telephone No</th>
					<th>Fax No</th>
					<th>Email</th>
				</tr>
		</thead>
		<tbody>							
			<?php
											
			$sql5="SELECT * FROM supplier_master WHERE status=0 ORDER BY supplier_name ASC";
			$result5 = mysqli_query($link,$sql5);
			while($row5=mysqli_fetch_array($result5)){	
			?>
				<tr>
					<td><?php echo $row5['registration_no'];?></td>
					<td><?php echo $row5['supplier_name'];?></td>
					<td><?php echo $row5['address'];?></td>
					<td><?php echo $row5['tp_no'];?></td>
					<td><?php echo $row5['fax_no'];?></td>
					<td><?php echo $row5['email_address'];?></td>
			<?php
				}
			?>
			</tbody>
	</table>
</body>
</html>

<?php
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=supplier_infomation.doc");   
?>