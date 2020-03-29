<html>
<style>
#err
{
color:red;
font-size:20px;
}
body
{
padding:20px;
}
#a
{
font-size:20px;
}
#a:hover
{
font-size:25px;
}
tr
{
font-size:25px;
width:40px;
}
</style>
<?php
$value=$_POST['r'];
$rn=$_POST['rn'];

$date=date('y-m-d'); //reading actual return date
//echo $date; 

$con=mysqli_connect('localhost','root','','student');

echo $value."	".$rn."<br>";

$query="select * from main_table m,book_data b where m.rno='$rn' and  m.bno=$value ";
$result=mysqli_query($con,$query); 
$row=mysqli_fetch_assoc($result);
echo $row['rno']."	".$row['bno']."	".$row['i_date']."	".$row['r_date']."<br>";
//intialize varibles with the table values good viswa u done great job
$rno=$row['rno'];$bno=$row['bno'];$idate=$row['i_date'];$rdate=$row['r_date'];
$insert="insert into backup values('$rno',$bno,'$idate','$rdate','$date')";
$result=mysqli_query($con,$insert); 
$query="delete from main_table where rno='$rn' and bno='$value'";
$result=mysqli_query($con,$query);
if(!empty($result))
{
echo "Roll NO :".$rn;
echo "suecss".$value;
echo"<script>alert('Book Sucessfully Returned');window.location.href='Return_book.php';</script>";
}
mysqli_close($con);
?>

</html>