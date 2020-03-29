<html>
<head>
<title>Om Nama NamaShivaYa</title>
</head>

<style>
p
{
color:orange;
font-family:Verdana;
font-size:25px;
}

a
{
text-decoration:none;
}

button
{
background-color:cyan;
width:250px;
height:50px;
border-radius:10px;
border-color:red;
font-size:15px;
}
button:hover
{
background-color:rgb(142,245,220);
width:250px;

}

</style>

<body bgcolor="cyan">
<?php
$srno=$_POST["srno"];
$bno=$_POST["bono"];
$c=3;
echo "$srno"."<br>"."$bno"."<br>";
$con=mysql_connect('localhost','root','');
mysql_select_db("student",$con);

$sql1="SELECT * FROM  stu_info WHERE rno = '$srno'";
$result=mysql_query($sql1,$con);


if(strlen($srno)<10 || strlen($srno)>10)
{
	echo "Enter proper no";
}

$sql1="SELECT * FROM  main_table WHERE rno = '$srno'";
$result=mysql_query($sql1,$con);

if(mysql_num_rows($result)>=$c)
{
	echo "<p>Your Already Taken &nbsp&nbsp".mysql_num_rows($result)." Books</p><br><br>";
	echo "<a href='http://localhost/library/book_info.php'><button>Know You are Taken Books</button></a>     ";
	echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";
	
}
else
{
if(empty($bno) )
{
	header('location:http://localhost/library/issue.php');
}
else
{
$date = date('Y-m-d');
$newdate = strtotime ( '15 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );

$sql="insert into main_table values('$srno',$bno,CURRENT_TIMESTAMP,'$newdate')";
if(!mysql_query($sql,$con))
{
die('error '.mysql_error());
}
//echo "<p>1 Row Inserted</p>";

echo "<a href='http://localhost/library/book_info.php'><button>Know You are Taken Books</button></a>";
echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";

}
}
/*else
{
if($con)
{
echo "<p>Connection success</p>";
}
else
{
die (mysql_connect_error());
}
}*/


mysql_close($con);

?>
</body>
</html>