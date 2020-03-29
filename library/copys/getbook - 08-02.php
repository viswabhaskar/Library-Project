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

<body bgcolor="cyan">
<?php
$srno=$_POST["srno"];
$bno=$_POST["bono"];

echo "$srno"."<br>"."$bno"."<br>";
$con=mysql_connect('localhost','root','');
mysql_select_db("student",$con);

$sql1="SELECT * FROM  main_table WHERE rno = '$srno'";
$count=mysql_query($sql1,$con);
if($count<3)
{
	echo "Your taken extra".$count;
	echo "<p><a href='http://localhost/library/book_info.php'>Click Here To Know Your Taken Books</a></p></br></br>";
	echo "<p> <a href='http://localhost/library/issue.php'>Click Here To Issue Books</a></p>";
	
}
else
{
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
}
?>
</body>
</html>