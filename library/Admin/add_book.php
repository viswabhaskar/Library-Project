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
<title>Add Book</title>
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
</style>

</head>
<body>
<h1 align='center'>Add Book</h1>
<form action='' method='POST'>
<table> 
<tr><td>Book Number:</td><td><input type='text'id='text' name='bno' size='10'placeholder='Book Number' autofocus required></td>
<tr><td>Book Name :</td><td><input type='text' id='text' name='book_name' placeholder='Name' required></td></tr>
<tr><td>Auther</td><td><input type='text'  id='text'name='auther'  placeholder='Auther' required></td></tr>
<tr><td>Branch :</td>
	<td><select name='branch' required id='text'>
			<option></option>
			<option>CIVIL</option>
			<option>EEE</option>
			<option>MECH</option>
			<option>ECE</option>
			<option>CSE</option>
			<option>IT</option>
		</select>
	</td></tr>
<tr><td><input type='submit' name='submit' value='Add Book'></td><td><input type='reset' name='reset' value='Reset'></td></tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
	{
		
		$bno=$_POST['bno'];
		$bname=$_POST['book_name'];
		$auther=$_POST['auther'];
		$branch=$_POST['branch'];
	
		//echo "Name :".$bname."  roll number".$bno."  branch".$branch."  city".$auther;
		
		include('..\connection.php');
		//rno,name,branch,scity,year,sem
		$query="insert into book_data values('$bno','$bname','$auther','$branch')";
		
		$result=mysqli_query($con,$query);
		echo $result."<br>";echo "asdasdadaadd";
		if($result)
		{
			echo "inserted a row";
		}
		else
		{
			echo "<script>alert('Student Alredy Exits');window.location.href='add_student.php';</script>";
		}
	}
?>

