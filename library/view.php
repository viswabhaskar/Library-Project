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
#aa
{
font-size:20px;
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
h3
{
color:red;
text-align:center;
}
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<h3>BOOK INFORMATION</h3><br>
<label id='aa'>Enter Book No: </label>
<input type='text' name='bid' id='text'autofocus required></br>

<input type='submit' name='submit' value='submit' id='sub'>
</form>


<?php
if(isset($_POST['submit']))
{
$bid=$_POST['bid'];
//echo $bid."<br>";
$con=mysqli_connect('localhost','root','','student');

$query="select * from book_data where bno='$bid'";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
   {
echo "<table border=1>";

echo"<tr><td>Book No:</td><td>".$row['bno']."</td></tr>";
echo"<tr><td>Book Name:</td><td>".$row['bname']."</td></tr>";
echo"<tr><td>Auther:</td><td>".$row['auther']."</td></tr>";
echo"<tr><td>Branch:</td><td>".$row['branch']."</td></tr>";



echo "</table>";
 }
}
else
{
echo "<p id='err'>no results found</p>";
}
mysqli_close($con);
}
?>
<br/><br/><br/>
<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>
</body>
</html>