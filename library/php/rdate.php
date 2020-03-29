

<?php
$d=$_POST['date'];
$n=$_POST['rno'];
$con=mysqli_connect("localhost","root","","test");
$que="insert into sample values('$n',CURRENT_TIMESTAMP)";
if(mysqli_query($con,$que))
{
 echo "New record created successfully"."<br>";
$date = date('y-m-d');
echo "<input type='text' value='$date' disabled>";
$newdate = strtotime ( '15 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d' , $newdate );
 
echo $newdate;
}
else
{
echo "faild";
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>