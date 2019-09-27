<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <!-- Navbar content -->

<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="../index.php">Index</a>
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
		  <a class="dropdown-item" href="../proj.php">Initialize a Project</a>
		  <a class="dropdown-item" href="../boq.php">Create a BOQ</a>
		  <a class="dropdown-item" href="#">Something else here</a>
		  <div class="dropdown-divider"></div>
		  <a class="dropdown-item" href="../reports.php">Reports</a>
		</div>
	  </li>
	  
	  	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="../calendar/fullcalendar.php"> Calender</a>
	  </li>	 
	  

	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="../reports.php">Reports</a>
	  </li>	  
	  

	  
	</ul>
	
	 <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
	

	
	<ul class="nav nav-pills">
	
		  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="../contact.php">Contact us</a>
	  </li>
	
			<li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../home.php" role="button" aria-haspopup="true" aria-expanded="false">User Management</a>
		<div class="dropdown-menu">
		<a class="dropdown-item" href="../reg.php">Register a User</a>
		<a class="dropdown-item" href="#">Reset a Password</a>
		
		
	<li class="nav-item dropdown">  	  
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $ses_user;?></a>
		<div class="dropdown-menu">
		  <a class="dropdown-item" href="../reg.php">Change Password</a>
		  <div class="dropdown-divider"></div>
		  <a class="dropdown-item" href="../index.php">Log out</a>
		</div>
	  </li>	  
	 </ul>

</div>
</nav>



