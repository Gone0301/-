<?php
session_start();
?>
<html>
<head>

<meta charset="utf-8">
</head>


<?php

 //echo "<body background=\"bg1.jpg\">";
 echo "<body bgcolor=\"#D9FFFF\">";
    
?>
    <center>
    <h1>程式競賽報名網站</h1>
    <h3>照片顯示</h3>
    </center>
<center>    <style>a{text-decoration:none}</style>
   
<a href="home.php"> &nbsp;首頁</a>
<a href="resiger.php"> &nbsp;我要報名</a>
<a href="action.php"> &nbsp;活動說明</a>
<a href="infor.php"> &nbsp;相關資訊</a>
<a href="contect.php"> &nbsp;聯絡我們</a>
<a href="in.php"> &nbsp;登入</a>
<a href="out.php"> &nbsp;登出</a>
<a href="fire.php"> &nbsp;檔案上傳</a>
<a href="photo.php"> &nbsp;照片展示</a>
	
	</center>
	
<center>
<?php
	if (is_dir("/home/108/za108a/108b32550/pubhtml/picture/"))
	{
		$handle=opendir("/home/108/za108a/108b32550/pubhtml/picture/");
		$count=0;
		while ($file = readdir($handle)){
			if($file!="." and $file!=".."){
				echo "<a href=\"picture\\".$file."\" target=\"_blank\">";
				echo "<img src=\"picture\\".$file."\" width=\"40%\" height=\"50%\" <br>";
				echo "</a>";
				$count+=1;
				if($count%2==0)
				{
					echo "<br>";
				}
				
			}
		}
	}
	?>
	</center>
<center>
<?php
echo "<hr width=\"75%\">";
      echo "<center>&copy版權所有請勿侵占</center>";
?>
	</center>
</body>

</html>
