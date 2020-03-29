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
.menu
{
background-color:cyan;
width:400px;
height:250px;
position:relative;
left:20px;
top:20px;
float:left;
border-right:20px solid red;
}

.main
{
background-color:cyan;
width:600px;
height:250px;
float:left;
position:relative;
left:40px;
top:20px;
}

#la
{
font-size:15px;
font-family:Imprint MT Shadow;
}
#footer
{
width:1500px;
height:50px;
position: relative;
left:-5px;
top:150px;
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
</style>
</head>

<body >
<form action='getbook.php' method='post'>
<img src='images/header.png' alt='title image' height='100' width='1500'>
<hr width='1350'>
<marquee><h1>Library Management</h1></marquee>
<hr width='1350'>

<p class='p'>this is testing</p>
<div class='menu'>
<h2>menu</h2>
<a href='' id='a'>Status </a><br/>
<a href='view.php'id='a'>View Student Details</a><br/>
<a href='' id='a'>Book Status </a>
</div>


<div class=main>
<table>
<tr align=center><td id='la'colspan='2' ><---- Issuing Book----></td></tr>
<tr><td><label id='la'>Student Roll No:</label></td><td><input type='text' name='srno' id='text' required></td></tr>
<tr><td><label id='la'>Book No :</label></td><td><input type='text' name='bono' id='text'></td></tr>

<tr><td><label id='la'>Issue Date :</label></td><td>
<?php  $date=date('d-m-y'); echo"<p>".$date."</p>"; ?></td></tr>

<tr align='center'><td></td><td><input type='submit' value='submit' name='submit' id='text1'>
&nbsp&nbsp&nbsp<input type='reset' id='text1'></td></tr>
</table>
</div>

<img src='images/footer1.jpg' alt='footer image' id='footer'>
</form>
</body>
</html>
