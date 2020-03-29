<html>
<body>
<form action='' method='post'>
<input type='text' name='na'>
<input type='submit' name='submit'>
</form>


<?php
if(isset($_POST['submit']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$name=$_POST['na'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sample";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
if($row["rollno"]==$name)
{
         echo "<br> NAME : ". $row["rollno"]. " date ". $row["idate"]."<br>";
echo "Roll No:"."<input type='text' disabled value=".$row['rollno'].">"."<br><input type='text' disabled value=".$row['idate'].">"; 
}
     }
} else {
     echo "0 results";
}

$conn->close();
}
?>  
</body>
</html>