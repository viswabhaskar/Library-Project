<?php
session_start();

//echo $_SESSION['uname1'];
if(isset($_SESSION['uname']))
{

$uname=$_SESSION['uname'];
echo "<script type='text/javascript'>alert('Login Sucess');location='http://localhost/library/admin/index.html';</script>";
}
else
{
echo "<script type='text/javascript'>alert('Login faild');location='http://localhost/library/admin/';</script>";
}
?>
