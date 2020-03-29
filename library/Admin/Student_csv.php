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
#err
{
	color:red;
	font-size:20px;
}
</style>
<body>
<form action='' method='post'>
<div>
<h1 align='center'>UPLOAD STUDENTS </h1>
<br><br>
<table border='2'>
<tr><td><input type='file' name='csv' required><strong> Only .csv file is allowed </strong></td></tr>
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
 
 //$name=$_FILES['csv']['name'];
 //echo $name."<br>";
//echo $csv_file."<br>";
 
 

	
	$fileType = pathinfo($csv_file,PATHINFO_EXTENSION);
	
	//echo $fileType."<br>";
	
	if($fileType != "CSV" && $fileType != "csv")  // here we are checking for the file extension. We are not allowing othre then (.csv) extension .
	{
		echo "<br><p id='err'>Sorry, only CSV file is allowed.</p><br>";
		
	}
	else
{
	echo "<table border='1' ><tr align='center'><th>S.No</th><th>Student Roll Number</th><th>Student Name</th><th>Branch</th><th>City</th><th>Year</th><th>Semester</th></tr>";
	
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
		

 $rno = $col[0];
 $name = $col[1];
 $branch = $col[2];
 $scity = $col[3];
 $syear = $col[4];
 $sem = $col[5];
 $phone = $col[6];
 $section = $col[7];
 
 echo "<tr align='center'><td>".$i."</td><td>".$rno."</td><td>".$name."</td><td>".$branch."</td><td>".$scity."</td><td>".$syear."</td><td>".$sem."</td><td>".$phone."</td><td>".$section."</td><tr>";
 
 
 // SQL Query to insert data into DataBase
$query = "INSERT INTO stu_data VALUES('".$rno."','".$name."','".$branch."','".$scity."','".$syear."','".$sem."','".$phone."','".$section."')";

$s     = mysql_query($query, $connect );
//echo "File data successfully imported to database!!";

}

echo "</table>";
    fclose($handle);
}

}

mysql_close($connect);
}
?>