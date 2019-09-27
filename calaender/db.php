<?php
$conn = mysqli_connect("localhost","root","","proc") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>