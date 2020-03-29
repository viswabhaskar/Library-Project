<?php

$dir="videos";
echo "hfsfssdf";
$count=2;
if(is_dir($dir))
{
if($dh=opendir($dir))
{
while(($file=readdir($dh))!==false)
{
	if($count!=0)
	{
		$count--;
	}
	else{
echo "<html><form action='' method='post'>";
echo "<input type='radio' name='vid' value='$file'>filename:".$file."<br></p>";

}
}
echo "<input type='submit' name='submit' value='submit'>";
echo "</form></html>";
closedir($dh);
}
}
else
{echo "faild to open";
}
<?php
if(isset($_POST['submit']))
{
$vid=$_POST['vid'];
//echo "video  ".$vid;

echo "<video width='400' controls>  <source src='/videos/$vid' type='video/mp4'>";
  //<source src='mov_bbb.ogg' type='video/ogg'>
  echo "Your browser does not support HTML5 video. </video>";
}
?>