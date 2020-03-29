<html>
<style>
body
{
background-color:cyan;
}
button
{
background-color:cyan;
width:250px;
border-radius:10px;
border-color:red;
font-size:15px;
}
button:hover
{
background-color:orange;
width:250px;

}
p
{
color:blue;
}
tr
{
border-color:orange;
border-size:200px;
}
</style>
<body algin='center'>
<?php
session_start();

$message="logout succesfully";
echo "<script type='text/javascript'>alert('$message');</script>";
//echo "<script type='text/javascript'>window.location.href='http://localhost/library/admin.php';</script>"; no use
echo "<br><br><br><center><A HREF=JavaScript:window.top.close()><button>Close Session</button></A></center>";
session_destroy();
?>
</body>
</html>