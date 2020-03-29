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
border-radius:3px;
height:30px;
font-size:18px;
}
#text:hover
{
border-color:red;
border-radius:3px;
height:30px;
font-size:18px;
}
#sub
{
background-color:cyan;
border-radius:3px;
font-size:20px;
border-color:orange;
}
h3
{
color:red;
text-align:center;
}
h1
{
color:red;

}
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<h3>REPORTS </h3><br>
<?php  $date=date('y-m-d');?>
<input type='radio' name='day' value='1' > <label id='aa'>ToDay :</label> <?php echo "<h1>".$date."</h1>";?></br>
<input type='radio' name='day' value='2'><label id='aa'>Select Dates :</label><br><br>

From Date :<input type='date' name='day1' id='text'> To <input type='date' name='day2' id='text'> <br><br>
<input type='submit' name='submit' value='submit' id='sub'>
</form>


<?php
if(isset($_POST['submit']))
{

$con=mysqli_connect('localhost','root','','student');

//$query="select * from stu_data where rno='$rn'";
//$result=mysqli_query($con,$query);


$day=$_POST['day'];
if($day==1)
{
$date=date('y-m-d');
echo "<h2>Current Date<label id='err'>".$date."</label></h2>";

$query="select * from main_table where i_date='$date'";
$result=mysqli_query($con,$query);

echo "<table border='1' align='center'>";
//echo mysqli_num_rows($result);

if(mysqli_num_rows($result)>0)
{
//echo "<script>alert('as'+".$row.");</script>";
echo "<tr><th>Roll No</th><th>Book Number</th><th>Issue Date</th><th>Return Date</th></tr>";
while($row=mysqli_fetch_assoc($result))
   {
	   echo "<tr><td>".$row['rno']."</td><td>".$row['bno']."</td><td>".$row['i_date']."</td><td>".$row['r_date']."</td></tr>";
   }
}
else
{
	echo "<label id='err'>No Results Found</label>";
}
echo "</table>";
}//if closed
else
{

	$day1=$_POST['day1'];
	//echo $day1;
	$day2=$_POST['day2'];
	echo "<h2> Issued Books From Date:<label id='err'>".$day1."</label>To Date:<label id='err'>".$day2."</label></h2>";
	//exit;
	
	$query="select * from main_table where i_date between '$day1' and '$day2'";
	
	$result=mysqli_query($con,$query);

echo "<table border='1' align='center'>";

if(mysqli_num_rows($result)>0)
{
//echo "<script>alert('as'+".$row.");</script>";
echo "<tr><th>Roll No</th><th>Book Number</th><th>Issue Date</th><th>Return Date</th></tr>";
while($row=mysqli_fetch_assoc($result))
   {
	   
	   echo "<tr><td>".$row['rno']."</td><td>".$row['bno']."</td><td>".$row['i_date']."</td><td>".$row['r_date']."</td></tr>";
   }
}
else
{
	echo "<label id='err'>No Results Found</label>";
}
echo "</table>";
}
}
?>
</body>
</html>