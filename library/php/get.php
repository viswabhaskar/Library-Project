<html>
<body>

<?php
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
         echo "<br> NAME : ". $row["rollno"]. " - Name: ". $row["idate"]."<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>  

</body>
</html>