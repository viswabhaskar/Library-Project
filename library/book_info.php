
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
h3
{
color:red;
text-align:center;
}
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<h3>BOOKS AT STUDENT</h3><br>
<label>Enter Student Roll No: </label><input type='text' name='na' id='text'autofocus required><br>
<input type='submit' name='submit' value='submit' id='sub'>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{

$rn=$_POST['na'];

//include('connection.php');
$con=mysqli_connect('localhost','root','','student');

$query="select * from book_data b,main_table m where m.rno='$rn' and m.bno=b.bno";

$result=mysqli_query($con,$query);



if(mysqli_num_rows($result)>0)
{
//echo "<script>alert('as'+".$row.");</script>";
echo "<table border=1>";
echo "<tr><td colspan='5'>Student Roll No  :".$rn."</td></tr>";
echo "<tr><th>Book No</th><th>Book Name</th><th>Book Auther</th><th>Issue Date</th><th>Return Date</th></tr>";

while($row=mysqli_fetch_assoc($result))
   {

echo "<tr><td>".$row['bno']."</td><td>".$row['bname']."</td><td>".$row['auther']."</td>";
echo "<td>".$row['i_date']."</td><td>".$row['r_date']."</td></tr>";

   }
echo "</table>";
}

else
{
echo "<p id='err'>Roll Number Not Exists  OR No Books ".$rn."</p>";
}


echo "<br/><br/><br/>";
echo "<a href='http://localhost/library/book_info.php'><button>Know You are Taken Books</button></a>";
echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";
echo "</body></html>";
}
?>