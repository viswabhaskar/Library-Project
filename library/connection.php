<?php
	$con=mysqli_connect('localhost','root','','student');
	
	
if($con)
{
//echo "<p>Connection success</p>";
}
else
{
die (mysqli_connect_error());
}
?>