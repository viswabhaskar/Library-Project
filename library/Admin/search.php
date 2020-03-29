<html>
<style>
#err
{
color:red;
font-size:20px;
}
body
{
padding:20px;
}
#a
{
font-size:20px;
}
#a:hover
{
font-size:25px;
}
td
{
font-size:25px;
}
#text
{
font-size:25px;
}
#na
{
border-radius:10px;
height:30px;
}
#sub
{
background-color:cyan;
border-radius:10px;
font-size:20px;
border-color:orange;
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
<body bgcolor='cyan'>
<form action='' method='post'>
<label id='text'>Search Book:</label></td>
<input type='text' name='value' required><br><br>
<input type='radio' name='key' value='bid'>By Number :
<input type='radio' name='key' value='bname'>By Title :
<input type='radio' name='key' value='auther'>By Auther:<br>
<tr align='center'><td colspan='3'><input type='submit' name='submit' value='submit' id='sub'>

</form>


<?php
if(isset($_POST['submit']))
{
$value=$_POST['value'];
$key=$_POST['key'];

//echo $value.$key;

//echo $pyear.$psem.$tyear.$tsem."<br>";
$con=mysqli_connect('localhost','root','','student');
switch($key)
{
	case 'bid':	$query="select * from book_data where bno like $value'";
			echo "bno";
			break;
	case 'bname':	$query="select * from book_data where bname like '%$value%'";
	echo "bname";
			break;
	case 'auther':	$query="select * from book_data where auther like '%$value%'";
	echo "auther";
			break;
	default:echo "select any filter";
}
$result=mysqli_query($con,$query);
echo "<table>";

if(mysqli_num_rows($result)>0)
{
	echo "<table border=1>";
	echo "<tr><td>Book No:</td><td>Book Name:</td><td>Auther:</td><td>Branch:</td></tr>";
while($row=mysqli_fetch_assoc($result))
   {

echo"<tr><td>".$row['bno']."</td>";
echo"<td>".$row['bname']."</td>";
echo"<td>".$row['auther']."</td>";
echo"<td>".$row['branch']."</td></tr>";

   }
}
else
{
echo "<p id='err'>no results found</p>";
}
echo "</table>";
mysqli_close($con);
}
?>
<br/><br/>
<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>
</body>
</html>