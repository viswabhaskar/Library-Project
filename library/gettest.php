<html>
<head>
<link rel="stylesheet" type="text/css" href="Styles.css">
</head>
<?php
//$srno=$_POST["srno"];
//$bno=$_POST["bono"];
$c=3;
$srno='14JP5A0504';
//echo "$srno"."<br>"."$bno"."<br>";
$con=mysql_connect('localhost','root','');
mysql_select_db("student",$con);
$query1="select * from stu_info where rno='$srno'";
$result=mysql_query($con,$query1);

if($result)
{
	ECHO "s";
}
else
{
	echo "f";
}
exit;
if(strlen($srno)>9&&strlen($srno)<11)
{
	echo "its roll number<br>";	
}
else
{
	echo "not roll no";
	//echo "<script> alert('number not exit');</script>";
}


if(mysql_num_rows($result)>0)
{
while($row=mysql_fetch_assoc($result)>0)
   {
echo "while working";
	//echo $row[rno];
	if(strcmp($row['rno'],$srno))
	{
	echo "<br>sucess".$srno."<br>";
	}
	else
	{
		echo "<script> alert('number not exit');</script>";
	}
}
}
else
{
	echo "<script> alert('number not exit');</script>";
}
?>