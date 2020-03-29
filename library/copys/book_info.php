<?php
echo "
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
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<label>Enter Student Roll No: </label><input type='text' name='na'>
<input type='submit' name='submit' value='submit'>
</form>
</body>
</html>";
?>
<?php
if(isset($_POST['submit']))
{
$rn=$_POST['na'];
echo $rn."<br>";
$con=mysqli_connect('localhost','root','','student');

$query="select * from book_info b,main_table m where m.rno='$rn' and m.bno=b.bno";

$result=mysqli_query($con,$query);

echo "<table border=1>";
echo "<tr><th>Book No</th><th>Book Name</th><th>Book Auther</th></tr>";

mysqli_num_rows($result);

//echo "<script>alert('as'+".$row.");</script>";

while($row=mysqli_fetch_assoc($result))
   {

echo "<tr><td>".$row['bno']."</td><td>".$row['bname']."</td><td>".$row['auther']."</td></tr>";

   }
echo "</table>";
}
else
{
echo "<p id='err'>no results found</p>";

}


echo "<br/><br/><br/>";
echo "<a href='index.php' id='a'>Clik Here To Home</a>";
echo "</body></html>";
?>