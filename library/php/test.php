<html>
<body>
<form action='sample.php' method='post'>
Enter Roll No: <input type='text' name='rno'><br>
book code: <input type='text' name='bno'><br>
Issu Date: <?php $da=date('Y-m-d'); echo "<input type='text' name='date' value='$da' disabled>";  ?>
<input type='submit'>
</form>
</body>
</html>