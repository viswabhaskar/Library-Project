<html>
<head>
<style>
body
{
background-color:cyan;
}
label
{
	font-size:15px;
	font-family:Imprint MT Shadow;
}
table
{

}
</style>
</head>
<body>
<br><br>
<form action='' method='POST'>
<table border='1' width='' height='200' align='center'>
<tr><th colspan='2'><--------- Enter Student Details --------></th></tr>
<tr>
	<td>
		<label>Name :</label>
	</td>
	<td>
		<input type='text' name='sname' autofocus>
	</td>
</tr>
<tr>
	<td>
		<label>Roll No :</label>
	</td>
	<td>
		<input type='text' name='rollno' size='10'>
	</td>
</tr>

 <tr>
	<td>
		<label>City :</label>
	</td>
	<td>
		<input type='text' name='city'>
	</td>
</tr>
<tr>
	<td>
		<label>Branch :</label>
	</td>
	<td>
		<select name='branch' >
			<option>select</option>
			<option>CIVIL</option>
			<option>EEE</option>
			<option>MECH</option>
			<option>ECE</option>
			<option>CSE</option>
		</select>
	</td>
</tr>
<tr align='center'>
	<td colspan='2'>
		<input type='submit' name='Insert'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type='reset'>
	</td>

</tr>
</table>
</form>
</body>
</html>

<?php

if(isset($_POST['Insert']))
{
	$rollno=$_POST['rollno'];
	$fname=$_POST['sname'];
	$branch=$_POST['branch'];
	$city=$_POST['city'];

	echo "ROLL NO".$rollno."NAME".$fname."BRANCH".$branch."CITY".$city;	
	
	$con=mysql_connect('localhost','root','');
	mysql_select_db("student",$con);
	
	$sql1="insert into stu_info values('$rollno','$fname','$branch','City','I')";
	echo"<script>alert('Sucessfully Inserted');</script>";
	$result=mysql_query($sql1,$con);
	
	

	if(!$result)
		{
			echo"<script>alert('error');</script>";
			die('error '.mysql_error());
		}

else
	{
		echo"<script>alert('Sucessfully Inserted');</script>";

	}	
}

?>