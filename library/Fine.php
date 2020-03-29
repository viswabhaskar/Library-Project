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
tr
{
font-size:25px;
width:40px;
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
#text
{
border-color:blue;
border-radius:20px;
height:30px;
font-size:18px;
}
#text:hover
{
border-color:red;
border-radius:20px;
height:30px;
font-size:18px;
}
#sub
{
background-color:cyan;
border-radius:10px;
font-size:20px;
border-color:orange;
}
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<label>Enter Student Roll No: </label><input type='text' name='na' id='text'><br>
<input type='submit' name='submit' id='sub'>
</form>


<?php
if(isset($_POST['submit']))
{
$rn=$_POST['na'];
echo $rn."<br>";
$con=mysqli_connect('localhost','root','','student');
$query="select * from main_table m,book_info b where m.rno='$rn' and  m.bno=b.bno ";
$result=mysqli_query($con,$query);
echo "<form action='Fine_calc.php' method='post'>";
echo "<input type='text' name='rn' value='$rn' hidden>";
echo "<table border=1>";

$count=mysqli_num_rows($result);
echo "".$count;
if(!empty($count))
{
echo "<tr><th>status</th><th>Book No</th><th>Book Name</th><th>Book Auther</th></tr>";
while($row=mysqli_fetch_assoc($result))
   {
$r1=$row['bno'];
//echo "<script>alert('".$r."');</script>";
echo "<tr><td><input type='radio' name='r' value='$r1'></td>";
$r2=$row['bname'];
$r3=$row['auther'];
echo "<td><input type='text' value='$r1' disabled></td><td><input type='text' value='$r2' disabled></td><td><input type='text' value='$r3' disabled></td></tr>";   
   }

echo "</table>";
echo "<input type='submit' name='submit' value='Return' id='sub'>";

echo "</form>";
}
else
{
echo "<p id='err'>no results found</p>";
}
mysqli_close($con);
}
?>
<br/>
<?php
echo "<a href='http://localhost/library/Rerurn_book.php'><button>Return Books</button></a>";
echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";
?>
</body>
</html>