<style>
p
{
color:red;
}
</style>
<?php

$date=date("Y-m-d");
echo "<p>".$date."</p>";


$newdate=strtotime('15 day' ,strtotime($date));
$ndate=mktime(0,0,0,date("m"),date("d")+15,date("Y"));
echo "the ndate ".date("Y-m-d",$ndate)."<br>";
echo "return date".date('Y-M-d',$newdate);

?>

