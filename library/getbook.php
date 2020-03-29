<html>
<head>
<title>Om Nama NamaShivaYa</title>
</head>

<style>
p
{
color:orange;
font-family:Verdana;
font-size:25px;
}

a
{
text-decoration:none;
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

</style>

<body bgcolor="cyan">
<?php
$srno=$_POST["srno"];
$bno=$_POST["bono"];
$c=3;
//echo "$srno"."<br>"."$bno"."<br>";
$con=mysqli_connect('localhost','root','','student');

$query="select * from stu_data where rno='$srno'";
$result=mysqli_query($con,$query);


//echo "no of rows ".mysqli_num_rows($result);
if(mysqli_num_rows($result)>0)
{
	
while($row=mysqli_fetch_assoc($result)>0)
   {
	   
	//echo $row[rno] checking roll no in table;
	//echo "<br>sucess".$srno."<br>";
			
	$query="select * from book_data where bno='$bno'";
	$result=mysqli_query($con,$query);
	
	//echo "<br>".mysqli_num_rows($result);
	//checking book no is exits are not
	
	//echo "<script>alert('book query working'');</script>";
		if(mysqli_num_rows($result)>0)
		{

			while($row=mysqli_fetch_assoc($result)>0)
			{
			
			echo "<br>".$row['bno'];
			$sql1="SELECT * FROM  main_table WHERE rno = '$srno'";
			$result=mysqli_query($con,$sql1);

				if(mysqli_num_rows($result)>=$c)
						{
							echo "<p>Your Already Taken &nbsp&nbsp".mysqli_num_rows($result)." Books</p><br><br>";
							echo "<a href='http://localhost/library/book_info.php'><button>Books At Student</button></a>     ";
							echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";
							exit;
						}
				else
					{
					
					if(empty($bno) )
						{
							header('location:http://localhost/library/issue.php');
						}
					else
						{
							$date = date('Y-m-d');
							$newdate = strtotime ( '15 day' , strtotime ( $date ) ) ;
							$newdate = date ( 'Y-m-j' , $newdate );

							$sql="insert into main_table values('$srno',$bno,CURRENT_TIMESTAMP,'$newdate')";
							
								if(!mysqli_query($con,$sql))
									{
										die('error '.mysqli_error());
									}
							//echo "<p>1 Row Inserted</p>";
							
							echo "<p>Roll Number :".$srno."<br>";
							echo "Book No :".$bno."<br><br></p>";
							echo "<script>alert('Book Issued to $srno <br>Book No $bno')</script>";
							echo "<a href='http://localhost/library/book_info.php'><button>Books At Student</button></a>";
							echo "<a href='http://localhost/library/issue.php'><button>!ssue Books</button></a>";
							exit;
						}
					}
				
			}
		}
		else
		{
				echo "<script>alert('Entered Book Number Is Not Exits');window.location.href='issue.php';</script>";
		}
	}
}
else
{
		echo "<script>alert('Entered Roll Is Not Exits');window.location.href='issue.php';</script>";
}


		


/*else
{
if($con)
{
echo "<p>Connection success</p>";
}
else
{
die (mysqli_connect_error());
}
}*/


mysqli_close($con);

?>
</body>
</html>