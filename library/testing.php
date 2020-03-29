<html>
<body>
<form action='' method='post'>
<input type='text' name='rno'>
<input type='submit' name='submit' value='get info'>

<table>
<tr align=center><td id='la'colspan='2' ><---- Issuing Book----></td></tr>
<tr><td><label id='la'>Student Roll No:</label></td><td><input type='text' name='srno' id='text'></td></tr>
<tr><td><label id='la'>Book No :</label></td><td><input type='text' name='bono' id='text'></td></tr>

<tr><td><label id='la'>Issue Date :</label></td><td>
<?php  $date=date('d-m-y'); echo"<p>".$date."</p>"; ?></td></tr>

<tr align='center'><td></td><td><input type='submit' value='submit' name='submit' id='text1'>
&nbsp&nbsp&nbsp<input type='reset' id='text1'></td></tr>
</table>




<?php
if(isset($_POST['submit']))
{
$rn=$_POST['rno'];
echo $rn."<br>";
$con=mysqli_connect('localhost','root','','student');
$query="select * from stu_info where rno='$rn'";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
   {
echo "<table border=1>";
echo "<tr><td>Rolle No &nbsp&nbsp&nbsp:".$row['rno']."&nbsp&nbsp name is&nbsp&nbsp".$row['name']."branch is".$row['branch']."<br></td></tr>";
echo "</table>";
 }
}
else
{
echo 'no results found';
}
mysqli_close($con);
}


if(isset($_POST['submit']))
{
$srno=$_POST["srno"];
$bno=$_POST["bono"];

echo "$srno"."<br>"."$bno"."<br>";
$con=mysql_connect('localhost','root','');

if($con)
{
echo "<p>Connection success</p>";
}
else
{
die (mysql_connect_error());
}

$date=date("Y/m//d");
echo "<p>".$date."</p>";

$ndate=mktime(0,0,0,date("m"),date("d")+15,date("Y"));
echo "the ndate ".date("Y/m/d",$ndate)."<br>";

mysql_select_db("student",$con);
$sql="insert into main_table values('$srno',$bno,current_timestamp,$ndate)";

if(!mysql_query($sql,$con))
{
die('errer '.mysql_error());
}
echo "<p>1 Row Inserted</p>";
mysql_close($con);
}
?>
</form>
</body>
</html>
