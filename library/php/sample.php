 
<?php
$bno=$_POST['bno'];
$n=$_POST['rno'];
$con=mysqli_connect("localhost","root","","test");

$date = date('Y-m-d');
$newdate = strtotime ( '15 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );


$que="insert into dd values('$n',CURRENT_TIMESTAMP,'$newdate',$bno)";
if(mysqli_query($con,$que))
{
 echo "New record created successfully"."<br>";
 echo $newdate;
}
else
{
echo "faild";
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>