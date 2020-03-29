<?php
  session_start();
if($_SESSION['un']==session_id())
{

$uname=$_SESSION['uname'];

}
else
{
	echo"<script>alert('LogIn First ');window.location.href='http://localhost/library/admin.php';</script>";
	
}
?>

<html>
<style>
body
{
background-color:cyan;
}
h1
{
color:red;
font-size:25px;
}
tr
{
border-color:blue;
border-size:200px;
}

</style>
<body>
<form action='' method='post'>
<div>
<h1 align='center'><b>Upload Students :</h1>
<table border='2'>
<tr><td><input type='file' name='csv' required></td></tr>
<tr><td><input type='submit' name='submit' value='upload'></td></tr>
</table>
</div>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
//database connection details
$connect = mysql_connect('localhost','root','');

if (!$connect) {
 die('Could not connect to MySQL: ' . mysql_error());
}

//your database name
$cid =mysql_select_db('student',$connect);


// path where your CSV file is located
define('CSV_PATH','C:/wamp/www/library/');
$file=$_POST['csv'];
// Name of your CSV file
//$csv_file = CSV_PATH . "test.csv"; 
$csv_file = CSV_PATH . "$file"; 
 
 $name=$_FILES['csv']['name'];
 

 echo "<table border='1' ><tr align='center'><th>S.No</th><th>Student Roll Number</th><th>Student Name</th><th>Branch</th><th>City</th><th>Year</th><th>Semester</th></tr>";

//if(!empty($file))
{
	if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);   ;
   $i=0;
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $i++;
		$num = count($data);
		//echo $num."<br>";
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data[$c];
        }
		

 $col1 = $col[0];
 $col2 = $col[1];
 $col3 = $col[2];
 $col4 = $col[3];
 $col5 = $col[4];
 $col6 = $col[5];
 
 echo "<tr align='center'><td>".$i."</td><td>".$col1."</td><td>".$col2."</td><td>".$col3."</td><td>".$col4."</td><td>".$col5."</td><td>".$col6."</td></tr>";
 
 
 // SQL Query to insert data into DataBase
$query = "INSERT INTO stu_data VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."')";
$s     = mysql_query($query, $connect );
//echo "File data successfully imported to database!!";

}

echo "</table>";
    fclose($handle);
}

}
//else
{
	//echo "<script>alert('No File Selected');</script>";
}
mysql_close($connect);
}
?>