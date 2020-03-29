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
<frameset cols='20%,80%' frameborder='no'>
 <frame src='admin_menu.html' noresize frameborder='no'>
 <frame src='add_student.php' name='showframe' noresize >
</frameset>
 <frame src='footer.html' >

</frameset>
</html>
