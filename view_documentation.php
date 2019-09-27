<?php 
include("includes/a_config.php");

//error_reporting(0);
?>

<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");

?>

<?php
	
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
<?php
	$fp = fopen("upload_doc/003-NCB_Bidding_Document.doc", "rb");
	$contents_doc = fread($fp, filesize("upload_doc/003-NCB_Bidding_Document.doc"));
	fclose($fp);
	echo $contents_doc;
	
	
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