 
<?php

$con=mysqli_connect("localhost","root","","test");
$date = date('Y-m-d');
$newdate = strtotime ( '15 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );
 


$que="insert into dd values('$newdate',CURRENT_TIMESTAMP)";
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