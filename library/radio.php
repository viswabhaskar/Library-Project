<html>
<form method='post'>
<input type='radio' name='r1' value='hai'>hai
<input type='radio' name='r1' value='viswa'>viswa
<input type='submit' name='submit'>
</form>
</html>
<?php
$value=$_POST['r1'];
echo $value;
?>

echo "<tr><td>".$row['bno']."</td><td>".$row['bname']."</td><td>".$row['auther']."</td></tr>";