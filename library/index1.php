<html>
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

<frameset rows='30%,60%,10%'>
<frame src='header.html' noresize>

 <frame src='admin.php' noresize>

 <frame src='footer.html' >

</frameset>
</html>
