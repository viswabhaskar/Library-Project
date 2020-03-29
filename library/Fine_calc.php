<html>
<style>
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
#sub
{
background-color:cyan;
border-radius:10px;
font-size:20px;
border-color:orange;
}
</style>
<body bgcolor='cyan'>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$rno=$_POST['rn'];
$bno=$_POST['r'];

//echo "".$rno."     ".$bno;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}


$sql = "select * from main_table where rno='$rno' and bno=$bno";
$result = $conn->query($sql);
echo "<br><br><br><table border=1>";
echo "<tr><th>Roll No</th><th>Book No</th><th>Return Date</th><th>Fine</th></tr>";
if ($result->num_rows > 0) 
{
     // output data of each row
     while($row = $result->fetch_assoc()) 
	 {
		 $r1=$row['rno'];
		 $r2=$row['bno'];
		 $r3=$row['r_date'];
         $res=$row["r_date"];
		 echo "<td><input type='text' value='$r1' disabled></td><td><input type='text' value='$r2' disabled></td><td><input type='text' value='$r3' disabled></td>";   
	
		
     }
	 
	$sql1 = "select curdate()";
	$result1 = $conn->query($sql1);
	 while($row1 = $result1->fetch_assoc()) 
	 {
         $res1=$row1["curdate()"];
		
		
     }
	
	
	
$dd="SELECT DATEDIFF('$res1','$res') AS DiffDate";
$result2 = $conn->query($dd);
while($row2 = $result2->fetch_assoc()) 
	 {
         $dd1=$row2["DiffDate"];
		 
		 echo "<td>".$dd1." /Rs</td></tr>";
		
		
     }
echo "</table>";
} 
else 
{
     echo "0 results";
}

echo "<a href='http://localhost/library/Return_book.php'><button>Return Books</button></a>";
echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";

?>
</body>
</html>






