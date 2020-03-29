<?php
  session_start();
if($_SESSION['un']==session_id())
{

$uname=$_SESSION['uname'];

}
else
{
	echo"<script>alert('LogIn First ');window.location.href='http://localhost/library/admin.php';</script>";
	
}
?>

<html>
<head>
<title>Add Student</title>
<style>
body
{
background-color:cyan;
}
h1
{
color:red;
font-size:25px;

}
tr
{
border-color:blue;
border-size:200px;
}
#text
{
border-color:rgb(100,140,150);
border-radius:5px;
height:25px;
font-size:18px;
}
#text:hover
{
border-color:red;
border-radius:5px;
height:25px;
font-size:18px;
}
#sub
{
background-color:cyan;
border-radius:10px;
font-size:20px;
border-color:orange;
}

</style>

</head>
<body>
<h1 align='center'>ADD STUDENT</h1>
<form action='' method='POST'>
<table> 
<tr><td>Roll Number:</td><td><input type='text' name='rno' id='text' size='10'placeholder=' Roll Number' required autofocus></td>
<tr><td>Name :</td><td><input type='text' name='stu_name' id='text' placeholder='  Name' required></td></tr>
<tr><td>Branch :</td>
	<td><select name='branch' id='text' required>
			<option></option>
			<option>CIVIL</option>
			<option>EEE</option>
			<option>MECH</option>
			<option>ECE</option>
			<option>CSE</option>
			<option>IT</option>
		</select>
	</td></tr>
<tr><td>Student_city</td><td><input type='text' name='city' id='text'  placeholder='   kakinada' required></td></tr>
<tr><td>Year</td><td><input type='text' name='year' id='text' placeholder='  Year' required></td></tr>
<tr><td>Semester</td><td><input type='text' name='sem' id='text' placeholder='   semester' required></td></tr>
<tr><td>Phone Number</td><td><input type='text' name='ph' id='text' placeholder='   phone Number' required></td></tr>
<tr><td>Section</td><td>
<select name='sec' id='text' required>
			<option></option>
			<option>A</option>
			<option>B</option>
			
</td></tr>
<tr><td><input type='submit' name='submit' value='Add Student' id='sub'></td><td><input type='reset' name='reset' value='Reset' id='sub'></td></tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
	{
		$rno=$_POST['rno'];
		$name=$_POST['stu_name'];
		$branch=$_POST['branch'];
		$city=$_POST['city'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		$ph=$_POST['ph'];
		$sec=$_POST['sec'];
		
		//echo "Name :".$name."  roll number".$rno."  branch".$branch."  city".$city."  year".$year."  semester".$sem;
		
		include('..\connection.php');
		//rno,name,branch,scity,year,sem
		$query="insert into stu_data values('$rno','$name','$branch','$city','$year','$sem',$ph,'$sec')";
		
		$result=mysqli_query($con,$query);
	//	echo $result."<br>";echo "asdasdadaadd";
		if($result)
		{
			echo "<script>alert('STUDENT ADDED');</script>";
		}
		else
		{
			echo "<script>alert('Student alredy exits');window.location.href='add_student.php';</script>";
		}
	}
?>

