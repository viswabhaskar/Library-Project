<?php
session_start();


if(isset($_SESSION['uname']))
{
	echo "username ".$_SESSION['uname']."<br>";
}
else
{
	echo "not created";
}
?>