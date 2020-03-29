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
#aa
{
font-size:20px;
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
button
{
background-color:cyan;
width:250px;
height:50px;
border-radius:10px;
border-color:red;
font-size:15px;
}
button:hover
{
background-color:rgb(142,245,220);
width:250px;
}
#text
{
border-color:blue;
border-radius:20px;
height:30px;
font-size:18px;
}
#text:hover
{
border-color:red;
border-radius:20px;
height:30px;
font-size:18px;
}
#sub
{
background-color:cyan;
border-radius:10px;
font-size:20px;
border-color:orange;
}
h3
{
color:red;
text-align:center;
}
table
{
	padding:5px;
	color:rgb(136,147,36);
}
td
{
	padding:10px;
}
</style>
<body bgcolor='cyan'>
<form action='' method='post'>
<h3>STUDENT INFORMATION</h3><br>
<label id='aa'>Enter Student Roll No: </label>
<input type='text' name='na' id='text' autofocus required><br>
<input type='submit' name='submit' value='submit' id='sub'>
</form>


<?php
if(isset($_POST['submit']))
{
$rn=$_POST['na'];
//testing no
//echo $rn."<br>";
$con=mysqli_connect('localhost','root','','student');
$query="select * from stu_data where rno='$rn'";
$result=mysqli_query($con,$query);

//for display image 
$img=$rn.".JPG";
//echo $img.'<br>';
$def='default.jpeg';

/*$dirPath = "student_images"; 
if ( !( $handle = opendir($dirPath) ) )
 die( "Cannot open the directory." );

while ( $file = readdir( $handle ) ) 
	{
		 if ( $file != "." && $file != ".." ){ echo "<li>$file.$img</li>";}
			if(strrchr( $filename, "." ) == ".JPG"  )
			{
	echo "sucess";
			}
			else
			{
				echo "try once";
			}
	}

exit;
*/
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
   {
echo "<table border=4>";
echo"<tr><td rowspan='9'><img src='student_images/$img' width='200' height='200'></td></tr>";
echo "<tr><td>Rolle No:</td><td>".$row['rno']."</td>";

//for display images when the image not available 
	//while ( $file = readdir( $handle ) ) 
	{
		//if($file==$img)
			{
				//echo"<tr><td rowspan='8'><img src='student_images/$img' width='200' height='200'></td></tr>";
			}
	//	else
			{	
			//	echo"<td rowspan='5'><img src='student_images/$def' width='200' height='200' '></td></tr>";
			}
	}		
			
echo"<tr><td>Student Name:</td><td>".$row['name']."</td></tr>";
echo"<tr><td>Branch:</td><td>".$row['branch']."</td></tr>";
echo"<tr><td>City:</td><td>".$row['scity']."</td></tr>";
echo"<tr><td>Year:</td><td>".$row['syear']."</td></tr>";
echo"<tr><td>Semester:</td><td>".$row['sem']."</td></tr>";
echo"<tr><td>Phone Number:</td><td>".$row['phone_num']."</td></tr>";
echo"<tr><td>Section:</td><td>".$row['section']."</td></tr>";

echo "</table>";
 }
}
else
{
	echo "<p id='err'>Roll Number Not Exits ".$rn."</p>";
}
mysqli_close($con);
}
?>
<br/><br/>
<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>
</body>
</html>