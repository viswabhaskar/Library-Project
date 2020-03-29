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
align=center;
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
<h3>EDIT / UPDATE STUDENT INFORMATION</h3><br>
<label id='aa'>Enter Student Roll No: </label>
<input type='text' name='na' id='text' autofocus required><br>
<input type='submit' name='submit' value='submit' id='sub'>
</form>


<?php
if(isset($_POST['submit']))
{
$rn=$_POST['na'];
//testing no
//echo $rn."<br>";
$con=mysqli_connect('localhost','root','','student');
$query="select * from stu_data where rno='$rn'";
$result=mysqli_query($con,$query);

echo "<form action='update_student.php' method='post'>";
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
   {
echo "<table border=0>";
echo "<tr><td>Rolle No:</td><td>".$row['rno']."</td>";

echo "<input type='text' name='rno' value='".$row['rno']."' hidden>";
echo"<tr><td>Student Name:</td><td><input type='text' value='".$row['name']."' name='name' id='text'></td></tr>";
echo"<tr><td>Branch:</td><td><input type='text' value='".$row['branch']."' name='branch' id='text'></td></tr>";
echo"<tr><td>City:</td><td><input type='text' value='".$row['scity']."' name='scity'id='text'></td></tr>";
echo"<tr><td>Year:</td><td><input type='text' value='".$row['syear']."' name='syear'id='text'></td></tr>";
echo"<tr><td>Semester:</td><td><input type='text' value='".$row['sem']."' name='sem'id='text'></td></tr>";
echo"<tr><td>Phone Number:</td><td><input type='text' value='".$row['phone_num']."' name='ph'id='text'></td></tr>";
echo"<tr><td>Section:</td><td><input type='text' size='2' value='".$row['section']."' name='sec'id='text'></td></tr>";


echo "</table>";
 }
 echo "<input type='submit' name='submit' value='Edit / Update'id='sub'>";
}
else
{
	echo "<p id='err'>Roll Number Not Exits ".$rn."</p>";
}
mysqli_close($con);
}
echo "</form>";
?>
<br/><br/>

</body>
</html>