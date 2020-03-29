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
<style>
#err
{
color:red;
font-size:20px;
}
body
{
padding:20px;
}
#a
{
font-size:20px;
}
#a:hover
{
font-size:25px;
}
td
{
font-size:25px;
}
#text
{
font-size:25px;
}
#na
{
border-radius:10px;
height:30px;
}
#sub
{
background-color:cyan;
border-radius:10px;
font-size:20px;
border-color:orange;
}
button
{
background-color:cyan;
width:250px;
height:50px;
border-radius:10px;
border-color:red;
font-size:15px;
}
button:hover
{
background-color:rgb(142,245,220);
width:250px;
}
{
color:red;
font-size:25px;
}

</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<h1 align='center'>PROMOTE STUDENTS</h1>
<table border='2'>
<tr><td><label id='text'>From Year And Semester:</label></td>
<td>Year :
	<select  name='pyear' required>
		<option value='0'>       </option>
		<option >1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
	</select> </td>
<td>Semester :
	<select  name='psem' required>
		<option value='0'>       </option>
		<option >1</option>
		<option value='2'>2</option>
	</select>
</td></tr>
<tr align='center'><td colspan='3'><h3>TO</h3></td></tr><tr><td>
<label id='text'>To Year And Semester:</label></td>
<td>Year :
	<select name='tyear'  required>
		<option value='0'>       </option>
		<option >1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
	</select></td> 
<td>Semester :
	<select name='tsem' required>
	<option value='0'>       </option>
		<option >1</option>
		<option value='2'>2</option>
	</select>
</td></tr>
<tr align='center'><td colspan='3'><input type='submit' name='submit' value='submit' id='sub'></td></tr>
</table>
</form>


<?php
if(isset($_POST['submit']))
{
$pyear=$_POST['pyear'];
$psem=$_POST['psem'];

$tyear=$_POST['tyear'];
$tsem=$_POST['tsem'];


//echo $pyear.$psem.$tyear.$tsem."<br>";

$con=mysqli_connect('localhost','root','','student');

$query="update stu_data set syear=$tyear,sem=$tsem where syear=$pyear and sem=$psem";
$result=mysqli_query($con,$query);
if($result=1)
{
	echo "<script> alert('Students Promoted Sucessfully');</script>";
}
else
{
echo "<p id='err'>no results found</p>";
}
mysqli_close($con);
}
?>
<br/><br/>
<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>
</body>
</html>