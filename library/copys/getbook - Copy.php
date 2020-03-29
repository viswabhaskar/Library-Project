<html>
<head>
<title>Om Nama NamaShivaYa</title>
</head>

<style>
p
{
color:orange;
font-family:Verdana;
font-size:40px;
}

#footer
{
width:1500px;
height:50px;
position: relative;
left:-5px;
top:150px;
}
</style>

<body bgcolor="white">
<?php
$srno=$_POST["srno"];
$bno=$_POST["bono"];

echo "$srno"."<br>"."$bno"."<br>";
$con=mysql_connect('localhost','root','');
mysql_select_db("student",$con);

if(empty($bno))
{
	//if()
	{
		header('location:http://localhost/library/issue.php');
	}
}
else
{
if($con)
{
echo "<p>Connection success</p>";
}
else
{
die (mysql_connect_error());
}


$date = date('Y-m-d');
$newdate = strtotime ( '15 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );

$sql="insert into main_table values('$srno',$bno,CURRENT_TIMESTAMP,'$newdate')";
if(!mysql_query($sql,$con))
{
die('error '.mysql_error());
}
echo "<p>1 Row Inserted</p><br> <a href='http://localhost/library/issue.php'>Click Here To Issue Books</a>";
}
mysql_close($con);
?>
</body>
</html>