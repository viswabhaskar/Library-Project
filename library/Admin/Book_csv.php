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
	font-size:20px
}
</style>

<body>
<form action='' method='post'>
<h1 align='center'>UPLOADS BOOKS </h1>
<br><br>
<table border='2'>
<tr><td><input type='file' name='csv' required><strong> Only .csv file is allowed </strong></td></tr>
<tr><td><input type='submit' name='submit' value='upload'></td></tr>
</table>
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

$fileType = pathinfo($csv_file,PATHINFO_EXTENSION);

if($fileType != "CSV" && $fileType != "csv")  // here we are checking for the file extension. We are not allowing othre then (.csv) extension .
	{
		echo "<br><p id='err'>Sorry, only CSV file is allowed.</p><br>";
		
	}
else
{
	echo "<table border='1' align='center'><tr><th>S.No</th><th>Book Number</th><th>Title</th><th>Auther</th><th>Branch</th></tr>";
	if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);   
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
 
 
echo "<tr align='center'><td>".$i."</td><td>".$col1."</td><td>".$col2."</td><td>".$col3."</td><td>".$col4."</td></tr>";	
//echo $col1.$col2.$col3.$col4."<br>";
   
// SQL Query to insert data into DataBase


$query="insert into book_data values($col1,'$col2','$col3','$col4',$col5)";


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