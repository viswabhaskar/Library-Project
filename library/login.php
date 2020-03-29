<html>
<head>
<style>

</style>
</head>
<body>
<div class='back'>
<form action='' post='post'>
<label>User Name :</label><input type='text' name='usr'>
<label>Password :</label><input type='password' name='pwd'>
<input type='submit' name='submit' value='Login'>
<input type='reset'>

</div>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	
	include "connection.php";
$usr_name=$_POST['usr'];
$pwd=$_POST['pwd'];

echo "user".$usr_name."pwd".$pwd;

}
?>