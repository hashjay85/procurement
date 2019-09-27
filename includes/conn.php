<?php
$link = mysqli_connect("localhost", "root", "", "proc");
  

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
 
 error_reporting(0);
?>