


<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <!-- Navbar content -->

<div class="container">


	<ul class="nav nav-pills">
	
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="home.php">Home</a>
	  </li> 
	  <!--
	  
	  <li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="home.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
		<div class="dropdown-menu">
		<a class="dropdown-item" href="home.php">About the PMS</a>
		<a class="dropdown-item" href="about.php">About us</a> -->
		

		
			  
	  <!--
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Home") {?>active<?php }?>" href="home.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "About") {?>active<?php }?>" href="about.php">About Us</a>
	  </li>
	  </li>
	  -->
	  
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Initial Data</a>
		<div class="dropdown-menu">
		  <a class="dropdown-item" href="proj.php">Initialize a Project</a>
		  <a class="dropdown-item" href="documentation.php">Project Documentation</a>
		  <a class="dropdown-item" href="specification.php">Create Specification</a>	
		  <a class="dropdown-item" href="upload_documents.php">Upload Documents</a>	
		  <!--<a class="dropdown-item" href="boq.php">Create a BOQ</a>
		  <a class="dropdown-item" href="boq_ec.php">Edit/Confirm BOQ</a>-->
		  <a class="dropdown-item" href="bid_process.php">Bid Process</a>
		  <a class="dropdown-item" href="bidEvaluation.php">Bid Evaluation</a>
		  <a class="dropdown-item" href="supplieradd.php">Supplier Registration</a>
		  <a class="dropdown-item" href="supplier_eddel.php">Supplier Edit And Delete Information</a>
		  <div class="dropdown-divider"></div>
		  <a class="dropdown-item" href="supplier_report.php">Supplier Information Report</a>
		</div>
	  </li>
	  
	    <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Direct Purchasing</a>
		<div class="dropdown-menu">
		  <a class="dropdown-item" href="direct_purchase.php">Initial Direct Purchasing</a>
		  <a class="dropdown-item" href="direct_purchase_menu.php">Direct Purchasing</a>
		</div>
	  </li>
	  
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="calaender/index.php"> Calender</a>
	  </li>	 
	  

	  

	  
	</ul>
	
	 <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
	

	
	<ul class="nav nav-pills">
	
		  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="contact.php">Contact us</a>
	  </li>
	
			<li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="home.php" role="button" aria-haspopup="true" aria-expanded="false">User Management</a>
		<div class="dropdown-menu">
		<a class="dropdown-item" href="reg.php">Register a User</a>
		<a class="dropdown-item" href="reset_pws.php">Reset a Password</a>
		
		
	<li class="nav-item dropdown">  	  
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $ses_user;?></a>
		<div class="dropdown-menu">
		  <a class="dropdown-item" href="reg.php">
					<div><b>User Name: <?php echo $ses_user;?></b></div>
					<div><b>User Level : <?php echo $ses_ulevel;?></b></div>
					<div><b>Department : <?php echo $ses_dep;?></b></div>
		  
		  </a>
		  <div class="dropdown-divider"></div>
		  <a class="dropdown-item" href="logout.php">Log out</a>
		</div>
	  </li>	  
	 </ul>

</div>
</nav>



