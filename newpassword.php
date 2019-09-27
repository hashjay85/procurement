<?php include("includes/a_config.php");?>
<?php 
include("includes/conn.php");
include("includes/sessionconfig.php");

$cur_dte=date("Y-m-d");
?>	
 




<?php
  if(isset($_POST['btn_newpwadd'])){
       $nwp=$_POST['txt_newpassword'];
       $nwcp=$_POST['txt_confirmpassword'];

       if($nwp==""){
            $message="Please Enter the New Password";
       }
       else if($nwcp==""){
             $message="Please Enter the Confirm Password";
       }
       else if($nwp!==$nwcp){
            $message="Not Match the Password";
       }
       else if($nwcp=="9900" || $nwcp=="9900"){
              $message="This Password Not Used";
       }
       else{
            $password=MD5($_POST['txt_newpassword']);
            $sql13 = "UPDATE user_master SET password='$password' WHERE user_key='$ses_ukey'";
            if(mysqli_query($link, $sql13)){
				echo "<script>
						alert('Successfully Update Password.');
						window.location.href='index.php';
					</script>";
			}
           
       }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head-tag-contents.php");?>
</head>
<body>
<?php include("includes/design-top.php");?>
<div class="container" id="main-content">

        <div class="row">
                <div class="col-lg-3">
                   
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel-primary panel-transparent">
                                <div class="panel-body">
                                 <form role="form" id="form1" name="form1" method="post" action="">
                                  <div class="form-group" align="center">
                                        <label style="font-size: 130%;">User Name: <?php echo $ses_user; ?></label>
                                      
                                    </div>
                                     <div class="form-group" >
                                        <label>New Password</label>
                                        <input type="password" name="txt_newpassword" class="form-control" >
                                    </div>
                                    <div class="form-group" >
                                        <label>Confirm Password</label>
                                        <input type="password" name="txt_confirmpassword" class="form-control" >
                                    </div>
                                    <button type="submit" name="btn_newpwadd" class="btn btn-default btn-lg btn-block" style="background-color: #008CBA;">New Password</button>
                                  </div>
                                 </form>
                              </section>
                            </div>
                        </div>
                </div>  
		</div> 
			

</div>
</body>

<?php
mysqli_close($link);
?>
</html>
