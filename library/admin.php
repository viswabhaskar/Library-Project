<html>
<head>
<meta charset="utf-8">
<title>LIBRARY MANAGEMENT</title>
<link rel="stylesheet" type="text/css" href="admincss.css">
</head>
<body>
<div id="login">
<h1><strong>Welcome.</strong> Please login.</h1>
<form action="" method="post">
<fieldset>
<p><input type="text" required name='uname' value="Username" autofocus onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "></p>
<p><input type="password" required name='pwd' value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
<p><input type="submit" value="Login" name='submit'></p>
</fieldset>
</form>
</div> <!-- end login -->
</body>

<?php

session_start();

if(isset($_POST['submit']))
{
	
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	
	//echo "username ".$uname."password".$pwd."<br>";
	
	$con=mysqli_connect('localhost','root','','student') or die('connection faild');
	
	$query="select uname,pwd from users where uname='$uname' and pwd='$pwd'";
	$result=mysqli_query($con,$query);
	$num=mysqli_num_rows($result);
	if($num==1)
	{
	
		$_SESSION['un']=session_id();
		$_SESSION['uname']=$uname;
	
		//echo "sucess";
		$msg='Login Sucessfully';
		echo"<script>alert('$msg Admin Panel');window.location.href='http://localhost/library/admin/';</script>";
	
	}
	else
	{
		echo"<script>alert('$msg   Entered Username or Password is Incorrect ');window.location.href='admin.php';</script>";
		$msg='Invalid Login'.'\n';
	}
}
?>
</html>