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
p
{
color:red;
font-size:25px;
}
tr
{
border-color:blue;
border-size:200px;
}

</style>

</head>
<body>

<?php
if(isset($_POST['submit']))
	{
		$rno=$_POST['rno'];
		$sname=$_POST['name'];
		$branch=$_POST['branch'];
		$scity=$_POST['scity'];
		$syear=$_POST['syear'];
		$sem=$_POST['sem'];
		$ph=$_POST['ph'];
		$sec=$_POST['sec'];
		
		//echo $rno.$sname.$branch.$scity.$syear.$sem;
		
		
		include('..\connection.php');
		//rno,name,branch,scity,year,sem
		
		 $query="update stu_data set name='$sname', branch='$branch' , scity='$scity' , syear='$syear' , sem=$sem , phone_num=$ph ,section='$sec' where rno='$rno'";
		
		
		$result=mysqli_query($con,$query);
		//echo $result."<br>";echo "asdasdadaadd";
		if($result)
		{
			//echo "inserted a row";
			echo "<script>alert('Data Updated');window.location.href='Edit_Student.php';</script>";
		}
		else
		{
			echo "<script>alert('Student Not Exits');window.location.href='add_student.php';</script>";
		}
	}
?>

