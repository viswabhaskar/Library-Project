
<html>
<form action='' method='post' enctype='multipart/form-data'>
<input type='file' name='file1'>
<input type='submit'value='submit' name='submit'>
</form>
</html>
<?php
if(isset($_POST['submit']))
{
//$csv_file1=$_POST['file1'];


//database connection details
$connect = mysql_connect('localhost','root','');

//your database name
$cid =mysql_select_db('student',$connect);

if (!$connect) {
 die('Could not connect to MySQL: ' . mysql_error());
}
		  
	$handle = fopen($_FILES['file1']['tmp_name'],"r");
	$count=0;
while(($data=fgetcsv($handle,1000,","))!==FALSE)
{
   //fgetcsv($handle); 
if($count==0) 
{$count=1;	
}  
		else{
$num = count($data);
        for ($c=0; $c < $num; $c++) {
			$col[$c] = $data[$c];
        }

 $col1 = $col[0];
 $col2 = $col[1];
 $col3 = $col[2];
 $col4 = $col[3];
 $col5 = $col[4];
 echo $col1.$col2.$col3.$col4.$col5."<br>";
   $import="INSERT into csvtabl(roll,name,branch,scity,syear) values('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."')";
	mysql_query($import,$connect) or die(mysql_error());
  
}

    fclose($handle);
}
echo "File data successfully imported to database!!";
mysql_close($connect);
}
?>
