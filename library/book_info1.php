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
td
{
font-size:25px;
}
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<label>Enter Student Roll No: </label><input type='text' name='na'>
<input type='submit' name='submit'>
</form>


<?php
if(isset($_POST['submit']))
{
$rn=$_POST['na'];
echo $rn."<br>";
$con=mysqli_connect('localhost','root','','student');
$query="select * from book_info b,main_table m where m.bno=b.bno and m.rno='$rn'";


$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)>0)
{

  {
    echo "<table border=1>";
    echo "<tr><th>Book No</th><th>Book Name</th><th>Book Auther</th><th>Issue date</th><th>Return Date</th></tr>";
      
while($row=mysqli_fetch_assoc($result))
      {


echo "<tr><td>".$row['bno']."</td><td>".$row['bname']."</td><td>".$row['auther']."</td><td>".$row['i_date']."</td><td>".$row['r_date']."</td></tr>";

      } echo "</table>";
    }
}
else
{
echo "<p id='err'>no results found</p>";
}
mysqli_close($con);
}
?>
<br/><br/><br/>
<a href='index.php' id='a'>Clik Here To Home</a>
</body>
</html>