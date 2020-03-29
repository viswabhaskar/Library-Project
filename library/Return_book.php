<html>
<head>
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

p
{
font-size:25px;

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
#text1
{
border-color:blue;
border-radius:20px;
height:30px;
width:90px;
}
#text1:hover
{
border-color:red;
border-radius:20px;
height:30px;
width:80px;
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
</head>
<body bgcolor='cyan'>
<form action='' method='post'>
<h3>RETURN BOOK</h3></br></br>
<label>Enter Student Roll No: </label><input type='text' name='na' id='text'autofocus required></br>
<input type='submit' name='submit' id='sub'>
</form>


<?php
if(isset($_POST['submit']))
{
$rn=$_POST['na'];
echo "<p>Student Roll No :".$rn."</p><br>";
$con=mysqli_connect('localhost','root','','student');
$query="select * from main_table m,book_data b where m.rno='$rn' and  m.bno=b.bno ";
$result=mysqli_query($con,$query);
echo "<form action='return.php' method='post'>";
echo "<input type='text' name='rn' value='$rn' hidden>";
echo "<table border=1>";

$count=mysqli_num_rows($result);
//echo "".$count;                                                    

if(!empty($count))
{
echo "<tr><th>status</th><th>Book No</th><th>Book Name</th><th>Book Auther</th><th>Return Date</th><th>Fine</th></tr>";

$sql1 = "select curdate()";
	$result1 = $con->query($sql1);
	 while($row1 = $result1->fetch_assoc()) 
	 {
         $res1=$row1["curdate()"];
		//echo "  ".$res1;
		
     }
	 
	 
while($row=mysqli_fetch_assoc($result))
   {
	   
$ret=$row['r_date']	 ; // reading return date from table

$r1=$row['bno'];
//echo "<script>alert('".$r."');</script>";
echo "<tr><td><input type='radio' name='r' value='$r1'></td>";
$r2=$row['bname'];
$r3=$row['auther'];

$dd="SELECT DATEDIFF('$res1','$ret') AS DiffDate";
$result2 = $con->query($dd);
while($row2 = $result2->fetch_assoc()) 
	 {
         $dd1=$row2["DiffDate"];
		 
		 //echo "<br> ".$dd1." /Rs";
		
if($dd1>0)
{
	//echo "FINE ".$dd1;
	$fine=$dd1;
}
else
{
	$fine=0;
}
     }

echo "<td><input type='text' value='$r1' disabled></td><td><input type='text' value='$r2' disabled></td><td><input type='text' value='$r3' disabled></td><td><input type='text' value='$ret' disabled></td><td><input type='text' value='$fine' id='err' disabled></td></tr>";   
   }
  
echo "</table>";
echo "<input type='submit' name='submit' value='RETURN' id='text1'>";

echo "</form>";
}
else
{
echo "<p id='err'>no results found</p>";
}
mysqli_close($con);
}
?>
<br/><br/>
<?php
echo "<a href='http://localhost/library/book_info.php'><button>Books At Student</button></a> &nbsp &nbsp";
echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";
?>
</body>
</html>