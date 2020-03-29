
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
#tab
{
color:rgb(152,135,64);
font-size:20px;
}
table
{
	padding:5px;
}
td
{
	padding:10px;
}
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<h3>HISTORY OF STUDENT ACCESSED BOOKS</h3><br>
<label>Enter Student Roll No: </label><input type='text' name='na' id='text'autofocus required><br>
<input type='submit' name='submit' value='submit' id='sub'>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{

$rn=$_POST['na'];

$img=$rn.".JPG";
//echo $img;

//include('connection.php');
$con=mysqli_connect('localhost','root','','student');

$query="select * from book_data b,backup m where m.rno='$rn' and m.bno=b.bno";

$query1="select * from stu_data where rno='$rn'";

$result1=mysqli_query($con,$query1);

$result=mysqli_query($con,$query);


if(mysqli_num_rows($result1)>0)
{
while($row=mysqli_fetch_assoc($result1))
   {
echo "<table border=4>";
echo"<tr><td rowspan='5'><img src='student_images/$img' width='200' height='200'></td></tr>";
echo "<tr><td colspan='2' id='tab'>Rolle No:</td><td colspan='2'>".$row['rno']."</td>";
echo"<tr><td id='tab'>Student Name:</td><td>".$row['name']."</td><td id='tab'>Branch:</td><td>".$row['branch']."</td></tr>";
echo"<tr><td id='tab'>City:</td><td>".$row['scity']."</td><td id='tab'>Year And Sem</td><td>".$row['syear']."-".$row['sem']."</td></tr>";
echo"<tr><td colspan='2'id='tab'>Phone Number:</td><td colspan='2'>".$row['phone_num']."</td></tr>";

echo "</table>";
   
   }
   }
// for student info
   echo "<br><br>";
//form here select data from backup table
if(mysqli_num_rows($result)>0)
{
//echo "<script>alert('as'+".$row.");</script>";
echo "<table border=1>";
echo "<tr><td colspan='6'>Student Roll No  :".$rn."</td></tr>";

echo "<tr><th>Book No</th><th>Book Name</th><th>Book Auther</th><th>Issue Date</th><th>Return Date</th><th>Actual Return Date</th></tr>";

while($row=mysqli_fetch_assoc($result))
   {

echo "<tr><td>".$row['bno']."</td><td>".$row['bname']."</td><td>".$row['auther']."</td>";
echo "<td>".$row['i_date']."</td><td>".$row['r_date']."</td><td>".$row['a_r_date']."</td></tr>";

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