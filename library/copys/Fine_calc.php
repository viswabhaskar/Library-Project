<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$rno=$_POST['rn'];
$bno=$_POST['r'];
echo "".$rno."     ".$bno;
exit;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from lib1 where bno=1700";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
     // output data of each row
     while($row = $result->fetch_assoc()) 
	 {
         $res=$row["rdate"];
	
		
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
		 echo $dd1;
		
		
     }

} 
else 
{
     echo "0 results";
}



?>







