<html>
<head>
<style>
#a
{
font-size:30px;
}
#a:hover
{
font-size:40px;
}
.main
{
padding:20px;
width:600px;
height:250px;
float:left;
position:relative;
left:60px;
top:20px;

}

#la
{
font-size:15px;
font-family:Imprint MT Shadow;
}


#text1
{
border-color:blue;
border-radius:20px;
height:30px;
width:90px;
}

#text1:hover
{
border-color:red;
border-radius:20px;
height:30px;
width:80px;
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
h3
{
color:red;
text-align:center;
}
</style>
</head>

<body bgcolor='cyan'>
<form action='getbook.php' method='post'>
</br><h3>ISSUE BOOKS</h3>
<div class=main>
<table>
<tr align=center><td id='la'colspan='2' ><---- Issuing Book----></td></tr>
<tr><td><label id='la'>Student Roll No:</label></td><td><input type='text' name='srno' id='text'autofocus required></td></tr>
<tr><td><label id='la'>Book No :</label></td><td><input type='text' name='bono' id='text'required></td></tr>

<tr><td><label id='la'>Issue Date :</label></td><td>
<?php  $date=date('d-m-y'); echo"<p>".$date."</p>"; ?></td></tr>

<tr align='center'><td></td><td><input type='submit' value='submit' name='submit' id='text1'>
&nbsp&nbsp&nbsp<input type='reset' id='text1'></td></tr>
</table>
</div>

</form>
</body>
</html>
